<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <title>@yield('title')</title>
</head>
<body>
    <div id="wrapper" class="wrapper">

        <section class="signUp">
            <div class="signUp__popup">
                @yield('content')
            </div>
            <!-- /.signUp__popup -->
        </section>
        <!-- /.signUp -->

    </div>
    <!-- /.wrapper -->
    <footer class="footer">
        <div class="container">
        </div>
        <!-- /.container -->
    </footer>

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>

    <!-- slick -->
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <!-- slick ^-->
    <script src="{{ asset('js/slider/slider.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>