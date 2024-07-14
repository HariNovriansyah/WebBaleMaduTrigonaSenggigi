<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::user()->id ?? '' }}">
    <meta name="api-token" content="">
    <title>Madu Trigona</title>
    @yield('style')
</head>

<body>
    @include('app.layouts.navbar')
    <div>
        <main>
            @yield('content')
        </main>

    </div>
    @include('app.layouts.footer')
    @yield('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // AJAX setup with CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#login-form').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: '{{ route('login') }}',
                    method: 'POST',
                    data: formData,
                    success: function(data) {
                        // Simpan token di localStorage
                        localStorage.setItem('api-token', data.token);
                        // Redirect ke URL yang diberikan
                        window.location.href = data.redirect_url;
                    },
                    error: function(response) {
                        alert('Login failed. Please check your credentials and try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>
