
@extends($layout)
@section('content')
<h1>Payment Pending</h1>
    <p>Order ID: {{ $order->id }}</p>
    <p>Product: {{ $order->product->product_name }}</p>
    <p>Total Price: {{ $order->total_price }}</p>
@endsection
