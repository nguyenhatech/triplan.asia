<!doctype html>
<html lang="{{ \App::getLocale() }}">
    <head>
        @include('web/layouts/modules/metadata')
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/fontawesome/all.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
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
                margin-bottom: 100px;
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

            /* ITEM-1 */
            .item-1 {
                height: calc(100vh - 100px);
            }
            .item-1 .container-fluid {
                padding-left: 0px;
                padding-right: 0px;
            }
            .item-1 .info {
                background-color: #222222;
                height: calc(100vh - 100px);
                padding: 80px 50px 50px 60px;
                color: #fff;
            }
            .item-1 .info .caption {
                padding-top: 20px;
                font-size: 13px;
                padding-bottom: 15px;
            }
            .item-1 .view-more {
                color: #fff;
                padding: 13px 55px 13px 55px;
                border-radius: 0px;
                border: 2px solid #fff;
                font-size: 13px;
                transition: all 0.25s;
            }
            .item-1 .view-more:hover {
                transform: scale(0.95);
                border: 0px solid #fff;
                transition: all 0.25s;
                background-color: #52A5B8;
                border-color: #52A5B8;
            }
            .item-1 .list-images {
                height: calc(100vh - 100px);
            }
            .item-1 .list-images .item {
                height: calc(100vh - 100px) !important;
            }
            .item-1 .list-images img {
                object-fit: cover;
                height: calc(100vh - 100px) !important;
            }

            /*// Custom 2 nút next prew của phần ảnh phòng*/
            .item-1 .owl-prev, .item-1 .owl-next {
                display: inline-block;
                font: normal normal normal 14px/1 FontAwesome;
                font-family: 'Font Awesome\ 5 Free';
                font-size: inherit;
                text-rendering: auto;
                -webkit-font-smoothing: antialiased;
                -moz-osx-font-smoothing: grayscale;
            }

            .item-1 .owl-prev:before {
                content: "\f060";
                font-weight: 900;
                font-family: 'Font Awesome 5 Free';
            }
            .item-1 .owl-next:before {
                content: "\f061";
                font-weight: 900;
                font-family: 'Font Awesome 5 Free';
            }
            .item-1 .owl-dots {
                position: absolute;
                bottom: 5px;
                left: 0;
                text-align: center;
                width: 100%;
            }
            .item-1  .owl-nav [class*=owl-] {
                position: absolute;
                top: calc(50% - 23px );
                margin: 0;
                background: rgba(255,255,255,0.9) !important;
                color: #1a1a1a;
                padding: 10px;
                font-size: 20px !important;
                border-radius: 50% !important;
                width: 50px !important;
                height: 50px !important;
            }
            .item-1 .owl-next {
                right: 35px;
            }
            .item-1 .owl-prev{
                left: 35px;
            }
            .owl-theme .owl-nav [class*=owl-]:hover {
                color: #4a4a4a;
            }


            /*// ITEM2*/
            .item-2 {
                padding-top: 100px;
                height: calc(100vh);
            }
            .item-2 .image {
                padding: 0px 15px 0px 45px;
            }
            .item-2 img {
                object-fit: cover;
                width: 100%;
            }

            .item-2 .info {
                background-color: #fff;
                padding: 80px 50px 50px 60px;
            }

            .item-2 .info .caption {
                padding-top: 20px;
                font-size: 13px;
                padding-bottom: 15px;
            }
            .item-2 .view-more {
                padding: 13px 55px 13px 55px;
                border-radius: 0px;
                border: 2px solid #000;
                font-size: 13px;
                transition: all 0.25s;
                color: #000;
            }
            .item-2 .view-more:hover {
                transform: scale(0.95);
                border: 0px solid #fff;
                transition: all 0.25s;
                background-color: #52A5B8;
                border-color: #52A5B8;
                color: #fff;
            }

            /*ITEM3*/
            .item-3 {
                width: 100vw;
                height: 100vh;
                position: relative;
            }
            .item-3 img {
                height: 100vh;
                object-fit: cover;
            }
            .item-3 .info {
                position: absolute;
                top: 0px;
                z-index: 150000px !important;
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
        <div class="item-1">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="info col-md-4">
                        <h4>Triplan Room</h4>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <a href="#" class="btn view-more">
                            View more
                        </a>
                    </div>
                    <div class="list-images col-md-8">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <img class="owl-lazy lazyOwl" data-src="https://themegoods-cdn-pzbycso8wng.stackpathdns.com/hoteller/beach/wp-content/uploads/2018/07/kari-shea-99868-unsplash-1024x683.jpg" title="Nhấp vào ảnh để xem với kích thước lớn" />
                            </div>
                            <div class="item">
                                <img class="owl-lazy lazyOwl" data-src="https://themegoods-cdn-pzbycso8wng.stackpathdns.com/hoteller/beach/wp-content/uploads/2018/06/anthony-delanoix-21053-unsplash-1024x683.jpg" title="Nhấp vào ảnh để xem với kích thước lớn" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-2">
            <div class="container-fluid">
                <div class="row no-gutters">
                    <div class="col-md-7">
                        <div class="image">
                            <img src="https://themegoods-cdn-pzbycso8wng.stackpathdns.com/hoteller/beach/wp-content/uploads/2018/07/home_pic3.jpg">
                        </div>
                    </div>
                    <div class="info col-md-5">
                        <h4>Triplan Room</h4>
                        <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <a href="#" class="btn view-more">
                            View more
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="item-3">
            <div class="info">
                <h4>Triplan Room</h4>
                <div class="caption">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <a href="#" class="btn view-more">
                    View more
                </a>
            </div>
            <div class="list-images">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img class="owl-lazy lazyOwl" data-src="https://themes.themegoods.com/hoteller/beach/wp-content/uploads/2018/06/Porto-Fira-Suites-Hotel-in-Santorini-by-Interior-Design-Laboratorium-Yellowtrace-12.jpg" title="Nhấp vào ảnh để xem với kích thước lớn" />
                    </div>
                    <div class="item">
                        <img class="owl-lazy lazyOwl" data-src="https://themegoods-cdn-pzbycso8wng.stackpathdns.com/hoteller/beach/wp-content/uploads/2018/06/anthony-delanoix-21053-unsplash-1024x683.jpg" title="Nhấp vào ảnh để xem với kích thước lớn" />
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="{{ asset('web/librarys/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/fontawesome/all.js') }}"></script>
    <script type="text/javascript" src="{{ asset('web/librarys/owl-carousel-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".item-1 .owl-carousel").owlCarousel({
                loop:true,
                dots:false,
                nav:false,
                responsiveClass:true,
                margin: 5,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                lazyLoad: true,
                lazyLoadEager: 2,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        stagePadding: 20
                    },
                    768:{
                        items:1,
                        nav:true,
                        dots:true
                    }
                }
            });

            $(".item-3 .owl-carousel").owlCarousel({
                loop:true,
                dots:false,
                nav:false,
                responsiveClass:true,
                margin: 5,
                autoplay: true,
                autoplayTimeout: 6000,
                autoplaySpeed: 2000,
                autoplayHoverPause: true,
                lazyLoad: true,
                lazyLoadEager: 2,
                responsive:{
                    0:{
                        items:1,
                        nav:true,
                        stagePadding: 20
                    },
                    768:{
                        items:1,
                        nav:false,
                        dots:false
                    }
                }
            });

            $('.owl-prev').text('');
            $('.owl-next').text('');
        });
    </script>
</html>
