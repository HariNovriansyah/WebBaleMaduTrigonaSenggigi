@extends($layout)
@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card" style="width: 40%;">
        <div class="card-header">
            <h1 class="h5">Order Product: {{ $product->product_name }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('order.store', $product->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" class="form-control" min="1" required>
                </div>
                <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 text-white">Place Order</button>
            </form>
        </div>
    </div>
</div>
@endsection
