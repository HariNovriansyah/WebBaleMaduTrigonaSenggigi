@extends($layout)
@section('content')

<h1>Products</h1>

<a href="{{ route('products.create') }}">Create New Product</a>

@if ($products->isEmpty())
    <p>No products available.</p>
@else
    <ul>
        @foreach ($products as $product)
            <li>
                <h2>{{ $product->product_name }}</h2>
                <p>{{ $product->description }}</p>
                <p>Price: {{ $product->price }}</p>
                <p>Stock: {{ $product->stock }}</p>
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endif

@endsection
