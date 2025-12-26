<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Nasabah;
use App\Models\PengajuanRek;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index()
    {
        $totalNasabah = User::where('role', 'Nasabah')
                            ->whereNotNull('email_verified_at')
                            ->count();

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
}
