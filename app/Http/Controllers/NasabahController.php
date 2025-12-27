<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\User;
use Illuminate\Http\Request;

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
}
