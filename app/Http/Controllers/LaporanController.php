<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;
use App\Models\Kategori;

class LaporanController extends Controller
{
    public function cetak(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $data = User::whereBetween('created_at', [
            Carbon::parse($request->start_date)->startOfDay(),
            Carbon::parse($request->end_date)->endOfDay(),
        ])->get();

        $pdf = Pdf::loadView('laporan.laporanUser', compact('data', 'request'));
        return $pdf->download('laporan_pengguna.pdf');
    }

    public function kategori(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $data = Kategori::whereBetween('created_at', [
            Carbon::parse($request->start_date)->startOfDay(),
            Carbon::parse($request->end_date)->endOfDay(),
        ])->get();

        $pdf = Pdf::loadView('laporan.laporanKategori', compact('data', 'request'));
        return $pdf->download('laporan_kategori.pdf');
    }

}
