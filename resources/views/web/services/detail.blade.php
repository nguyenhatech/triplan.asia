@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
    <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/screens/web/services/detail.css') }}">
@endsection

@php
    $locale = \App::getLocale();
@endphp

@section('content')
    <div class="service-banner">
        <img src="{{ $service->getImage() }}"  alt="{{ $service->getTranslation($locale)->name }}" title="{{ $service->getTranslation($locale)->name }}">
        <div class="opacity">
            <div class="container d-flex align-items-end" style="height: 100%; padding-bottom: 20px;">
                <button id="view-photos" type="button" class="btn btn-light">@lang('web_service_view_photos')</button>
            </div>
        </div>
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
                    <div>
                        <list-service-package
                            :data_booking="{{ $data_booking }}"
                            :service="{{ $service }}"
                            :data_params="{{ $data_params }}">

                        </list-service-package>
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
                                        <div class="d-flex flex-column">
                                            <span class="price">{{ $service_involve->getPrice() }}</span>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
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
    <script type="text/javascript">
        $('#view-photos').on('click', async function() {
            imageList = [
                @forelse($service->media_services as $index => $image)
                {src: '{{ $image->getImage() }}', opts: { caption: '{{ $service->getTranslation($locale)->name . " - Ảnh " . ($index+1) }}', thumb: '{{ $image->getImage("tn") }}' }}
                @break($loop->last)
                ,
                @empty
                {src: '{{ $service->getImage() }}', opts: { caption: '{{ $service->getTranslation($locale)->name }}', thumb: '{{ $service->getImage("tn") }}' }}
                @endforelse
            ];
            $.fancybox.open(
                imageList,
                {
                    loop: true,
                    thumbs: {
                        autoStart: true,
                        axis: 'x'
                    }
                }
            );
        });
    </script>
@endsection
