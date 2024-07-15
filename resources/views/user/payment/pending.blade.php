@extends($layout)
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-white">
                    <h1 class="h3 mb-0">Payment Pending</h1>
                </div>
                <div class="card-body">
                    <p class="mb-1"><strong>Order ID:</strong> {{ $order->id }}</p>
                    <p class="mb-1"><strong>Product:</strong> {{ $order->product->product_name }}</p>
                    <p class="mb-1"><strong>Total Price:</strong> {{ $order->total_price }}</p>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('payment.show', ['orderId' => $order->id]) }}" class="btn btn-primary">Proceed to Payment</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
