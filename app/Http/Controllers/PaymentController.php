<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Order;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Midtrans Configuration
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function show($orderId)
    {
        $order = Order::with('product')->findOrFail($orderId);

        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('user.payment.show', compact('order', 'snapToken'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to get payment token.');
        }
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $order_id = $request->order_id;
        $status_code = $request->status_code;
        $gross_amount = $request->gross_amount;
        $transaction_status = $request->transaction_status;

        $hashed = hash("sha512", $order_id . $status_code . $gross_amount . $serverKey);

        if ($hashed) { // Compare this with the signature key that you expect
            $order = Order::findOrFail($order_id);

            if ($transaction_status == 'capture' || $transaction_status == 'settlement') {
                $order->status = 'approved';
                $order->save();

                return response()->json(['status' => 'success', 'message' => 'Transaction status updated']);
            } elseif ($transaction_status == 'deny' || $transaction_status == 'expire' || $transaction_status == 'cancel') {
                $order->status = 'rejected';
                $order->save();

                return response()->json(['status' => 'failed', 'message' => 'Transaction status failed']);
            }else{
                $order->save();

                return response()->json(['status' => 'failed', 'message' => 'Transaction status failed']);
            }


        }

        return response()->json(['status' => 'error', 'message' => 'Invalid signature'], 400);
    }

    public function success($orderId)
    {
        $order = Order::with('product')->findOrFail($orderId);
        return view('user.payment.success', compact('order'));
    }

    public function pending($orderId)
    {
        $order = Order::with('product')->findOrFail($orderId);
        return view('user.payment.pending', compact('order'));
    }
}
