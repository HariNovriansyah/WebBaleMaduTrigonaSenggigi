@extends($layout)
@section('content')

<h1>Create New Blog</h1>

    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content</label>
            <textarea id="content" name="content" rows="4" required></textarea>
        </div>
        <div>
            <button type="submit">Create Blog</button>
        </div>
    </form>

    <a href="{{ route('blogs.index') }}">Back to Blog Index</a>

@endsection
