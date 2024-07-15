<section class="container mt-5">
    <header class="mb-4">
        <h2>Profile Information</h2>
        <p>Update your account's profile information and email address.</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" required autofocus autocomplete="name" />
            <div class="text-danger">{{ $errors->first('name') }}</div>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required autocomplete="username" />
            <div class="text-danger">{{ $errors->first('email') }}</div>

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-3">
                    <p>Your email address is unverified.</p>
                    <button type="button" class="btn btn-primary" onclick="document.getElementById('send-verification').submit();">Click here to re-send the verification email.</button>
                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2">A new verification link has been sent to your email address.</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-success">Save</button>
            @if (session('status') === 'profile-updated')
                <p class="text-success mb-0">Saved.</p>
            @endif
        </div>
    </form>
</section>
