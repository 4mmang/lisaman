<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakDataPenjulanController extends Controller
{
    public function generatePDF(Request $request)
    {
        $start = $request->start . ' 00:00:00'; // Tambahkan waktu awal hari
        $end = $request->end . ' 23:59:59'; // Tambahkan waktu akhir hari
        $terjual = Order::whereBetween('created_at', [$start, $end])
            ->whereHas('payment', function ($query) {
                $query->where('status', 'paid'); // Tambahkan filter jika perlu
            })
            ->with('payment') // Untuk memuat data pembayaran terkait
            ->get();
        $pdf = PDF::loadView('admin.data-penjualan', compact('terjual'))
            ->setPaper('A4', 'portrait')
            ->setOptions([
                'isHtml5ParserEnabled' => true,
                'isRemoteEnabled' => true,
            ]);

        return $pdf->stream('data-penjualan.pdf');
    }
}
