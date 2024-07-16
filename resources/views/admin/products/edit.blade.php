@extends($layout)
@section('content')

<h1>Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4">{{ $product->description }}</textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required>
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required>
        </div>
        <div>
            <button type="submit">Update Product</button>
        </div>
    </form>

    <a href="{{ route('products.index') }}">Back to Product Index</a>

@endsection
