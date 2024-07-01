@extends($layout)
@section('content')
<h1>DASHBOARD ADMIN</h1>

<a href="{{ route('blogs.index') }}">Blogs</a>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </a>
</form>
@endsection
