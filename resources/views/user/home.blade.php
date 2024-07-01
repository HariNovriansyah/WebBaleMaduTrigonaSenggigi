@extends($layout)
@section('content')
<h1>HOME USER</h1>
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </a>
</form>
@endsection
