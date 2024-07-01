<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Madu Trigona</title>
    @yield('style')
</head>
<body>
    @include('admin.layouts.navbar')
    @yield('content')
    @include('admin.layouts.footer')
    @yield('script')
</body>
</html>
