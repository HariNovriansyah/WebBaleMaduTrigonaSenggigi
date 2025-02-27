<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Review;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function create(Product $product)
    {
        return view('user.orders.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $totalPrice = $product->price * $request->input('quantity');

        $order = new Order;
        $order->user_id = auth()->id();
        $order->product_id = $product->id;
        $order->total_price = $totalPrice;
        $order->quantity = $request->input('quantity'); //new code
        $order->status = 'pending';
        $order->save();
        return redirect()->route('payment.show', $order->id);
    }

    public function orderHistory()
    {
        $orders = Order::where('user_id', auth()->id())->with('product')->get();
        foreach ($orders as $order) {
            $review = $order->product->reviews->where('user_id', auth()->id())->first();
        }

        return view('user.orders.history', compact('orders','review'));
    }

    public function generateReceipt(Order $order)
    {
        $pdf = PDF::loadView('user.orders.receipt', compact('order'));
        return $pdf->download('receipt.pdf');
    }
    public function markAsReceived(Order $order)
    {
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        if ($order->status == 'delivered') {
            $order->status = 'received';
            $order->save();

            return redirect()->route('orders.history')->with('success', 'Order status updated to received');
        }

        return redirect()->route('orders.history')->with('error', 'Invalid operation');
    }

    public function showReviewForm(Order $order)
    {
        // Pastikan hanya pengguna yang memiliki pesanan ini yang bisa mengakses halaman ini
        if ($order->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $existingReview = Review::where('user_id', auth()->id())
        ->where('product_id', $order->product_id)
        ->first();

        if ($existingReview) {
        return redirect()->back()->with('error', 'You have already reviewed this product.');
        }

        return view('user.payment.review', compact('order'));
    }
}
