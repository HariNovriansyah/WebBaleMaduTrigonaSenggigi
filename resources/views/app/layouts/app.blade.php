<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::user()->id ?? '' }}">
    <meta name="api-token" content="">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet">

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link rel="stylesheet" href="{{ asset('assets/templates/lib/animate/animate.min.css') }}"/>
        <link href="{{ asset('assets/templates/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/templates/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('assets/templates/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('assets/templates/css/style.css') }}" rel="stylesheet">

    <title>Madu Trigona</title>
    @yield('style')
    <style>
                /* :root{
            --bs-primary : #ffbd67 !important;
            --bs-blue : #73ab45 !important;
        } */

        btn-primary {
            background-color: var(--bs-primary) !important;
        }
    </style>
</head>

<body>
    @include('app.layouts.navbar')
    <div>
        <main>
            @yield('content')
        </main>

    </div>
    @include('app.layouts.footer')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/templates/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/templates/lib/owlcarousel/owl.carousel.min.js') }}"></script>


    <!-- Template Javascript -->
    <script src="{{ asset('assets/templates/js/main.js') }}"></script>

    <script src="{{ asset('assets/templates/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
