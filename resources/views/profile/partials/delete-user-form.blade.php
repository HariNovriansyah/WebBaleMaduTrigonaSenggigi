
<section>
    <header>
        <h2>Delete Account</h2>
        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
    </header>

    <button onclick="document.getElementById('confirm-user-deletion').style.display='block'">Delete Account</button>

    <div id="confirm-user-deletion" style="display:none;">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2>Are you sure you want to delete your account?</h2>
            <p>Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.</p>

            <div>
                <label for="password" style="display:none;">Password</label>
                <input id="password" name="password" type="password" placeholder="Password" />
                <div>{{ $errors->userDeletion->first('password') }}</div>
            </div>

            <div>
                <button type="button" onclick="document.getElementById('confirm-user-deletion').style.display='none'">Cancel</button>
                <button type="submit">Delete Account</button>
            </div>
        </form>
    </div>
</section>
