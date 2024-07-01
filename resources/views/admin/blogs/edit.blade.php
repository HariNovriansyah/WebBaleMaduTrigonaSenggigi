@extends($layout)
@section('content')

<h1>Edit Blog</h1>

<form action="{{ route('blogs.update', $blog->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ $blog->title }}" required>
    </div>
    <div>
        <label for="content">Content</label>
        <textarea id="content" name="content" rows="4" required>{{ $blog->content }}</textarea>
    </div>
    <div>
        <button type="submit">Update Blog</button>
    </div>
</form>

<a href="{{ route('blogs.index') }}">Back to Blog Index</a>

@endsection
