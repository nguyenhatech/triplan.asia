<!doctype html>
<html lang="vi">
    <head>
        @include('web/layouts/modules/metadata')
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/drawer/drawer.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/customs-1.0.1/css/style.css') }}">
        @yield('styles')
    </head>
    <body class="drawer drawer--top drawer--navbarTopGutter">
        <header>
            @include('web.layouts.modules.header')
        </header>
        <main>
            @yield('content')
        </main>
        <footer>
            @include('web.layouts.modules.footer')
        </footer>
        <script type="text/javascript" src="{{ get_asset('web/librarys/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.2.0/iscroll.js"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/drawer/drawer.min.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/customs-1.0.1/js/web.js') }}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.drawer').drawer();
            });
        </script>
        @yield('scripts')
    </body>
</html>