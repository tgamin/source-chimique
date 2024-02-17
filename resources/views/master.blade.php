<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Source | Chimique</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
        integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">

    {{-- Slick CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="asset('css/slick-theme.css')" /> --}}

    {{-- main CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('css')
</head>

<body>

    <!-- The header partial -->
    @include('partials.header')
    
    @yield('content')

    <!-- The footer partial -->
    @include('partials.footer')


    <!-- bootstrap JS -->
    {{-- <script src="{{ asset('js/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}"></script> --}}


    <!-- slick js -->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>

    @stack('scripts')

    {{-- file JS --}}
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
