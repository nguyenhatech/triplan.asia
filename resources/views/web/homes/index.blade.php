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
            height: 80vh;
        }
        .home-banner .slide-show .slide-show__item {
            position: absolute;
        }
        .home-banner .slide-show img {
            width: 100vw;
            height: 80vh;
            object-fit: cover;
        }
        .home-banner .quick-search {
            position: absolute;
            top: 0;
            width: 100vw;
            height: 80vh;
            color: #fff;
        }
        .home-banner .quick-search {
            width: 100%;
            padding: 0px 15px;
            width: 320px;
        }
        .home-banner .solugan h1 {
            font-size: 13px;
            font-weight: 300;
        }
        .home-banner .solugan h2 {
            text-transform: uppercase;
            font-size: 30px;
        }
        .home-banner .form {
            margin-top: 15px;
            width: 100%;
        }
        .home-banner .form input {
            font-size: 13px;
            border-radius: 0px;
        }
        .home-banner .form button {
            margin-top: 10px;
            border-radius: 0px;
            padding: 5px 35px;
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
                margin-top: 0px;
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
        .home-destinations {

        }
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
                        <div class="d-flex flex-column flex-sm-row">
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
                <div class="col-sm-12 col-md-3">
                    <a href="#">
                        <div class="list__item" style="background-image: url({{ get_asset('web/images/home/tokyo.jpg') }});">
                            <span>Hà Nội</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-12 col-md-3">
                    <a href="#">
                        <div class="list__item" style="background-image: url({{ get_asset('web/images/home/tokyo.jpg') }});">
                            <span>Hà Nội</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            // Ảnh ẩn hiện ở phần banner
            $(".slide-show > div:gt(0)").hide();
            // setInterval(function() {
            //   $('.slide-show > div:first')
            //     .fadeOut(1000)
            //     .next()
            //     .fadeIn(1000)
            //     .end()
            //     .appendTo('.slide-show');
            // },  3500);
        });
    </script>
@endsection
