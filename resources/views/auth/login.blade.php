@extends('app.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="text-white">Login</h3>
                </div>
                <div class="card-body">
                    <form id="login-form">
                        @csrf
                        <div class="form-group mb-3">
                            <input type="email" name="email" id="email" class="form-control" required placeholder="Email">
                        </div>
                        <div class="form-group mb-3">
                            <input type="password" name="password" id="password" class="form-control" required placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-3">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
