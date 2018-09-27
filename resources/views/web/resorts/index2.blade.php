<!doctype html>
<html lang="{{ \App::getLocale() }}">
    <head>
        @include('web/layouts/modules/metadata')
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/fontawesome/all.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.theme.default.min.css') }}"
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
        <style type="text/css">
            body {
                font-family: 'Roboto Condensed', sans-serif;
            }
            .resort-banner {
                width: 100vw;
                height: 100vh;
                background-image: url('https://themegoods-cdn-pzbycso8wng.stackpathdns.com/hoteller/beach/wp-content/uploads/2018/07/Porto-Fira-Suites-Hotel-in-Santorini-by-Interior-Design-Laboratorium-Yellowtrace-19.jpg');
                background-size: cover;
                background-position: center;
            }
            .resort-banner .caption {
                height: 100vh;
                align-items: center;
                background-color: #0000003d;
            }
            .resort-banner .caption h1 {
                font-size: 40px;
                font-weight: bold;
                color: #fff;
            }
            .resort-banner .caption h3 {
                font-size: 18px;
                color: #fff;
            }
            @media only screen and (min-width: 768px) {
                .resort-banner .caption h1 {
                    font-size: 70px;
                    font-weight: bold;
                    color: #fff;
                }
                .resort-banner .caption h3 {
                    font-size: 22px;
                    color: #fff;
                }
            }
        </style>
    </head>
    <body>
        <div class="resort-banner">
            <div class="caption d-flex flex-column justify-content-center">
                <h1>Triplan Luxury</h1>
                <h3>Chia sẻ, khám phá, kết nối !</h3>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="{{ asset('web/librarys/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/fontawesome/all.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/owl-carousel-2.3.4/dist/owl.carousel.min.js') }}"></script>
</html>
