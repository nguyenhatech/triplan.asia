<!doctype html>
<html lang="vi">
    <head>
        @include('web/layouts/modules/metadata')
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        {{-- <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,700" rel="stylesheet"> --}}
        {{-- <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/customs-1.0.1/css/style.css') }}">
        @yield('styles')
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.0';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
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
        <script type="text/javascript" src="{{ get_asset('web/librarys/customs-1.0.1/js/web.js') }}"></script>
        @yield('scripts')
    </body>
</html>
