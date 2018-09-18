<!doctype html>
<html lang="{{ \App::getLocale() }}">
    <head>
        @include('web/layouts/modules/metadata')
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/mobile-navigation/custom-navigation.css') }}">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet"> --}}
        {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css"> --}}
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/customs-1.0.1/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('css/styles.css') }}">
        @yield('styles')
    </head>
    <body>
        @include('web.layouts.modules.facebook')

        <div id="td-outer-wrap">
            <header class="tp-header {{ Request::is('/') ? 'homepage' : 'layoutpage' }}">
                @include('web.layouts.modules.header')
            </header>

            <main>
                @yield('content')
                <a href="#" class="scrollup" title="@lang('scroll_to_top')"><i class="fa fa-arrow-up"></i></a>

{{--                 <div class="fb-customerchat"
                  attribution=setup_tool
                  page_id="1662541773864552"
                  theme_color="#02a676">
                </div> --}}
            </main>

            <footer>
                @include('web.layouts.modules.footer')
            </footer>
        </div>

        @include('web.layouts.modules.side-bar')

        <script type="text/javascript" src="{{ get_asset('web/librarys/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/mobile-navigation/custom-navigation.js') }}"></script>
        <script type="text/javascript" src="{{ get_asset('web/librarys/customs-1.0.1/js/web.js') }}"></script>
        @if (!Request::is('*/gio-hang'))
            <script type="text/javascript" src="{{ get_asset('web/librarys/customs-1.0.1/js/header.js') }}"></script>
        @endif
        @yield('scripts')
    </body>
</html>
