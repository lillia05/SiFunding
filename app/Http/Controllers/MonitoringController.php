<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nasabah;
use App\Models\PengajuanRek;
use App\Models\StatusLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; // IMPORT LIBRARY PDF

class MonitoringController extends Controller
{
    public function index()
    {
        $totalNasabah = User::where('role', 'Nasabah')->count();

        $pendingCount = PengajuanRek::whereIn('status', ['draft', 'process'])->count();
        $readyCount = PengajuanRek::where('status', 'ready')->count();
        $doneCount = PengajuanRek::where('status', 'done')->count();

        $antreanTerbaru = PengajuanRek::with('nasabah.user')
                            ->latest()
                            ->take(5)
                            ->get();

        return view('funding.dashboard', compact(
            'totalNasabah', 
            'pendingCount', 
            'readyCount', 
            'doneCount', 
            'antreanTerbaru'
        ));
    }

    public function trackingPage(Request $request)
    {
        $query = PengajuanRek::with(['nasabah.user']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->whereHas('nasabah', function ($q) use ($search) {
                $q->where('nik_ktp', 'like', "%$search%")
                ->orWhereHas('user', function($u) use ($search) {
                    $u->where('username', 'like', "%$search%");
                });
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $pengajuans = $query->latest()->paginate(10);

        return view('funding.tracking.index', compact('pengajuans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pengajuan = PengajuanRek::findOrFail($id);
        $statusLama = $pengajuan->status;
        $statusBaru = $request->status;

        if ($statusBaru == 'ready') {
            $request->validate([
                'no_rek' => 'required|numeric|digits_between:10,20|unique:pengajuan_rek,no_rek,' . $id
            ], [
                'no_rek.required' => 'Nomor rekening wajib diisi setelah dicetak.',
                'no_rek.numeric' => 'Nomor rekening harus berupa angka.',
                'no_rek.unique' => 'Nomor rekening sudah terdaftar.'
            ]);
        }

        $dataUpdate = [
            'status' => $statusBaru,
            'tanggal_serah_terima' => ($statusBaru == 'done') ? now() : $pengajuan->tanggal_serah_terima
        ];

        if ($request->filled('no_rek')) {
            $dataUpdate['no_rek'] = $request->no_rek;
        }

        $pengajuan->update($dataUpdate);

        $catatan = $request->catatan ?? "Status berkas diperbarui menjadi " . ucfirst($statusBaru);
        if ($request->filled('no_rek')) {
            $catatan .= ". No Rek: " . $request->no_rek;
        }

        StatusLog::create([
            'pengajuan_id' => $pengajuan->id,
            'user_id' => auth()->id(),
            'status_lama' => $statusLama,
            'status_baru' => $statusBaru,
            'catatan' => $catatan,
        ]);

        return redirect()->back()->with('success', 'Status Berhasil Diperbarui!');
    }

    public function doTracking(Request $request)
    {
        $search = $request->query('search');

        if (!$search) {
            return redirect()->route('tracking.index')->with('error', 'Silakan pilih nasabah terlebih dahulu.');
        }

        $pengajuan = PengajuanRek::with(['nasabah.user', 'logs.user'])
            ->whereHas('nasabah', function ($q) use ($search) {
                $q->where('nik_ktp', $search);
            })->first();

        if (!$pengajuan) {
            return redirect()->route('tracking.index')->with('error', 'Data nasabah tidak ditemukan.');
        }

        return view('funding.tracking.show', compact('pengajuan'));
    }

    // --- FUNGSI CETAK PDF (BARU) ---
    public function cetakPdf()
    {
        // Ambil data nasabah yang statusnya 'ready' (Siap Diserahkan) atau 'done' (Selesai)
        // Agar tanda terima hanya untuk yang sudah dicetak bukunya
        $data_nasabah = Nasabah::with(['user', 'pengajuan'])
                        ->whereHas('pengajuan', function($q) {
                            $q->whereIn('status', ['ready', 'done']);
                        })
                        ->get();

        // Load View PDF
        $pdf = Pdf::loadView('funding.tracking.pdf', compact('data_nasabah'));

        // Set Ukuran Kertas
        $pdf->setPaper('A4', 'portrait');

        // Download File
        return $pdf->download('Tanda_Terima_Tabungan_'.date('d-m-Y').'.pdf');
    }
}