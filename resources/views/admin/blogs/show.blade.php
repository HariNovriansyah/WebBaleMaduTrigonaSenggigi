@extends($layout)
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <div class="bg-light p-5 rounded">
                <h1 class="blog-title">{{ $blog->title }}</h1>
                <small class="text-muted">Published on: {{ $blog->created_at->format('d M Y') }}</small>
                <hr>
                <p class="blog-content">{{ $blog->content }}</p>
                <p class="text-muted">Written by: {{ $blog->author->name }}</p>
            </div>

            <section class="comment-section mt-5">
                <h2>Comments</h2>
                @foreach ($blog->comments as $comment)
                    <div class="bg-white p-3 rounded shadow-sm mb-3">
                        <p class="comment-author"><strong>{{ $comment->user->name }}</strong> commented:</p>
                        <p id="comment-content-{{ $comment->id }}">{{ $comment->content }}</p>
                        <small class="text-muted">Published on: {{ $comment->created_at->format('d M Y, H:i') }}</small><br>
                        @if (Auth::check() && $comment->user_id == Auth::id())
                            <button class="btn btn-sm btn-outline-primary mt-2" onclick="toggleEditForm({{ $comment->id }})">Edit</button>
                            <form id="edit-form-{{ $comment->id }}" method="post" action="{{ route('comments.update', $comment->id) }}" style="display: none;">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <textarea name="content" class="form-control" required>{{ $comment->content }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        @endif
                    </div>
                @endforeach

                @auth
                    <form method="post" action="{{ route('comments.store', $blog->id) }}" class="mt-4">
                        @csrf
                        <div class="mb-3">
                            <label for="content" class="form-label">Add a comment:</label>
                            <textarea id="content" name="content" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                @else
                    <p>Please <a href="{{ route('login') }}">log in</a> to add a comment.</p>
                @endauth
            </section>
        </div>
    </div>
</div>

<script>
function toggleEditForm(commentId) {
    var editForm = document.getElementById('edit-form-' + commentId);
    var commentContent = document.getElementById('comment-content-' + commentId);
    if (editForm.style.display === 'none') {
        editForm.style.display = 'block';
        commentContent.style.display = 'none';
    } else {
        editForm.style.display = 'none';
        commentContent.style.display = 'block';
    }
}
</script>
@endsection
