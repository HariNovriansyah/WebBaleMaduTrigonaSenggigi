@extends('app.layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="text-white">Register</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group mb-3">
                            {{-- <label for="name">Name</label> --}}
                            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required autofocus autocomplete="name" placeholder="name">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Username -->
                        <div class="form-group mb-3">
                            {{-- <label for="username">Username</label> --}}
                            <input id="username" type="text" name="username" value="{{ old('username') }}" class="form-control" required autocomplete="username" placeholder="username">
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div class="form-group mb-3">
                            {{-- <label for="address">Address</label> --}}
                            <input id="address" type="text" name="address" value="{{ old('address') }}" class="form-control" required autocomplete="address" placeholder="address">
                            @error('address')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email Address -->
                        <div class="form-group mb-3">
                            {{-- <label for="email">Email</label> --}}
                            <input id="email" type="email" name="email" value="{{ old('email') }}" class="form-control" required autocomplete="email" placeholder="email">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            {{-- <label for="password">Password</label> --}}
                            <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password" placeholder="password">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group mb-3">
                            {{-- <label for="password_confirmation">Confirm Password</label> --}}
                            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="confirm password">
                            @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group mb-3">
                            {{-- <label for="phone_number">Phone Number</label> --}}
                            <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" class="form-control" required autocomplete="phone_number" placeholder="phone number">
                            @error('phone_number')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Role (hidden input, default to 'user') -->
                        <input type="hidden" name="role" value="user">

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('login') }}">Already registered?</a>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
