<!-- resources/views/user/payment/edit_review.blade.php -->
@extends($layout)
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Edit Review</h1>

    <div class="card mb-4">
        <div class="card-header">
            <h3>Edit Your Review</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('reviews.update', $review->id) }}">
                @csrf

                <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <select name="rating" id="rating" class="form-select" required>
                        <option value="1" {{ $review->rating == 1 ? 'selected' : '' }}>1</option>
                        <option value="2" {{ $review->rating == 2 ? 'selected' : '' }}>2</option>
                        <option value="3" {{ $review->rating == 3 ? 'selected' : '' }}>3</option>
                        <option value="4" {{ $review->rating == 4 ? 'selected' : '' }}>4</option>
                        <option value="5" {{ $review->rating == 5 ? 'selected' : '' }}>5</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="review" class="form-label">Review:</label>
                    <textarea name="review" id="review" class="form-control" rows="4" required>{{ $review->review }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary rounded-pill py-2 px-4 text-white">Update Review</button>
            </form>
        </div>
    </div>
</div>
@endsection
