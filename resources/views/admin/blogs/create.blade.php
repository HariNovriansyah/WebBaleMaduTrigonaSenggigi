@extends($layout)
@section('content')

<div class="container p-5 bg-white rounded-4">
    <h1 class="display-4 mb-4">Create New Blog</h1>

    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title" class="col-form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content" class="col-form-label">Content</label>
            <textarea id="content" name="content" rows="4" class="form-control" required></textarea>
        </div>
        <div class="d-flex justify-content-start">
            <button type="submit">Create Blog</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-link">Back to Blog Index</a>
        </div>
    </form>
</div>

@endsection
