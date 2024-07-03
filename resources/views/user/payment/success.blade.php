
@extends($layout)
@section('content')
<h1>Payment Successful!</h1>
<p>Order ID: {{ $order->id }}</p>
<p>Product: {{ $order->product->product_name }}</p>
<p>Total Price: {{ $order->total_price }}</p>


@php
    $userHasReviewed = $order->product->reviews->contains('user_id', auth()->id());
@endphp

{{-- Tombol untuk mengunduh struk sebagai PDF --}}
<a href="{{ route('order.receipt', $order->id) }}" class="btn btn-primary">Download Receipt (PDF)</a>

@if (!$userHasReviewed)
    <!-- Form for rating and review -->
    <form method="POST" action="{{ route('reviews.store') }}">
        @csrf
        <input type="hidden" name="product_id" value="{{ $order->product->id }}">

        <div>
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
        </div>

        <div>
            <label for="review">Review:</label>
            <textarea name="review" id="review" required></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
@else
    <p>You have already reviewed this product.</p>
@endif

@endsection
