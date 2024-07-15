<section class="container mt-5">
    <header class="mb-4">
        <h2>Update Password</h2>
        <p>Ensure your account is using a long, random password to stay secure.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Current Password</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password" />
            <div class="text-danger">{{ $errors->updatePassword->first('current_password') }}</div>
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">New Password</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password" />
            <div class="text-danger">{{ $errors->updatePassword->first('password') }}</div>
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password" />
            <div class="text-danger">{{ $errors->updatePassword->first('password_confirmation') }}</div>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <button type="submit" class="btn btn-success">Save</button>
            @if (session('status') === 'password-updated')
                <p class="text-success mb-0">Saved.</p>
            @endif
        </div>
    </form>
</section>
