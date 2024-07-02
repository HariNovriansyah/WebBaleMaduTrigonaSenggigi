
@extends($layout)
@section('content')
<div class="container">
    <h1>Order Product: {{ $product->product_name }}</h1>
    <form action="{{ route('order.store', $product->id) }}" method="POST">
        @csrf
        <div>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>
        </div>
        <button type="submit">Place Order</button>
    </form>
</div>
@endsection
