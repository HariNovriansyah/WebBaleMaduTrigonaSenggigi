@extends('app.layouts.app')
@section('content')
<h1>Ini adalah Landing Page</h1>
@if (Route::has('login'))
<div>
    @auth
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        @else
            <a href="{{ route('user.home') }}">Home</a>
        @endif
    @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    @endauth
</div>
@endif
@endsection
