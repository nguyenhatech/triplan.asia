<!doctype html>
<html lang="{{ \App::getLocale() }}">
    <head>
        @include('web/layouts/modules/metadata')
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0, shrink-to-fit=no" />
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/bootstrap-4.1.1/dist/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('web/libraries/fullpage/fullpage.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Cormorant+Upright" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <style type="text/css">
            body {
                font-family: 'Montserrat', sans-serif;
                color: #4a4a4a;
            }
            .parallax {
                position: relative;
                background-attachment: fixed;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .top-section {
                height: 100vh;
                background-color: #0606064d;
                background-blend-mode: darken;
            }
            .caption {
                height: 100%;
            }
            .caption .resort-name {
                color: #fff;
                font-weight: bold;
                font-size: 20px;
                margin-bottom: 20px;
                text-transform: uppercase;
            }
            .caption .resort-slogan {
                font-family: 'Cormorant Upright', serif;
                color: #fff;
            }
            .caption .play-button {
                margin-top: 20px;
                border-radius: 50%;
            }
            .caption .play-button:hover {
                animation: ripple 2000ms infinite;
            }
            .caption .play-button:active {
                animation: ripple 2000ms infinite;
            }
            .caption .play-button img {
                cursor: pointer;
                transition: all .2s ease-in-out;
            }
            .caption .play-button:hover img {
                transform: scale(1.1);
            }

            .service-section {
                /*padding-top: 50px;*/
                /*padding-bottom: 50px;*/
                background-color: #f5f7f8;
                color: #4a4a4a;
            }
            .section-title {
                font-size: 30px;
                text-align:center;
                margin-bottom: 20px;
                font-family: 'Cormorant Upright', serif;
                color: forestgreen;
                text-align: center;
            }
            .section-content {
                font-size: 12pt;
                line-height: 20pt;
            }

            /*SINGLE SECTION*/
            .single-section {
                background-color: #ddd;
                background-position: center center;
                background-size: cover;
            }
            .single-section .section-title {
                color: #fff;
                text-align: left;
            }
            .single-section .section-content {
                font-size: 12pt;
                color: #fff;
                text-align: left;
            }
            .box-inside {
                padding: 20px;
                background: linear-gradient(to right,#00000047 0%, #04040414 100%);
            }
            .box-inside:hover {
                background: linear-gradient(to right,#0000007a 0%, #04040445 100%);
            }
            .service-section a {
                text-decoration: none;
            }
            .box-item {
                width: 100%;
                height: 240px;
                position: relative;
                background-size: cover;
                margin-top: 10px;
                margin-bottom: 20px;
                background-position: center center;
                transition: all .5s ease-in-out;
            }
            .box-item .caption {
                width: 100%;
                padding: 20px;
                height: auto;
                position: absolute;
                bottom: 0px;
                left: 0px;
                background-image: linear-gradient(transparent, #00000075);
            }
            .box-item__title {
                color: #fff;
                font-size: 1.2rem;
                -webkit-transition: height 0.2s ease-out;
                transition: height 0.2s ease-out;
            }
            .box-item__description {
                font-size: 14px;
                color: #fff;
                display: none;
                -webkit-transition: height 0.2s ease-out;
                transition: height 0.2s ease-out;
            }
            .box-item:hover {
                background-color: #0000007a;
                background-blend-mode: darken;
            }
            .box-tem:hover .caption {
                height: 200px;
                background-image: linear-gradient(#00000075, #0000009e);
                transition: height 0.2s ease-out;
            }
            .box-item:hover .box-item__description {
                display: block;
            }
            .footer {
                min-height: 200px;
                padding: 30px;
                background-position: center center;
                background-size: cover;
                background-color: #0000007a;
                background-blend-mode: darken;
                color: #fff;
                font-family: 'Roboto', serif;
            }
            .footer__copyright {
                height: 100%;
            }
            .footer__copyright img {
                margin-bottom: 10px;
            }
            .footer a {
                text-decoration: none;
                color: #fff;
            }
            .footer a:hover {
                text-decoration: none;
            }
            .contact-us .social {
                margin-top: 10px;
            }
            .contact-us .social a {
                text-decoration: none;
            }
            .contact-us .social span {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background-color: #ccc;
                margin-right: 15px;
            }
            .contact-us .social i {
                color: #fff;
                font-size: 16px;
            }
            #videoModal .modal-content {
                max-width: 100%;
                height: 80vh;
                background-color: transparent;
            }
            #videoModal .video-close-btn {
                color: #fff;
                font-size: 40pt;
            }
            #videoIframe {
                height: 204px;
            }
            .owl-nav {
                position: absolute;
                top: 0;
                bottom: 0;
                width: 100%;
                padding-left: 20px;
                padding-right: 20px;
                font-size: 50px;
                color: #fff;
                display: flex;
                justify-content: space-between;
            }
            .owl-nav button {
                outline: none;
            }
            .class-fixed {
                position: absolute;
                /*bottom: 0px;*/
                width: 100px;
            }
            .menu-mobile {
                position: relative;
                height: 30px;
                background-color: #fff;
                font-weight: bold;
            }
            .menu-mobile a {
                color: #4a4a4a !important;
            }
            .menu-mobile__phone {
                position: absolute;
                bottom: 0px;
                padding: 10px;
                text-align: center;
                background-color: #fff;
                border-radius: 50%;
                width: 44px;
                animation: ripple 2000ms infinite;
            }
            .view-more-button__wrap {
                text-align: center;
            }
            .view-more-button {
                background: transparent;
                color: forestgreen;
                width: 200px;
                border: 1px solid forestgreen;
                padding: 5px 30px 5px 30px;
                text-align: center;
                transition: all 0.3s;

                outline: none;
                position: relative;
            }
            .view-more-button:hover {
                color: #fff;
                background: forestgreen;
                transition: all 0.3s;
            }
            @media only screen and (min-width: 768px) {
                .service-section {
                    height: 100vh;
                }
                .service-section .height-full {
                    height: 100%;
                }
                .caption .resort-name {
                    font-size: 2.5rem;
                }
                .section-title {
                    font-size: 45px;
                    text-align: right;
                }
                .section-content {
                    font-size: 12pt;
                    line-height: 1.66em;
                    text-align: right;
                }
                .content-left .view-more-button__wrap {
                    text-align: right;
                }
                .content-right .view-more-button__wrap {
                    text-align: left;
                }
                .reverse-content .section-title {
                    text-align: left;
                }
                .reverse-content .section-content {
                    text-align: left;
                }
                #videoModal .modal-dialog {
                    max-width: 768px;
                }
                #videoIframe {
                    height: 413px;
                }
                /*.class-fixed {
                    left: 0px;
                    bottom: 0;
                    top: 0;
                }*/
                .menu-desktop {
                    height: 100%;
                    padding-top: 20px;
                    padding-bottom: 20px;
                    position: relative;
                    font-weight: bold;
                    color: #fff;
                }
                .menu-desktop a {
                    color: #fff;
                }
                .menu-desktop__lang a {
                    color: #fff !important;
                }
                .menu-desktop__phone {
                    position: absolute;
                    bottom: 80px;
                    padding: 10px;
                    text-align: center;
                    background-color: #02a676;
                    color: #fff;
                    border-radius: 50%;
                    width: 44px;
                    /*animation: ripple 2000ms infinite;*/
                }
                .menu-desktop__book {
                    cursor: pointer;
                    display: block;
                    width: 44px;
                    height: 44px;
                    text-align: center;
                    font-size: 10px;
                    padding-top: 5px;
                    color: #fff;
                    background: #02a676;
                    border-radius: 50%;
                    animation: ripple 2000ms infinite;
                }
                #booking-modal .modal-content {
                    padding: 10px;
                    width: 600px;
                }
            }
            @media only screen and (max-device-width: 1024px) {
                .parallax {
                    background-attachment: scroll;
                }
            }
            @keyframes ripple {
              0% {
                box-shadow: 0 0 0 0px transparent, 0 0 0 0px #ffffff40, 0 0 0 0px transparent, 0 0 0 0px #ffffff40;
              }
              100% {
                box-shadow: 0 0 0 15px transparent, 0 0 0 17px rgba(255,255,255,0), 0 0 0 40px transparent, 0 0 0 42px rgba(255,255,255,0);
              }
            }
        </style>
    </head>
    <body>
        <div id="fullpage">
            <div class="section top-section parallax" style="background-image: url('{{ $resort->getImage() }}');">
              <div class="caption d-flex flex-column justify-content-center align-items-center">
                <h1 class="resort-name animated fadeInDown">{{ $resort->name }}</h1>
                <h2 class="resort-slogan animated fadeInUp">{{ $resort->slogan }}</h2>
                @if($resort->video)
                <div class="play-button" data-toggle="modal" data-target="#videoModal">
                    <img src="{{ asset('web/images/icons/play-button.png') }}" title="Xem video">
                </div>
                @endif
              </div>
            </div>
            @foreach($resort->resort_contents as $index => $content)
            @if($index % 2)
            <div class="section service-section">
                <div class="container-fluid height-full">
                    <div class="row height-full">
                        <div class="col-12 col-md-5 height-full content-left">
                            <div class="d-flex flex-column justify-content-center" style="height: 100%;">
                                <h2 class="animated fadeInLeft section-title">{{ $content->title }}</h2>
                                <p class="section-content text-right">{{ $content->description }}</p>
                                <div class="view-more-button__wrap mb-2">
                                    <a class="view-more-button" href="{{ route('resorts.service', $resort->slug) }}?service_group_id={{ $content->service_group_id }}">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7 height-full">
                            <div class="d-flex flex-column justify-content-center" style="height: 100%;">
                                <div class="owl-carousel fs-slides">
                                    @foreach(json_decode($content->images) as $image)
                                    <div class="item">
                                        <img class="d-block w-100" src="{{ env('IMAGE_PATH') . $image->source }}" alt="First slide">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="section service-section">
                <div class="container-fluid height-full">
                    <div class="row height-full reverse-content">
                        <div class="col-12 col-md-7 height-full content-right">
                            <div class="d-flex flex-column justify-content-center" style="height: 100%;">
                                <div class="owl-carousel">
                                    @foreach(json_decode($content->images) as $image)
                                    <div class="item">
                                        <img class="d-block w-100" src="{{ env('IMAGE_PATH') . $image->source }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-5 height-full">
                            <div class="height-full d-flex flex-column justify-content-center">
                                <h2 class="section-title animated fadeInRight">{{ $content->title }}</h2>
                                <p class="section-content">{{ $content->description }}</p>
                                <div class="view-more-button__wrap mb-1">
                                    <a class="view-more-button" href="{{ route('resorts.service', $resort->slug) }}?service_group_id={{ $content->service_group_id }}">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach

            {{-- <div class="section service-section single-section" style="background-image: url('http://flamingodailai.com/wp-content/uploads/Resize-FDL-12.jpg');">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="container">
                                <h2 class="section-title">Trải nghiệm phong cách sống mới</h2>
                                <p class="section-content box-inside">“Sống sang trọng giữa thiên nhiên” trở thành một phong cách sống tại Flamingo Đại Lải Resort. Bạn sẽ được chiêm ngưỡng kiến trúc hiện đại hòa quyện với những mảng rừng xanh; thưởng thức ẩm thực bên mặt hồ thơ mộng; spa trong tiếng lá xào xạc; thức dậy trong tiếng chim lảnh lót sớm mai,… Thiên nhiên hiện hữu trên mảnh đất này bình yên như vốn có, cùng bàn tay tài hoa của con người kiến tạo nên Flamingo Lifestyle hấp dẫn không thể cưỡng lại.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div id="normal-scroll" class="section service-section">
                <div class="container">
                    <h2 class="text-center section-title mt-5">Nhiều hoạt thư giãn, giải trí đa dạng</h2>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <a href="#">
                                <div class="box-item" style="background-image: url('http://resort.flamingodailai.com/sites/default/files/styles/368x244/public/field/image/tien-ich/san-golf-flamingo-0.jpg');">
                                    <div class="caption">
                                        <h2 class="box-item__title">Chơi golf</h2>
                                        <p class="box-item__description">Nằm duyên dáng trên bán đảo Golf, trong khuôn viên khu Resort được tôn vinh Top 10 Resort đẹp nhất thế giới, sân Golf Flamingo là điểm nhấn hấp dẫn trong chuỗi hệ thống dịch...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="#">
                                <div class="box-item" style="background-image: url('http://resort.flamingodailai.com/sites/default/files/styles/368x244/public/field/image/tien-ich/spa-cham-soc-suc-khoe-5.jpg');">
                                    <div class="caption">
                                        <h2 class="box-item__title">Spa và Chăm sóc sức khỏe</h2>
                                        <p class="box-item__description">Giữa nhịp sống vội vã, giữa những bộn bề lo toan của cuộc sống, người ta càng mong muốn hơn được trở về với thiên nhiên, trở về với những tĩnh lặng của tâm hồn, để hơn nữa ...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="#">
                                <div class="box-item" style="background-image: url('http://resort.flamingodailai.com/sites/default/files/styles/368x244/public/field/image/tien-ich/gt9.jpg?itok=5JSUXbOD');">
                                    <div class="caption">
                                        <h2 class="box-item__title">Câu lạc bộ Giải trí</h2>
                                        <p class="box-item__description">Nằm duyên dáng trên bán đảo Golf, trong khuôn viên khu Resort được tôn vinh Top 10 Resort đẹp nhất thế giới, sân Golf Flamingo là điểm nhấn hấp dẫn trong chuỗi hệ thống dịch...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="#">
                                <div class="box-item" style="background-image: url('http://resort.flamingodailai.com/sites/default/files/styles/368x244/public/field/image/tien-ich/clb-du-thuyen-4.jpg');">
                                    <div class="caption">
                                        <h2 class="box-item__title">Câu lạc bộ Du thuyền</h2>
                                        <p class="box-item__description">Du thuyền Flamingo sẽ đưa bạn lướt trên những con sóng và ngắm nhìn khung cảnh thơ mộng của hồ Đại Lải. Đắm chìm trong cảm giác phóng khoáng giữa thiên nhiên, tận...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="#">
                                <div class="box-item" style="background-image: url('http://resort.flamingodailai.com/sites/default/files/styles/368x244/public/field/image/tien-ich/clb-bai-bien-3.jpg');">
                                    <div class="caption">
                                        <h2 class="box-item__title">Câu lạc bộ Bãi biển</h2>
                                        <p class="box-item__description">Câu lạc bộ bãi biển tại Flamingo chính là nơi lý tưởng để bạn nghỉ ngơi và nhìn ngắm khung cảnh "bãi biển bao la, rộng lớn". Bên cạnh đó bạn có thể đắm mình trong làn nước...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-4">
                            <a href="#">
                                <div class="box-item" style="background-image: url('http://resort.flamingodailai.com/sites/default/files/styles/368x244/public/field/image/tien-ich/the-thao-11.jpg');">
                                    <div class="caption">
                                        <h2 class="box-item__title">Hoạt động thể thao</h2>
                                        <p class="box-item__description">Tới Flamingo Đại Lải Resort, bên cạnh việc được đắm mình trong không gian thiên nhiên xanh mát, bạn còn có thể thỏa thích trải nghiệm kỳ nghỉ tuyệt vời với các hoạt động thể ...</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div> --}}

            <section class="section footer" style="background-image: url('http://flamingodailai.com/wp-content/uploads/DJI_0025-3-1.jpg');">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="footer__copyright d-flex flex-column justify-content-center align-items-center">
                            <img src="https://triplan.asia/web/images/logos/logo_white.png" width="200px">
                            <p>Dịch vụ được cung cấp bởi Triplan</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <h3>Liên hệ</h3>
                        @foreach($metadata->getPhone() as $item)
                        <p>
                            <a href="tel:+84{{ intval($item->phone) }}"><i class="{{ $item->icon }}"></i> {{ $item->phone }}</a>
                        </p>
                        @endforeach
                        <p>
                            <a href="#"><i class="fas fa-map-marker-alt"></i> {{ $metadata->getAddress() }}</a>
                        </p>
                        <p>
                            <a href="mailto:{{ $metadata->getEmail() }}"><i class="far fa-envelope"></i> {{ $metadata->getEmail() }}</a>
                        </p>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="contact-us">
                            <h3>@lang('connect_with_us')</h3>
                            <div class="social d-flex align-items-center">
                                <a target="_blank" href="https://www.facebook.com/TriplanVN/">
                                    <span style="background-color: #306098" class="d-flex align-items-center justify-content-center">
                                        <i class="fab fa-facebook-f"></i>
                                    </span>
                                </a>
                                <a target="_blank" href="https://twitter.com/TriplanVietnam">
                                    <span style="background-color: #21C4F1" class="d-flex align-items-center justify-content-center">
                                        <i class="fab fa-twitter"></i>
                                    </span>
                                </a>
                                <a href="#">
                                    <span style="background-color: #CA1C27" class="d-flex align-items-center justify-content-center">
                                        <i class="fab fa-youtube"></i>
                                    </span>
                                </a>
                                <a href="#">
                                    <span style="background-color: #BB0F24" class="d-flex align-items-center justify-content-center">
                                        <i class="fab fa-pinterest"></i>
                                    </span>
                                </a>
                                <a href="#">
                                    <span style="background-color: #4261E3" class="d-flex align-items-center justify-content-center">
                                        <i class="fab fa-instagram"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="d-sm-none class-fixed" style="width: 100%;">
                <div class="menu-mobile d-flex justify-content-around align-items-center">
                    @if (LaravelLocalization::getCurrentLocale() == 'vi')
                    <span class=""><a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">English</a></span>
                    @else
                    <span class="menu-mobile__lang"><a href="{{ LaravelLocalization::getLocalizedURL('vi', null, [], true) }}">Tiếng việt</a></span>
                    @endif
                    <span class=""><a href="tel:+84945245115">@lang('resort_call_now')</a></span>
                    <span class=""><a href="{{ route('resorts.service', $resort->slug) }}">@lang('resort_book_now')</a></span>
                    <span class=""><a href="{{ route('web.home') }}">@lang('home_page')</a></span>
                </div>
            </div>
            <div class="class-fixed d-none d-sm-block" style="top: 0px; left: 27px; width: 116px;">
                <div class="menu-desktop d-flex align-items-center align-content-between">
                    @if (LaravelLocalization::getCurrentLocale() == 'vi')
                    <span class="menu-desktop__lang"><a href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" title="English version">
                        <img src="https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/triplan.asia-0415ac5550fe366b08ab68ac2b33476c.png" width="24px">
                    </a></span>
                    @else
                    <span class="menu-desktop__lang"><a href="{{ LaravelLocalization::getLocalizedURL('vi', null, [], true) }}" title="Tiếng Việt">
                        <img src="https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/triplan.asia-5f3ddff8a9709acb35c0b2bf3fb59994.png" width="24px">
                    </a></span>
                    @endif
                    <span class="pl-2"><a href="{{ route('web.home') }}">@lang('home_page')</a></span>
                </div>
            </div>
            <div class="class-fixed d-none d-sm-block" style="bottom: 0px; left: 0px;">
                <div class="menu-desktop d-flex flex-column justify-content-between align-items-center align-content-between">
                    <span class="menu-desktop__phone"><a href="tel:+84945245115"><i class="fas fa-phone"></i></a></span>
                    <span class="menu-desktop__book"><a href="{{ route('resorts.service', $resort->slug) }}">@lang('resort_book_now')</a></span>
                </div>
            </div>
        </div>
        <div class="modal fade" id="videoModal" role="dialog" aria-labelledby="videoModal">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document" style="height: 100%;">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Đóng"><span aria-hidden="true" class="video-close-btn">&times;</span></button>
                        <iframe id="videoIframe" width="100%" height="auto" src="https://www.youtube.com/embed/mcBXv0OyXNQ?rel=0&amp;controls=0&amp;showinfo=0&amp;start=16&amp;end=150&amp;modestbranding=1&amp;enablejsapi=1&amp;vq=hd720" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="booking-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body" id="td-outer-wrap">
                        <resort-booking language="{{ \App::getLocale() }}" app_url="{{ env('APP_URL') }}"></resort-booking>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('web/librarys/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('web/librarys/bootstrap-4.1.1/dist/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('web/librarys/fontawesome/all.js') }}"></script>
        <script type="text/javascript" src="{{ asset('web/librarys/owl-carousel-2.3.4/dist/owl.carousel.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('web/libraries/fullpage/fullpage.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('web/libraries/fullpage/scrolloverflow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('web/libraries/fullpage/fullpage.extensions.min.js') }}"></script>
        <script type="text/javascript">
            var player;

            function onYouTubePlayerAPIReady() {
              // create the global player from the specific iframe (#video)
              player = new YT.Player('videoIframe', {
                events: {
                  // call this function when player is ready to use
                  'onReady': onPlayerReady
                }
              });
            }

            function onPlayerReady(event) {
                $('#videoModal').on('shown.bs.modal', function (event) {
                  player.playVideo();
                });
                $('#videoModal').on('hidden.bs.modal', function () {
                  player.pauseVideo();
                });
            }

            var tag = document.createElement('script');
            tag.src = "//www.youtube.com/player_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
        </script>
        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                nav:true,
                items: 1,
                loop: true,
                lazyLoad: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                smartSpeed: 1000
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#fullpage').fullpage({
                    //options here
                    autoScrolling:true,
                    scrollHorizontally: true,
                    licenseKey: 'OPEN-SOURCE-GPLV3-LICENSE',
                    scrollingSpeed: 1000,
                    autoScrolling: true,
                    normalScrollElements: '#normal-scroll',
                    scrollOverflow: true,
                    fixedElements: '.class-fixed'
                });

                $.fn.fullpage.setAllowScrolling(true);
            });
        </script>
    </body>
</html>
