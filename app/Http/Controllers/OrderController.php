<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

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
        $order->status = 'pending';
        $order->save();
        return redirect()->route('payment.show', $order->id);
    }
}
