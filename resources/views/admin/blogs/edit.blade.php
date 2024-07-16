@extends($layout)
@section('content')

<div class="container p-5 bg-white rounded-4">
    <h1 class="display-4">Edit Blog</h1>

    <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $blog->title }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea id="content" name="content" rows="4" class="form-control" required>{{ $blog->content }}</textarea>
        </div>
        <div class="d-flex justify-content-start">
            <button type="submit">Update Blog</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-link ms-2">Back to Blog Index</a>
        </div>
    </form>
</div>

@endsection
