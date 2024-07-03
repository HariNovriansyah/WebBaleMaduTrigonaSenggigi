@extends($layout)
@section('content')

<h1>Product List</h1>

@if ($products->isEmpty())
    <p>No products available.</p>
@else
    @foreach ($products as $product)
        <div>
            <h2>{{ $product->product_name }}</h2>
            <p>{{ $product->description }}</p>
            <p>Price: ${{ $product->price }}</p>
            <p>Stock: {{ $product->stock }}</p>
            <a href="{{ route('order.create', $product->id) }}">Order</a>
        </div>
    @endforeach
@endif

<h2>Reviews</h2>
@foreach($product->reviews as $review)
    <div>
        <p><strong>{{ $review->user->name }}</strong> rated {{ $review->rating }} out of 5</p>
        <p>{{ $review->review }}</p>
    </div>
@endforeach

@endsection
