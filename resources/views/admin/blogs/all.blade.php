@extends($layout)
@section('content')
<h1>All Articles</h1>
<ul>
    @foreach ($blogs as $blog)
        <a href="{{ route('blogs.show', $blog->id) }}"><h2>{{ $blog->title }}</h2></a>
        <p>Written by: {{ $blog->author->name }}<br><small>Published on: {{ $blog->created_at->format('d M Y') }}</small></p>

    @endforeach
</ul>
@endsection
