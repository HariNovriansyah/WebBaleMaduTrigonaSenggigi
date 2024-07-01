@extends($layout)
@section('content')

<h1>Blogs</h1>

<a href="{{ route('blogs.create') }}">Create New Blog</a>

    @if ($blogs->isEmpty())
        <p>No blogs available.</p>
    @else
        <ul>
            @foreach ($blogs as $blog)

                <li>
                    <h2>{{ $blog->title }}</h2>
                    <a href="{{ route('blogs.edit',$blog->id ) }}">Edit Blog</a>

                    <p>{{ $blog->content }}</p>
                    <p>Written by: {{ $blog->user->name }}</p>
                    <p>Published on: {{ $blog->created_at->format('d M Y') }}</p>

                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif

@endsection
