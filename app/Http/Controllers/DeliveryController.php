<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class DeliveryController extends Controller
{
    public function index()
    {
        $orders = Order::where('status', 'approved')->orWhere('status', 'delivering')->with('product')->get();
        return view('admin.delivery.index', compact('orders'));
    }

    public function deliverOrder(Order $order)
    {
        $order->status = 'delivering';
        $order->save();

        return redirect()->route('delivery.index')->with('success', 'Order status updated to delivering');
    }

    public function completeOrder(Order $order)
    {
        $order->status = 'delivered';
        $order->save();

        return redirect()->route('delivery.index')->with('success', 'Order status updated to delivered');
    }
}
