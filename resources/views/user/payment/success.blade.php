<!-- resources/views/user/payment/success.blade.php -->
@extends($layout)
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Payment Successful!</h1>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Product:</strong> {{ $order->product->product_name }}</p>
    <p><strong>Total Price:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>

    @php
        $userHasReviewed = $order->product->reviews->contains('user_id', auth()->id());
    @endphp

    <!-- Button to download receipt as PDF -->
    <a href="{{ route('order.receipt', $order->id) }}" class="btn btn-primary rounded-pill py-2 px-4 text-white mb-4">Download Receipt (PDF)</a>

    @if ($order->status == "diterima")
        <!-- Link to review page -->
        <a href="{{ route('payment.review', $order->id) }}" class="btn btn-secondary rounded-pill py-2 px-4 text-white mb-4">Leave a Review</a>
    @elseif ($userHasReviewed)
        <div class="alert alert-info">You have already reviewed this product.</div>
    @endif
</div>
@endsection
