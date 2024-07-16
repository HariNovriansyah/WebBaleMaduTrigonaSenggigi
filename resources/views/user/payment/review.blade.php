<!-- resources/views/user/payment/review.blade.php -->
@extends($layout)
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Leave a Review</h1>
    <p><strong>Order ID:</strong> {{ $order->id }}</p>
    <p><strong>Product:</strong> {{ $order->product->product_name }}</p>
    <p><strong>Total Price:</strong> Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>

    <!-- Form for rating and review -->
    <div class="card mb-4">
        <div class="card-header">
            <h3>Leave a Review</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('reviews.store') }}">
                @csrf
                <input type="hidden" name="product_id" value="{{ $order->product->id }}">

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <select name="rating" id="rating" class="form-select" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="review" class="form-label">Review:</label>
                    <textarea name="review" id="review" class="form-control" rows="4" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 text-white">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
