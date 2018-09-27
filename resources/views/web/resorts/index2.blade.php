<!doctype html>
<html lang="{{ \App::getLocale() }}">
    <head>
        @include('web/layouts/modules/metadata')
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/fontawesome/all.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.theme.default.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cormorant+Upright" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <style type="text/css">

        </style>
    </head>
    <body>
        <p>Mại dô</p>
    </body>
    <script type="text/javascript" src="{{ asset('web/librarys/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/fontawesome/all.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/owl-carousel-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            items: 1,
            loop: true,
            lazyLoad: true,
            autoplay: true,
            autoplayTimeout: 5000
        })
    </script>
</html>
