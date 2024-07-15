@extends($layout)
@section('content')

<div class="container p-5 bg-white rounded-4">
    <h1 class="display-4 mb-4">Products</h1>

    <a href="{{ route('products.create') }}" class="button mb-4">Create New Product</a>

    @if ($products->isEmpty())
        <p class="text-muted">No products available.</p>
    @else
        <ul class="list-unstyled">
            @foreach ($products as $product)
                <li class="mb-4">
                    <h2 class="mb-2">{{ $product->product_name }}</h2>
                    <p class="mb-2">{{ $product->description }}</p>
                    <p class="mb-2">Price: {{ $product->price }}</p>
                    <p class="mb-2">Stock: {{ $product->stock }}</p>
                    <div class="mb-2">
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-secondary mr-2">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>

@endsection
