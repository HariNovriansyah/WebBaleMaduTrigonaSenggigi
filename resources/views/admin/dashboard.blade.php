@extends($layout)
@section('content')
<h1>DASHBOARD ADMIN</h1>

<a href="{{ route('blogs.index') }}">Blogs</a><br>
<a href="{{ route('products.index') }}">Products</a><br>
<a href="{{ route('admin.reports.orders') }}">Report</a>


<form method="POST" action="{{ route('logout') }}">
    @csrf
    <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        this.closest('form').submit();">
        {{ __('Log Out') }}
    </a>
</form>
@endsection
