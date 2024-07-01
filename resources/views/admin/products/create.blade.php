@extends($layout)
@section('content')

<h1>Create New Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name" required>
        </div>
        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>
        <div>
            <label for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" required>
        </div>
        <div>
            <label for="stock">Stock</label>
            <input type="number" id="stock" name="stock" required>
        </div>
        <div>
            <button type="submit">Create Product</button>
        </div>
    </form>

    <a href="{{ route('products.index') }}">Back to Product Index</a>

@endsection
