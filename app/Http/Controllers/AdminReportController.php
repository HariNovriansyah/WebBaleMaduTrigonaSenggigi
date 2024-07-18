<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Order;
use DateTime;

class AdminReportController extends Controller
{
    public function index()
    {
        // Ambil semua pesanan dengan informasi terkait pengguna dan produk
        $orders = Order::with('user', 'product')->get();

        return view('admin.reports.orders', compact('orders'));
    }

    public function downloadPdf(Request $request)
    {
        $query = Order::query();

        $month = $request->has('month') ? $request->month : null;
        $year = $request->has('year') ? $request->year : now()->year;

        if ($month) {
            $query->whereMonth('created_at', $month);
        }
        if ($year) {
            $query->whereYear('created_at', $year);
        }

        $orders = $query->get();

        $pdf = PDF::loadView('admin.reports.orders_pdf', compact('orders', 'month', 'year'));
        return $pdf->download('orders_report.pdf');
        // $orders = Order::with('user', 'product')->get();

        // $pdf = PDF::loadView('admin.reports.orders_pdf', compact('orders'));
        // return $pdf->download('orders_report.pdf');
    }
}
