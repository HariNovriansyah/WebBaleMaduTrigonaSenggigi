@extends($layout)
@section('content')

<h1>{{ $product->name }}</h1>
<p>{{ $product->description }}</p>
<p>Price: Rp{{ number_format($product->price, 0, ',', '.') }}</p>

<!-- Form for rating and review -->
<form method="POST" action="{{ route('reviews.store') }}">
    @csrf
    <input type="hidden" name="product_id" value="{{ $product->id }}">

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

<!-- Display reviews -->
<h2>Reviews</h2>
@foreach($product->reviews as $review)
    <div>
        <p><strong>{{ $review->user->name }}</strong> rated {{ $review->rating }} out of 5</p>
        <p>{{ $review->review }}</p>
    </div>
@endforeach

@endsection
