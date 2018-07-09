<!doctype html>
<html lang="vi">
    <head>
        @include('web/layouts/modules/metadata')
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/customs-1.0.1/css/style.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
        @yield('styles')
    </head>
    <body>
        @include('web.layouts.modules.facebook')
        <header>
            @include('web.layouts.modules.header')
        </header>
        <main style="padding-top: 107px">
            @yield('breadcrumb')
            @include('flash-message')
            @yield('content')
        </main>
        <footer>
            @include('web.layouts.modules.footer')
        </footer>
        <script type="text/javascript" src="{{ get_asset('web/librarys/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/customs-1.0.1/js/web.js') }}"></script>
        @include('pusher')
        @yield('scripts')
    </body>
</html>
