<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\User;
use App\Models\PengajuanRek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class NasabahController extends Controller
{
    public function index(Request $request)
    {
        $query = Nasabah::with(['user', 'pengajuan']);

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nik_ktp', 'like', "%$search%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('username', 'like', "%$search%");
                  })
                  ->orWhereHas('pengajuan', function($pengajuanQuery) use ($search) {
                      $pengajuanQuery->where('no_rek', 'like', "%$search%");
                  });
            });
        }

        if ($request->filled('produk')) {
            $produk = $request->produk;
            $query->whereHas('pengajuan', function($q) use ($produk) {
                $q->where('jenis_produk', 'like', "%$produk%");
            });
        }

        $nasabah = $query->latest()->paginate(10);

        return view('funding.nasabah.index', compact('nasabah'));
    }

    public function create()
    {
        return view('funding.nasabah.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nik_ktp' => 'required|numeric|digits:16|unique:nasabah,nik_ktp',
            'no_hp' => 'required',
            'jenis_produk' => 'required'
        ]);

        DB::transaction(function () use ($request) {
            $user = User::create([
                'username' => $request->name,
                'email' => $request->email,
                'password' => Hash::make('12345678'),
                'role' => 'Nasabah',
                'email_verified_at' => now(),
            ]);

            $nasabah = Nasabah::create([
                'user_id' => $user->id,
                'nik_ktp' => $request->nik_ktp,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'no_hp' => $request->no_hp,
                'alamat' => $request->alamat,
                'nama_ibu' => $request->nama_ibu,
                'kode_pos' => $request->kode_pos ?? '-',
                'status_pernikahan' => $request->status_pernikahan ?? '-',
                'nama_keluarga_tidak_serumah' => $request->nama_keluarga ?? '-',
                'alamat_keluarga_tidak_serumah' => $request->alamat_keluarga ?? '-',
                'no_hp_keluarga_tidak_serumah' => $request->hp_keluarga ?? '-',
            ]);

            PengajuanRek::create([
                'nasabah_id' => $nasabah->id,
                'jenis_produk' => $request->jenis_produk,
                'status' => 'draft',
                'tanggal_input' => now(),
            ]);
        });

        return redirect()->back()->with('success', 'Data nasabah berhasil ditambahkan!');
    }

    // UPDATE - Proses Perbarui Data
    public function update(Request $request, $id)
    {
        $nasabah = Nasabah::findOrFail($id);
        
        $nasabah->update($request->only([
            'nik_ktp', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'alamat', 'nama_ibu'
        ]));

        $nasabah->user->update([
            'name' => $request->name,
            'email' => $request->email
        ]);

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $nasabah = Nasabah::findOrFail($id);
        $nasabah->user->delete(); 
        
        return redirect()->back()->with('success', 'Data nasabah telah dihapus.');
    }

    // ... method destroy sebelumnya ...

    // TAMBAHKAN FUNGSI INI:
    public function show($id)
    {
        $nasabah = Nasabah::with(['user', 'pekerjaan', 'pengajuan'])->findOrFail($id);
        return view('funding.nasabah.show', compact('nasabah'));
    }
}
