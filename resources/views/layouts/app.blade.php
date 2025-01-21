<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" href="{{ asset('assets/images/logos/icon.png') }}">

    @stack('before-styles')
    <link href="{{ asset('assets/css/output.css') }}" rel="stylesheet">

    @stack('after-styles')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/neue-plak-webfont/neue-plak.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body>
    @yield('content')

    @yield('after-scripts')
</body>

</html>
