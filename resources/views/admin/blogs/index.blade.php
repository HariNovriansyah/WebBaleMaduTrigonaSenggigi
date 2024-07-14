@extends($layout)
@section('content')

<div class="container pt-4 pb-4">
    <h1 class="display-4 mb-4">Blogs</h1>

    <a href="{{ route('blogs.create') }}" class="btn btn-primary mb-4">Create New Blog</a>

    @if ($blogs->isEmpty())
        <p class="text-muted">No blogs available.</p>
    @else
        @foreach ($blogs as $blog)
            <hr class="my-4">
            <h2 class="mb-2">{{ $blog->title }}</h2>
            <p class="mb-2">{{ Str::limit($blog->content, 100) }}</p>
            <p class="mb-2">Written by: {{ $blog->author->name }}</p>
            <p class="mb-2">Published on: {{ $blog->created_at->format('d M Y') }}</p>
            <div class="mb-4">
                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-sm btn-secondary mr-2">Edit Blog</a>
                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this blog?')" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    @endif
</div>

@endsection
