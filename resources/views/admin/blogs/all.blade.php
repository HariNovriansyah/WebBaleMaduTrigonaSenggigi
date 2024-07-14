@extends($layout)
@section('content')
<h1 class="display-4">All Articles</h1>
<ul class="list-unstyled">
    @foreach ($blogs as $blog)
        <li>
            <a href="{{ route('blogs.show', $blog->id) }}"><h2 class="font-weight-bold">{{ $blog->title }}</h2></a>
            <p class="small text-muted">Written by: {{ $blog->author->name }}<br><small>Published on: {{ $blog->created_at->format('d M Y') }}</small></p>
        </li>
    @endforeach
</ul>
@endsection
