<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;

class AdminReportController extends Controller
{
    public function index()
    {
        // Ambil semua pesanan dengan informasi terkait pengguna dan produk
        $orders = Order::with('user', 'product')->get();

        return view('admin.reports.orders', compact('orders'));
    }

    public function downloadPdf()
    {
        $orders = Order::with('user', 'product')->get();

        $pdf = PDF::loadView('admin.reports.orders_pdf', compact('orders'));
        return $pdf->download('orders_report.pdf');
    }
}
