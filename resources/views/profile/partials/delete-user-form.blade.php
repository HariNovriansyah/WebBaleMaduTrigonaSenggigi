<section class="container mt-5">
    <header class="mb-4">
        <h2>Delete Account</h2>
        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
    </header>

    <button class="btn btn-danger" onclick="document.getElementById('confirm-user-deletion').style.display='block'">Delete Account</button>

    <div id="confirm-user-deletion" class="mt-4" style="display:none;">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Are you sure you want to delete your account?</h2>
                    <p class="card-text">Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>

                    <div class="mb-3">
                        <label for="password" class="form-label visually-hidden">Password</label>
                        <input id="password" name="password" type="password" class="form-control" placeholder="Password" />
                        <div class="text-danger">{{ $errors->userDeletion->first('password') }}</div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-secondary me-2" onclick="document.getElementById('confirm-user-deletion').style.display='none'">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="mb-10"></div>
</section>
