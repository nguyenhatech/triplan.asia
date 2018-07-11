<!doctype html>
<html lang="vi">
    <head>
        @include('web/layouts/modules/metadata')
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/mobile-navigation/custom-navigation.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/customs-1.0.1/css/style.css') }}">
        @yield('styles')
    </head>
    <body>
        <div id="td-outer-wrap">
            @include('web.layouts.modules.facebook')
            <header>
                @include('web.layouts.modules.header')
            </header>
            <main>
                @yield('content')
            </main>
            <footer>
                @include('web.layouts.modules.footer')
            </footer>
        </div>
        <div class="td-search-background" style="height: 100vh;">
          <div class="td-search-close">
            <a href="#"><i class="fa fa-times"></i></a>
          </div>
          <div>
              <a href="{{ env('APP_URL') }}">Test nhấn đi nào</a>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
        <script type="text/javascript" src="{{ get_asset('web/librarys/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/mobile-navigation/custom-navigation.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/customs-1.0.1/js/web.js') }}"></script>
        @yield('scripts')
    </body>
</html>
