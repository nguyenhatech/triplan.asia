@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}" >
    <style type="text/css">
        .service-banner {
            /*padding-top: 55px;
            height: 300px;
            background-color: #ccc;*/
            margin-bottom: 20px;
            position: relative;
        }
        .service-banner img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        @media screen and (min-width: 768px) {
            .service-banner {
                height: 450px;
            }
        }

        .service-name h1 {
            font-weight: 700;
            color: #333;
            font-size: 24px;
        }
        @media screen and (min-width: 768px) {
            .service-name h1 {
                font-size: 28px;
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
            padding: 20px 0px;
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
                margin: 10px;
            }
        }
        .service-involve_item__wrap .image {
            height: 225px;
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
            font-size: 17px;
            font-weight: 700;
            line-height: 20px;
            padding: 10px 0px;
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
            top: 65px;
            z-index: 1001;
        }
    </style>
@endsection

@php
    $locale = Session::get('locale', config('app.locale'));
@endphp

@section('content')
    <div class="service-banner">
        <img src="{{ $service->getImage() }}"  alt="{{ $service->getTranslation($locale)->name }}" title="{{ $service->getTranslation($locale)->name }}">
        <div class="opacity"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="service-info">
                    <div class="service-name">
                        <h1>{{ title_case($service->getTranslation($locale)->name) }}</h1>
                    </div>
                    <div class="service-sub_data_mobile d-block d-sm-none">
                        <div>
                            <div>
                                <span class="price">VND {{ number_format($service->getPrice()) }}</span>
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
                    <div>
                        <list-service-package :service="{{ $service }}" :data_params="{{ $data_params }}"></list-service-package>
                    </div>
                    @if ($service->getTranslation($locale)->description)
                        <div class="service-description">
                            <div>
                                {!! $service->getTranslation($locale)->description !!}
                            </div>
                        </div>
                    @endif
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
                    <div class="service-what_to_expect">
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
                    <h3>@lang('web_service_maybe_you_are_interested')</h3>
                    <div class="owl-carousel">
                        @forelse ($service_involves as $service_involve)
                            <a href="{{ route('web.services.detail', [$service_involve->id, $service_involve->getTranslation($locale)->slug]) }}">
                                <div class="service-involve_item__wrap">
                                    <div class="image">
                                        <img src="{{ $service_involve->getImage() }}"  alt="{{ $service_involve->getTranslation($locale)->name }}" title="{{ $service_involve->getTranslation($locale)->name }}">
                                    </div>
                                    <div class="info d-flex flex-column">
                                        <div class="name">
                                            <span>
                                                {{ title_case($service_involve->getTranslation($locale)->name) }}
                                            </span>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <span class="price">VND {{ number_format($service_involve->getPrice()) }}</span>
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCODSbfU_kkgIfebejWqASwb-tQ6g_t8ec&language=vi&libraries=places&callback=initMap">
    </script>
    <script type="text/javascript" src="{{ get_asset('web/librarys/owl-carousel-2.3.4/dist/owl.carousel.min.js') }}"></script>
    <script>
        $(".service-involve .owl-carousel").owlCarousel({
            loop:false,
            dots:false,
            nav:false,
            responsiveClass:true,
            autoplay: true,
            autoplayTimeout: 2000,
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
        $('.owl-prev').text('');
        $('.owl-next').text('');

        function initMap() {
            var myLatLng = {
                lat: {{ $service->lat }},
                lng: {{ $service->lng }},
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 12,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Hello World!'
            });
        }

        $(window).scroll(function() {
            let body = document.body,
                html = document.documentElement;

            let height = Math.max( body.scrollHeight, body.offsetHeight,
                                   html.clientHeight, html.scrollHeight, html.offsetHeight );
            if ($(this).scrollTop() > 500) {
                $('.booking-service-destop').addClass('fixed');
            } else {
                $('.booking-service-destop').removeClass('fixed');
            }

            if ($(this).scrollTop() > (height - 1280)) {
                $('.booking-service-destop').removeClass('fixed');
            }
        });
     </script>
@endsection
