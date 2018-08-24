@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .home-banner {
            position: relative;
        }
        .home-banner .slide-show {
            position: relative;
            width: 100vw;
            height: 60vh;
        }
        .home-banner .slide-show .slide-show__item {
            position: absolute;
        }
        .home-banner .slide-show img {
            width: 100vw;
            height: 60vh;
            object-fit: cover;
        }
        .home-banner .quick-search {
            position: absolute;
            top: 0;
            width: 100vw;
            height: 60vh;
            color: #fff;
        }
        .home-banner .quick-search {
            width: 100%;
            padding: 0px 15px;
            width: 320px;
        }
        .home-banner .solugan .main-solugan {
            font-size: 32px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.2rem;
            text-shadow: 1px 1px 1px rgba(0,0,0,.4);
            margin-bottom: 10px;
        }
        .home-banner .solugan .sub-solugan {
            font-size: 20px;
            font-weight: 400;
            margin: 0;
        }
        .home-banner .form {
            margin-top: 15px;
            width: 100%;
        }
        .home-banner .form input {
            font-size: 16px;
            border-radius: 2px 0px 0px 2px;
            height: 50px;
            border: 1px solid #fff;
            background-color: #fff;
        }
        /*.home-banner .form input:hover {
            border: 1px solid #01b07d;
        }*/
        .home-banner .form button {
            background-color: #01b07d;
            border-color: #01b07d;
            border-radius: 0px 2px 2px 0px;
            height: 50px;
            padding: 5px 20px;
        }
        @media  screen and (min-width: 375px) {
            .home-banner .quick-search {
                width: 375px;
            }
        }
        @media  screen and (min-width: 425px) {
            .home-banner .quick-search {
                width: 425px;
            }
        }
        @media  screen and (min-width: 768px) {
            .home-banner .solugan h1 {
                font-size: 18px;
            }
            .home-banner .solugan h2 {
                font-size: 42px;
                font-weight: bold;
            }
            .home-banner .quick-search {
                width: 850px;
            }
            .home-banner .form button {
                padding: 5px 35px;
            }
            .home-banner .slide-show {
                height: 81vh;
            }
            .home-banner .slide-show img {
                height: 81vh;
            }
            .home-banner .quick-search {
                height: 81vh;
            }
        }

        /*//==================================*/
        .home-title {
            padding: 30px 0px;
        }
        .home-title .title {
            font-size: 24px;
            font-weight: 700;
        }
        .home-title .description {
            color: #8D9199;
            font-size: 15px;
        }
        @media  screen and (min-width: 768px) {
            .home-title .title {
                font-size: 36px;
            }
        }

        /*//==================================*/
        .home-destinations .list__item {
            width: 100%;
            height: 300px;
            background-color: #ccc;
            border-radius: 6px;
            background-size: cover;
            background-position: center center;
            position: relative;
            margin-bottom: 30px;
            transition: 0.1s all;
        }
        .home-destinations .list__item:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 40px rgba(0, 0, 0, 0.15);
            transition: 0.1s all;
        }
        .home-destinations .list__item span {
            position: absolute;
            bottom: 10px;
            left: 15px;
            color: #fff;
            font-size: 25px;
            font-weight: 700;
        }

        /*//====================================*/
        .home-best-trips {

        }
        .home-best-trips .link-best-trip__item {
            text-decoration: none;
            color: #000;
        }
        .home-best-trips .best-trip__item {
            box-shadow: 0px 0px 1px rgba(0,0,0,.4);
            margin-bottom: 30px;
            transition: 0.2s all;
            border-radius: 5px;
        }
        .home-best-trips .best-trip__item:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            transition: 0.5s all;
        }
        .home-best-trips .best-trip__item .image {
            background-color: #ccc;
            border-top-right-radius: 6px;
            border-top-left-radius: 6px;
        }
        .home-best-trips .best-trip__item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-top-right-radius: 6px;
            border-top-left-radius: 6px;
        }
        .home-best-trips .info-trip {
            padding: 10px;
            /*box-shadow: 0px 0px 1px rgba(0,0,0,.4);*/
            border-radius: 5px;
        }
        .home-best-trips .info-trip .price {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
            margin-left: 5px;
        }
        .home-best-trips .info-trip .address {
            color: #888888;
            margin-right: 10px;
        }
        .home-best-trips .info-trip .name {
            font-size: 14px;
            font-weight: 600;
            overflow: hidden;
            text-overflow: ellipsis;
            line-height: 1.4;
            letter-spacing: 0.02rem;
            text-align: justify;
            min-height: 45px;
        }
        #button-addon1 {
            background: #ffffffd1;
        }
        .search-box {
            position: relative;
        }
        .search-box .form-control:focus {
            box-shadow: none;
        }
        .box-suggest {
            position: absolute;
            top: 50px;
            left: 0px;
            width: 100%;
            z-index: 1;
            background-color: #fff;
            border: none;
            border-radius: 2px 2px 0 0;
            border-top: 1px solid #01b07d;
        }
        .box-suggest .tab-content {
            padding-top: 15px;
            padding-right: 10px;
        }
        .box-suggest .nav {
            min-height: 300px;
            height: 100%;
            background-color: #01b07d;
        }
        .box-suggest ul li {
            padding: 15px 10px;
            font-size: 15px;
        }
        .box-suggest ul li.active {
            background-color: #fff;
        }
        .box-suggest ul li.active a {
            color: #01b07d;
        }
        .box-suggest ul li a {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
        }
        .suggest__list-place .box-image {
            height: 80px;
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255,255,255,.15);
            background-blend-mode: overlay;
            color: #fff;
            text-transform: uppercase;
            font-size: 14px;
            line-height: 80px;
        }
        .suggest__list-place .hot-service-list a {
            text-decoration: none;
            color: rgb(33, 37, 41);
        }
        .suggest__list-place .hot-service-list a:hover {
            color: #4db2ec;
        }
        .suggest__list-place .hot-service-list .box-image {
            margin-bottom: 5px;
        }
        .suggest__list-place .hot-service-list {
            font-weight: 600;
            padding: 0 8px;
            margin-bottom: 10px;
        }
        .suggest__list-place .box-image a {
            color: #fff;
            text-decoration: none;
            width: 100%;
            height: 100%;
            text-align: center;
            overflow: hidden;
            text-shadow: 1px 1px 0px rgba(0,0,0,.4);
        }
        .suggest__list-place .box-hover:hover a:before {
            opacity: 0.4;
        }
        .suggest__list-place .box-hover a:before {
            content: '';
            width: 76%;
            height: 85%;
            border: 1px solid #fff;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto;
        }
        .typeahead.dropdown-menu {
            width: 100%;
        }
        .typeahead .dropdown-item {
            text-transform: capitalize;
        }
    </style>
@endsection

@php
    $locale = Session::get('locale', config('app.locale'));
@endphp

@section('content')
    <div class="home-banner">
        <div class="slide-show">
            <div class="slide-show__item">
                <img src="{{ get_asset('web/images/banners/baner3-min.jpg') }}">
            </div>
            <div class="slide-show__item">
                <img src="{{ get_asset('web/images/banners/baner2-min.jpg') }}">
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="quick-search d-flex flex-column justify-content-center align-items-center">
                <div class="solugan d-flex flex-column justify-content-center align-items-center">
                    <h1 class="main-solugan">@lang('where_do_you_want_to_go')</h1>
                    <h3 class="sub-solugan">@lang('web_home_baner_top_sologun')</h3>
                </div>
                <div class="form">
                    <form method="get" action="#">
                        <div class="search-box">
                            <div class="d-flex flex-sm-row">
                                <input type="text" value="" id="input-search" onkeydown="onKeySearch.call(this)" class="form-control typeahead" placeholder="@lang('web_home_baner_top_placehoder_input')" aria-describedby="button-addon2" data-provide="typeahead">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="d-none d-lg-block">
                                <div class="box-suggest" style="display: none;">
                                    <div class="row" style="margin-right: 0;">
                                        <div class="col-4">
                                            <ul class="nav nav-pills flex-column">
                                                <li class="active">
                                                    <a href="#tab-1" data-toggle="tab">@lang('places_hot_places')</a>
                                                </li>
                                                <li><a href="#tab-2" data-toggle="tab">@lang('places_hot_services')</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-8">
                                            <div class="tab-content well">
                                                <div class="tab-pane active" id="tab-1">
                                                    <div class="suggest__list-place">
                                                        <div class="row">
                                                            @foreach($places as $item)
                                                                <div class="col-6 col-md-3" style=" padding-left: 7px; padding-right: 7px; margin-bottom: 14px;">
                                                                    <div class="box-image box-hover" style="background-image: url('{{ $item->getImage("sm") }}');">
                                                                        <a href="{{ $item->getUrl() }}" title="{{ $item->name }}">
                                                                            {{ $item->name }}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="tab-2">
                                                    <div class="suggest__list-place">
                                                        <div class="row">
                                                            @foreach($hotTours as $item)
                                                            <div class="col-12 col-md-4 hot-service-list">
                                                                <a href="{{ route('web.services.detail', [$item->getTranslation($locale)->slug, $item->uuid]) }}" title="{{ $item->name }}">
                                                                    <div class="d-none d-md-block box-image" style="background-image: url('{{ $item->getImage("sm") }}'); height: 100px;">
                                                                    </div>
                                                                    {{ shortString(ucfirst($item->name), 48) }}
                                                                </a>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="home-destinations">
        <div class="container">
            <div class="row">
                <div class="home-title col-md-12 d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center">
                        <span class="title">@lang('web_home_ideal_destination')</span>
                        <span class="description">@lang('web_home_ideal_destination_description')</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($place_destinations as $key_place => $place)
                    <div class="col-sm-12 col-md-3">
                        <a href="{{ $place->getUrl() }}" title="{{ $place->getTranslation($locale)->name }}">
                            <div class="list__item" style="background-image: url({{ $place->getImage('md') }});">
                                <span>{{ $place->getTranslation($locale)->name }}</span>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
    <div class="home-best-trips">
        <div class="container">
            <div class="row">
                <div class="home-title col-md-12 d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center">
                        <span class="title">@lang('web_home_favorite_service')</span>
                        <span class="description">@lang('web_home_favorite_service_description')</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($best_services as $key_service => $service)
                    <div class="col-sm-12 col-md-4">
                        <a href="{{ route('web.services.detail', [$service->getTranslation($locale)->slug, $service->uuid]) }}" class="link-best-trip__item" title="{{ $service->getTranslation($locale)->name }}">
                            <div class="best-trip__item">
                                <div class="image">
                                    <img src="{{ $service->getImage('sm') }}" alt="{{ $service->getTranslation($locale)->name }}" title="{{ $service->getTranslation($locale)->name }}">
                                </div>
                                <div class="info-trip">
                                    <h3 class="name">{{ title_case($service->getTranslation($locale)->name) }}</h3>
                                    <div class="d-flex justify-content-between">
                                        <span class="address">
                                            @if($service->getTranslation($locale)->address)
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>{{ $service->place ? $service->place->getTranslation($locale)->name: '' }}</span>
                                            @endif
                                        </span>

                                        <span class="d-flex align-items-center">
                                            <span class="currency">VND</span>
                                            <span class="price">{{ number_format($service->getPrice()) }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty

                @endforelse
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Ảnh ẩn hiện ở phần banner
            $(".slide-show > div:gt(0)").hide();
            setInterval(function() {
              $('.slide-show > div:first')
                .fadeOut(1000)
                .next()
                .fadeIn(1000)
                .end()
                .appendTo('.slide-show');
            },  3500);
        });
    </script>
    <script type="text/javascript">
        $('input.typeahead').typeahead({
            delay: 300,
            fitToElement: true,
            source:  function (query, process) {
                return $.get('{{ route('places.search') }}', { q: query }, function (data) {
                    return process(data);
                });
            },
            afterSelect: function(value) {
                window.location.href = value.url;
            }
        });
        (function ($) {
          $(function () {
            $(document).off('click.bs.tab.data-api', '[data-hover="tab"]');
            $(document).on('mouseenter.bs.tab.data-api', '[data-toggle="tab"], [data-hover="tab"]', function () {
              $(this).tab('show');
              $('.box-suggest .nav .active').removeClass('active');
              $(this).parent().addClass('active');
            });

            $('#input-search').on('focus', function () {
                if ($(this).val() == '') {
                    $('.box-suggest').css('display', 'block');
                }
            });
            $("#input-search").on('blur',function(){
                setTimeout(function(){
                    $('.box-suggest').css('display', 'none');
                }, 1000);
            });
          });
        })(jQuery);
        function onKeySearch () {
            $('.box-suggest').css('display', 'none');
        }
    </script>
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
@endsection
