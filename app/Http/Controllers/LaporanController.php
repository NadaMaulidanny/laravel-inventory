<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\User;

class LaporanController extends Controller
{
    public function cetak(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date'   => 'required|date|after_or_equal:start_date',
        ]);

        $data = User::whereBetween('created_at', [$request->start_date, $request->end_date])->get();

        $pdf = Pdf::loadView('laporan.laporanUser', compact('data', 'request'));
        return $pdf->download('laporan_pengguna.pdf');
    }
}
