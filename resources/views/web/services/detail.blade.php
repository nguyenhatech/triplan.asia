@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.theme.default.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">

    <style type="text/css">
        body {
            position: relative !important;
        }
        .service-banner {
            margin-top: 50px;
            margin-bottom: 20px;
            background-color: #f6f6f6;
            height: 400px !important;
            overflow: hidden;
        }
        .service-banner img {
            object-fit: contain;
            height: 400px !important;
            width: auto !important;
        }
        @media screen and (min-width: 768px) {
            .service-banner {
                height: 400px !important;
            }
        }

        .service-name h1 {
            color: #333;
            font-size: 20px;
            margin-top: 20px;
            font-weight: bold;
        }
        @media screen and (min-width: 768px) {
            .service-name h1 {
                font-size: 22px;
            }
        }

        .service-time_confirm_love {
            padding: 15px 0px;
        }
        .service-time_confirm_love .time_confirm {
            border: 1px solid #e6e6e6;
            padding: 2px 6px;
            border-radius: 2px;
        }
        .service-time_confirm_love .time_confirm i {
            color: #1AAC7C;
            margin-right: 8px;
        }
        .service-time_confirm_love .time_confirm span {
            font-weight: 700;
        }
        .service-time_confirm_love .love i {
            color: #1AAC7C;
            margin-right: 8px;
            font-size: 16px;
        }

        .service-sub_data_mobile {
            padding: 0px 0px 10px 0px;
        }
        .service-sub_data_mobile .price {
            color: red;
            font-weight: 700;
            font-size: 24px;
            display: block;
            margin-bottom: 10px;
        }
        .service-sub_data_mobile .count-booking {
            color: rgba(0,0,0,0.54);
        }
        .service-comforts {
            padding: 10px 0px;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }
        .service-comforts .comfort_item {
            padding: 10px 20px 10px 0px;
        }

        .service-description {
            padding: 10px 0px;
            text-align: justify;
            font-family: 'Nunito', sans-serif !important;
        }

        .service-what_to_expect {
           text-align: justify;
           overflow: hidden;
           padding-bottom: 15px;
           font-family: 'Nunito', sans-serif !important;
        }
        .service-what_to_expect h4 {
            font-weight: 700;
            margin-top: 10px;
            font-size: 18px;
        }
        .service-involve {
            padding: 20px 0px;
            border-top: 1px solid #eee;
        }
        .service-involve a {
            text-decoration: none;
        }
        .service-involve_item__wrap {
            margin: 5px;
        }
        @media screen and (min-width: 768px) {
            .service-involve_item__wrap {
                margin: 5px;
            }
        }
        .service-involve_item__wrap .image {
            height: 150px;
            transition: 0.1s all;
        }
        .service-involve_item__wrap .image:hover {
            opacity: 0.7;
            transition: 0.1s all;
        }
        .service-involve_item__wrap .image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .service-involve_item__wrap .info {
            border: 1px solid #eee;
            padding: 10px;
        }
        .service-involve_item__wrap .info .name {
            min-height: 50px;
            font-size: 15px;
            font-weight: 700;
            line-height: 20px;
            padding: 0px 0px;
            color: #000;
        }
        .service-involve_item__wrap .info .price {
            color: red;
            font-weight: 700;
        }

        .booking-on-mobile {
            position: fixed;
            bottom: 0px;
            z-index: 1000;
            background-color: #fff;
            box-shadow: 1px 0 2px rgba(0,0,0,.4);
            width: 100%;
            height: 70px;
        }
        .booking-on-mobile div {
            width: 100%;
            height: 100%;
            padding: 10px 15px;
        }
        .booking-on-mobile a {
            width: 100%;
            color: #fff;
            font-size: 17px;
            height: 100%;
            line-height: 40px;
        }

        .booking-service-destop {
            background-color: #fff;
            min-height: 300px;
            width: 365px;
            padding: 20px 15px;
            border-radius: 2px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 3px 15px 2px rgba(0, 0, 0, 0.15);
            border: none;
        }
        .booking-service-destop .price {
            color: red;
            font-weight: 700;
            font-size: 20px;
        }
        .booking-service-destop .booking-now {
            background-color: #1AAC7C;
            color: #fff;
            font-weight: 700;
            font-size: 16px;
            width: 100%;
            margin-top: 10px;
        }
        .booking-service-destop .booking-now:hover {
            color: #fff;
            box-shadow: 1px 0 2px rgba(0,0,0,.4);
        }
        .booking-service-destop .count-booking {
            margin-top: 15px;
            color: rgba(0,0,0,0.54);
        }
        .fixed {
            position: fixed;
            top: 50px;
            z-index: 1001;
        }

        .fancybox-thumbs {
            top: auto;
            width: auto;
            bottom: 0;
            left: 0;
            right : 0;
            height: 95px;
            padding: 10px 10px 5px 10px;
            box-sizing: border-box;
            background: rgba(0, 0, 0, 0.3);
        }

        .fancybox-show-thumbs .fancybox-inner {
            right: 0;
            bottom: 95px;
        }

        /*Phần Hiện cái Menu Tổng quan - Các gói dịch vụ - Bản đồ ...*/
        .fixed-myNavbar {
            position: fixed;
            top: 50px;
            z-index: 1001;
            width: 1110px;
            background-color: #fff;
        }
        #myNavbar {
            height: 50px;
        }
        #myNavbar .bg-light {
            height: 50px;
            padding-left: 0px;
        }
        #myNavbar a {
            color: #000;
            font-size: 13px;
            /*text-transform: uppercase;*/

        }
        .fixed-myNavbar .bg-light {
            background-color: #fff !important;
            box-shadow: 1px 0 2px rgba(0,0,0,.3) !important;

        }
        .fixed-myNavbar + #sum {
            padding-top: 80px;
        }
        .fixed-myNavbar .nav-pills .nav-link.active {
            background-color: red !important;
            color: #fff !important;
            border-radius: 50px;
            padding: 5px 20px;
        }
        .fixed-myNavbar .nav {
            align-items: center;
        }


        /*// Custom 2 nút next prew của phần ảnh phòng*/
        .service-banner .owl-prev, .service-banner .owl-next {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-family: 'Font Awesome\ 5 Free';
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .service-banner .owl-prev:before {
            content: "\f060";
            font-weight: 900;
            font-family: 'Font Awesome 5 Free';
        }
        .service-banner .owl-next:before {
            content: "\f061";
            font-weight: 900;
            font-family: 'Font Awesome 5 Free';
        }
        .service-banner .owl-dots {
            position: absolute;
            bottom: 5px;
            left: 0;
            text-align: center;
            width: 100%;
        }
        .service-banner  .owl-nav [class*=owl-] {
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
        .service-banner .owl-next {
            right: 35px;
        }
        .service-banner .owl-prev{
            left: 35px;
        }
    </style>
@endsection

@php
    $locale = \App::getLocale();
@endphp

@section('content')
    <div class="service-banner">
        <div class="owl-carousel owl-theme">
            @forelse ($service->media_services as $media)
                <a href="{{ $media->getImage() }}" data-fancybox="images">
                    <img src="{{ $media->getImage() }}" title="Nhấp vào ảnh để xem với kích thước lớn" />
                </a>
            @empty

            @endforelse
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="service-info">
                    <div id="myNavbar">
                        <nav class="navbar navbar-light bg-light">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link" href="#sum">Tổng quan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#package">Các gói dịch vụ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#exptect">Bạn sẽ được gì ?</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#map1">Bản đồ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                    <div id="sum">
                        <div class="service-name">
                            <h1>{{ title_case($service->getTranslation($locale)->name) }}</h1>
                        </div>
                        <div class="service-sub_data_mobile d-block d-sm-none">
                            <div>
                                <div>
                                    <span class="price">{{ $service->getPrice() }}</span>
                                </div>
                                <div class="count-booking">
                                    <i class="fas fa-users"></i>
                                    836 Đã được đặt
                                </div>
                            </div>
                        </div>
                        @if (count($service->comforts))
                            <div class="service-comforts d-flex flex-wrap">
                                @forelse ($service->comforts as $comfort)
                                    <div class="comfort_item">
                                        <i class="fas fa-globe"></i>
                                        <span>{{ $comfort->getTranslation($locale)->name }}</span>
                                    </div>
                                @empty

                                @endforelse
                            </div>
                        @endif
                        @if ($service->getTranslation($locale)->description)
                            <div class="service-description">
                                <div>
                                    {!! $service->getTranslation($locale)->description !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div id="package">
                        <list-service-package
                            :data_booking="{{ $data_booking }}"
                            :service="{{ $service }}"
                            :data_params="{{ $data_params }}">

                        </list-service-package>
                    </div>
                    <div id="exptect">
                        @if ($service->getTranslation($locale)->what_to_expect)
                            <div class="service-what_to_expect">
                                <h4>@lang('web_service_experience_for_you')</h4>
                                <div>
                                    {!! $service->getTranslation($locale)->what_to_expect !!}
                                </div>
                            </div>
                        @endif
                        @if ($service->getTranslation($locale)->activity_information)
                            <div class="service-what_to_expect">
                                <h4>@lang('web_service_information_services')</h4>
                                <div>
                                    {!! $service->getTranslation($locale)->activity_information !!}
                                </div>
                            </div>
                        @endif
                        @if ($service->getTranslation($locale)->additional_information)
                            <div class="service-what_to_expect">
                                <h4>@lang('web_service_additional_information')</h4>
                                <div>
                                    {!! $service->getTranslation($locale)->additional_information !!}
                                </div>
                            </div>
                        @endif
                        @if ($service->getTranslation($locale)->how_to_use)
                            <div class="service-what_to_expect">
                                <h4>@lang('web_service_user_manual')</h4>
                                <div>
                                    {!! $service->getTranslation($locale)->how_to_use !!}
                                </div>
                            </div>
                        @endif
                    </div>
                    <div id="map1" class="service-what_to_expect">
                        <h4>@lang('web_service_map')</h4>
                        <div id="map" style="height: 400px; background-color: #ccc"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="booking-service-destop d-none d-sm-block">
                    <oder-box :service="{{ $service }}" :data_params="{{ $data_params }}"></oder-box>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="service-involve">
                    <h4>@lang('web_service_maybe_you_are_interested')</h4>
                    <div class="owl-carousel">
                        @forelse ($service_involves as $service_involve)
                            <a href="{{ route('web.services.detail', [$service_involve->getTranslation($locale)->slug, $service_involve->uuid]) }}">
                                <div class="service-involve_item__wrap">
                                    <div class="image">
                                        <img src="{{ $service_involve->getImage('sm') }}"  alt="{{ $service_involve->getTranslation($locale)->name }}" title="{{ $service_involve->getTranslation($locale)->name }}">
                                    </div>
                                    <div class="info d-flex flex-column">
                                        <div class="name">
                                            <span>
                                                {{ shortString(title_case($service_involve->getTranslation($locale)->name), 58) }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <span class="address" style="color: #888888">
                                                @if($service_involve->getTranslation($locale)->address)
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <span>{{ $service_involve->place ? $service_involve->place->getTranslation($locale)->name: '' }}</span>
                                                @endif
                                            </span>

                                            <span class="d-flex align-items-center">
                                                <span class="price">{{ $service_involve->getPrice() }}</span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            {{-- empty expr --}}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="booking-on-mobile d-block d-sm-none">
        <div class="d-flex justify-content-between align-items-center">
            <a href="/" class="btn btn-success">
                Đặt ngay
            </a>
            <a href="https://www.facebook.com/TriplanVN/" target="_blank" class="btn btn-block btn-warning" style="color: #fff; margin-left: 10px;">
                Chat ngay với Triplan
            </a>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCODSbfU_kkgIfebejWqASwb-tQ6g_t8ec&language=vi&libraries=places&callback=initMap">
    </script>
    <script type="text/javascript" src="{{ get_asset('web/librarys/owl-carousel-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
    <script>
        $(".service-involve .owl-carousel").owlCarousel({
            loop:false,
            dots:false,
            nav:false,
            responsiveClass:true,
            autoplay: true,
            autoplayTimeout: 3500,
            autoplaySpeed: 1200,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    stagePadding: 20
                },
                768:{
                    items:3,
                    nav:true,
                    stagePadding: 0
                },
                1024:{
                    items:4,
                    nav:true,
                    stagePadding: 0
                }
            }
        });
        $(".service-banner .owl-carousel").owlCarousel({
            loop:true,
            dots:false,
            nav:false,
            responsiveClass:true,
            autoWidth:true,
            margin: 4,
            // autoplay: false,
            // autoplayTimeout: 5000,
            // autoplaySpeed: 2000,
            // autoplayHoverPause: true,
            responsive:{
                0:{
                    items:1,
                    nav:true,
                    stagePadding: 20
                },
                768:{
                    items:6,
                    nav:true,
                    dots:true
                }
            }
        });
        $('.owl-prev').text('');
        $('.owl-next').text('');

        function initMap() {
            var myLatLng = {
                lat: {{ $service->lat }},
                lng: {{ $service->lng }},
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                icon: {
                    path: 'M 0,0 0,0 z',
                    scale: 10,
                    strokeColor: 'rgba(243, 165, 55, .4)',
                    strokeWeight: 120
                },
                title: 'Hello World!'
            });
        }

        $(window).scroll(function() {
            let body = document.body,
                html = document.documentElement;

            let height = Math.max( body.scrollHeight, body.offsetHeight,
                                   html.clientHeight, html.scrollHeight, html.offsetHeight );
            if ($(this).scrollTop() > 415) {
                $('.booking-service-destop').addClass('fixed');
                $('#myNavbar').addClass('fixed-myNavbar');
            } else {
                $('.booking-service-destop').removeClass('fixed');
                $('#myNavbar').removeClass('fixed-myNavbar');
            }

            if ($(this).scrollTop() > (height - 1280)) {
                $('.booking-service-destop').removeClass('fixed');
            }
        });

        // Add smooth scrolling on all links inside the navbar
        $("#myNavbar a").on('click', function(event) {
          // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 800, function(){

              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          }  // End if
        });
    </script>
@endsection
