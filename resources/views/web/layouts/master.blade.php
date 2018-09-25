<!doctype html>
<html lang="{{ \App::getLocale() }}">
    <head>
        @include('web/layouts/modules/metadata')
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/mobile-navigation/custom-navigation.css') }}">
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,700" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/customs-1.0.1/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ get_asset('css/styles.css') }}">
        @yield('styles')
    </head>
    <body data-spy="scroll" data-target="#myNavbar" data-offset="100">
        @include('web.layouts.modules.facebook')

        <div id="td-outer-wrap">
            <header class="tp-header {{ Request::is('/') ? 'homepage' : 'layoutpage' }}">
                @include('web.layouts.modules.header')
            </header>

            <main>
                @yield('content')
                <a href="#" class="scrollup" title="@lang('scroll_to_top')"><i class="fa fa-arrow-up"></i></a>

                <div class="fb-customerchat"
                  attribution=setup_tool
                  page_id="1662541773864552"
                  theme_color="#02a676">
                </div>
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

        <!-- Facebook Pixel Code -->
        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '1783355911741045');
          fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
          src="https://www.facebook.com/tr?id=1783355911741045&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->

        @yield('scripts')
    </body>
</html>
