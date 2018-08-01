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
        .home-banner .solugan h1 {
            font-size: 18px;
        }
        .home-banner .solugan h2 {
            text-transform: uppercase;
            font-size: 34px;
        }
        .home-banner .form {
            margin-top: 15px;
            width: 100%;
        }
        .home-banner .form input {
            font-size: 14px;
            border-radius: 0px;
            height: 50px;
            border: none;
            background-color: #ffffffd1;
        }
        .home-banner .form button {
            border-radius: 0px;
            height: 50px;
            padding: 5px 20px;
        }
        @media screen and (min-width: 375px) {
            .home-banner .quick-search {
                width: 375px;
            }
        }
        @media screen and (min-width: 425px) {
            .home-banner .quick-search {
                width: 425px;
            }
        }
        @media screen and (min-width: 768px) {
            .home-banner .solugan h1 {
                font-size: 18px;
            }
            .home-banner .solugan h2 {
                font-size: 50px;
                font-weight: bold;
            }
            .home-banner .quick-search {
                width: 650px;
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
        @media screen and (min-width: 768px) {
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
            margin-bottom: 30px;
            transition: 0.2s all;
        }
        .home-best-trips .best-trip__item:hover {
            transform: translateY(-4px);
            box-shadow: 0 22px 40px rgba(0, 0, 0, 0.15);
            transition: 0.2s all;
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
            border: 1px solid #ccc;
            border-bottom-right-radius: 6px;
            border-bottom-left-radius: 6px;
            padding: 15px;
            min-height: 140px;
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
            font-size: 15px;
            font-weight: bold;
            max-height: 54px;
            min-height: 44px;
        }
        #button-addon1 {
            background: #ffffffd1;
        }
        .search-box {
            position: relative;
        }
        .box-suggest {
            position: absolute;
            top: 37px;
            left: 0px;
            width: 100%;
            height: 250px;
            z-index: 1;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 2px;
        }
        .box-suggest .tab-content {
            padding: 20px;
        }
        .box-suggest .nav {
            height: 248px;
            background-color: #01b07d;
        }
        .box-suggest ul li {
            padding: 20px;
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
            background-color: #00000052;
            background-blend-mode: overlay;
            color: #fff;
            font-weight: bold;
            border: 2px;
        }
        .suggest__list-place .hot-service-list a {
            text-decoration: none;
            color: rgb(33, 37, 41);
        }
        .suggest__list-place .hot-service-list a:hover {
            color: #4db2ec;
        }
        .suggest__list-place .hot-service-list .box-image {
            margin-bottom: 10px;
        }
        .suggest__list-place .box-image a {
            color: #fff;
            text-decoration: none;
        }
        .suggest__list-place .box-hover:hover a:before {
            opacity: 0.4;
        }
        .suggest__list-place .box-hover a:before {
            content: '';
            width: 72%;
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

    </style>
@endsection

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
                    <h2>Bạn muốn đi đâu ?</h2>
                    <h1>Chuyến đi, trải nghiệm và địa điểm. Tất cả trong một</h1>
                </div>
                <div class="form">
                    <form method="get" action="#">
                        <div class="d-flex flex-sm-row">
                            <input type="text" name="q" class="form-control" placeholder="Tìm địa điểm, hoạt động vui chơi ...">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
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
                        <span class="title">Điểm đến lý tưởng</span>
                        <span class="description">Điểm đến du lịch tốt nhất thế giới</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($place_destinations as $key_place => $place)
                    <div class="col-sm-12 col-md-3">
                        <a href="{{ $place->getUrl() }}">
                            <div class="list__item" style="background-image: url({{ $place->getImage() }});">
                                <span>{{ $place->getTranslation()->name }}</span>
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
                        <span class="title">Dịch vụ được yêu thích nhất</span>
                        <span class="description">Trải nghiệm bởi người yêu du lịch</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($best_services as $key_service => $service)
                    <div class="col-sm-12 col-md-4">
                        <a href="{{ route('web.services.detail', [$service->id, $service->getTranslation()->slug]) }}" class="link-best-trip__item">
                            <div class="best-trip__item">
                                <div class="image">
                                    <img src="{{ $service->getImage() }}" alt="{{ $service->getTranslation()->name }}" title="{{ $service->getTranslation()->name }}">
                                </div>
                                <div class="info-trip">
                                    <p class="name">{{ title_case($service->getTranslation()->name) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <span class="address">
                                            <i class="fas fa-map-pin"></i>
                                            <span>{{ $service->getTranslation()->address }}</span>
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
                }, 100);
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
