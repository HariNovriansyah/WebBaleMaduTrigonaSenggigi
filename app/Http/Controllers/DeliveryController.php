<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class DeliveryController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'approved')->orWhere('status', 'delivering')->with('product')->get();
        return view('admin.delivery.index', compact('orders'));
    }

    public function deliverOrder(Order $order)
    {
        $product = Product::findOrFail($order->product_id);
        $order->status = 'delivering';
        $product->stock  = $order->product->stock - $order->quantity;
        $order->save();
        $product->save();

        return redirect()->route('delivery.index')->with('success', 'Order status updated to delivering');
    }

    public function completeOrder(Order $order)
    {
        $order->status = 'delivered';
        $order->save();

        return redirect()->route('delivery.index')->with('success', 'Order status updated to delivered');
    }
}
