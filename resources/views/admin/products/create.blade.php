@extends($layout)
@section('content')
    <div class="container p-5 bg-white rounded-4">
        <h1 class="display-4">Create New Product</h1>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" id="product_name" name="product_name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" name="description" rows="4" class="form-control"></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" name="price" step="0.01" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" id="stock" name="stock" class="form-control" required>
            </div>
            <div class="d-flex justify-content-start">
                <button type="submit">Create Product</button>
                <a href="{{ route('products.index') }}" class="btn btn-link">Back to Product Index</a>
            </div>
        </form>

    </div>
@endsection
