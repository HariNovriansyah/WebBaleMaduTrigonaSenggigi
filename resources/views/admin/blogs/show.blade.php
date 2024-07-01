@extends($layout)
@section('content')
<ul>
    <h1>{{ $blog->title }}</h1>
    <small>Published on: {{ $blog->created_at->format('d M Y') }}</small>

    <p>{{ $blog->content }}</p>
    <p>Written by: {{ $blog->author->name }}</p>



</ul>

<section>
    <h2>Comments</h2>

    @foreach ($blog->comments as $comment)
        <div>
            <p><strong>{{ $comment->user->name }}</strong> commented:</p>
            <p id="comment-content-{{ $comment->id }}">{{ $comment->content }}</p>
            <small>Published on: {{ $comment->created_at->format('d M Y, H:i') }}</small>
            @if (Auth::check() && $comment->user_id == Auth::id())
                <button onclick="toggleEditForm({{ $comment->id }})">Edit</button>
                <form id="edit-form-{{ $comment->id }}" method="post" action="{{ route('comments.update', $comment->id) }}" style="display: none;">
                    @csrf
                    @method('PUT')
                    <textarea name="content" required>{{ $comment->content }}</textarea>
                    <button type="submit">Update</button>
                </form>
            @endif
        </div>
    @endforeach

    @auth
        <form method="post" action="{{ route('comments.store', $blog->id) }}">
            @csrf
            <div>
                <label for="content">Add a comment:</label>
                <textarea id="content" name="content" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    @else
        <p>Please <a href="{{ route('login') }}">log in</a> to add a comment.</p>
    @endauth
</section>


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
