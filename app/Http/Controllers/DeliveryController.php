<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class DeliveryController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'disetujui')->orWhere('status', 'dikemas')->orWhere('status', 'dikirim')->with('product')->get();
        return view('admin.delivery.index', compact('orders'));
    }

    public function packingOrder(Order $order)
    {
        $order->status = 'dikemas';
        $order->save();

        return redirect()->route('delivery.index')->with('success', 'Pesanan sedang dikemas');
    }

    public function deliverOrder(Order $order)
    {
        $product = Product::findOrFail($order->product_id);
        $order->status = 'dikirim';
        $product->stock  = $order->product->stock - $order->quantity;
        $order->save();
        $product->save();

        return redirect()->route('delivery.index')->with('success', 'Pesanan sedang dikirim');
    }

    public function completeOrder(Order $order)
    {
        $order->status = 'terkirim';
        $order->save();

        return redirect()->route('delivery.index')->with('success', 'Pesanan terkirim');
    }
}
