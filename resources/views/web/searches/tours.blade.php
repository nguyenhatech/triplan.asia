@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/rangeslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/rangeslider.skinHTML5.css') }}">
    <style type="text/css">
        .box-title .breadcrumb {
            background-color: transparent;
            padding-left: 0px;
            padding-right: 0px;
            margin-bottom: 0px;
        }
        .box-title .search-result {
            font-size: 18px;
        }
        .box-list-result .card {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .box-list-result .card h3.card-title {
            font-size: 18px;
            font-weight: bold;
        }
        .box-list-result .card .time-total {
            margin-top:
        }
        .box-list-result .card .rate {
            font-size: 12px;
            color: #02a676;
        }
        .show-more {
            margin-bottom: 20px;
        }
        .show-more .loading {
            visibility: hidden;
            font-size: 18px;
            color: #007bff;
            margin: 10px 0px;
        }
        .gradient-top {
            background-color: #00000069;
            background-blend-mode: overlay;
            transition: background 1s ease;
            background-image: url('https://image.kkday.com/image/get/s1.kkday.com/product_19510/20180619043138_UPigW/jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            height: 200px;
        }
        .city-name {
            position: absolute;
            left: 0;
            top: 40%;
            width: 100%;
            text-align: center;
            color: #000;
        }
        .city-name h1 {
            color: #fff;
            font-size:
        }
        .box-service-filter {
            margin-top: 20px;
        }
        .box-service-filter h5 {
            padding-left: 36px;
        }
        .box-service-filter .list-group-item a {
            color: #343a40;
        }
        .box-service-filter .list-group-item a:hover {
            color: #02a676;
            text-decoration: none;
        }
        .box-checkbox-custom .custom-control-label {
            line-height: 24px;
        }
        .box-checkbox-custom .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #02a676;
        }
        .box-checkbox-custom .custom-control-input:checked~.custom-control-label::before {
            background-color: #02a676;
        }
        .box-checkbox-custom .custom-checkbox {
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .mb-box-filter .btn-group button {
            width: 100%;
            margin-top: 15px;
        }
        .mb-box-filter .dropdown-menu {
            min-width: 200px;
        }
        .mb-box-filter .dropdown-item-text {
            border-bottom: 1px solid #ddd;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            border-radius: 0px 0px 5px 5px;
        }
        .group-price {
            margin-top: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 gradient-top">
                <div class="city-name">
                    <h1>Đài Loan</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3 d-none d-md-block" style="margin-top: 42px;">
                <div class="box-service-filter">
                    <h5>Loại tour</h5>
                    <div class="card" style="width: 100%; padding: 5px 15px 5px 15px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <a href="#">Tour</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Khách sạn</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Vé & Voucher</a>
                            </li>
                            <li class="list-group-item">
                                <a href="#">Di chuyển</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="box-service-filter box-checkbox-custom">
                    <h5>Thời gian đi</h5>
                    <div class="card" style="width: 100%; padding: 5px 15px 5px 15px;">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="" id="time1">
                            <label class="custom-control-label" for="time1">
                                1 đến 2 ngày
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="" id="time2">
                            <label class="custom-control-label" for="time2">
                                3 đến 5 ngày
                            </label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="" id="time3">
                            <label class="custom-control-label" for="time3">
                                Hơn 5 ngày
                            </label>
                        </div>
                    </div>
                </div>
                <div class="box-service-filter">
                    <h5>Giá</h5>
                    <div class="card" style="width: 100%; padding: 5px 15px 5px 15px;">
                        <div class="form group-price" >
                            <input type="hidden" id="price_range-slider">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="box-title">
                    <div class="d-md-none mb-box-filter">
                        <div class="d-flex btn-group">
                            <div class="flex-fill btn-group"  id="headingOne">
                                <button class="btn btn-outline-primary btn-sm collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Loại tour <i class="fas fa-angle-down"></i></button>
                            </div>
                            <div class="flex-fill btn-group" id="headingTwo">
                                <button class="btn btn-outline-primary btn-light btn-sm collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Giá <i class="fas fa-angle-down"></i></button>
                            </div>
                            <div class="flex-fill btn-group" id="headingThree">
                                <button class="btn btn-outline-primary btn-light btn-sm collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Thời gian <i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        <div class="accordion" id="accordionFilters">
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionFilters">
                                <div class="dropdown-item-text">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="#">Tour</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Khách sạn</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Vé & Voucher</a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#">Di chuyển</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFilters">
                                <div class="dropdown-item-text">
                                    <div class="form group-price" >
                                        <input type="hidden" id="price_range-slider_mb">
                                    </div>
                                </div>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFilters">
                                <div class="dropdown-item-text box-checkbox-custom"">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="time1">
                                        <label class="custom-control-label" for="time1">
                                            1 đến 2 ngày
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="time2">
                                        <label class="custom-control-label" for="time2">
                                            3 đến 5 ngày
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="time3">
                                        <label class="custom-control-label" for="time3">
                                            Hơn 5 ngày
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <h3 class="search-result">Đã tìm thấy 73 tour du lịch ở Đài Bắc dành cho bạn</h3>
                    </nav>
                </div>
                <div class="box-list-result">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <img class="card-img-top" src="https://image.kkday.com/image/get/w_600%2Cc_fit/s1.kkday.com/product_19510/20180619043138_UPigW/jpeg" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-12 col-md-7">
                                        <h3 class="card-title">Tham quan 1 ngày Jiufen, Yehliu, Shifen</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <p class="time-total"><i class="far fa-clock"></i> 2 ngày</p>
                                        <div class="card-bottom d-flex justify-content-between">
                                            <div class="rate">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="price">8.000.000đ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <img class="card-img-top" src="https://image.kkday.com/image/get/w_600%2Cc_fit/s1.kkday.com/product_19510/20180619043138_UPigW/jpeg" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-12 col-md-7">
                                        <h3 class="card-title">Tham quan 1 ngày Jiufen, Yehliu, Shifen</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <p class="time-total"><i class="far fa-clock"></i> 2 ngày</p>
                                        <div class="card-bottom d-flex justify-content-between">
                                            <div class="rate">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="price">8.000.000đ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <img class="card-img-top" src="https://image.kkday.com/image/get/w_600%2Cc_fit/s1.kkday.com/product_19510/20180619043138_UPigW/jpeg" alt="Card image cap">
                                    </div>
                                    <div class="card-body col-12 col-md-7">
                                        <h3 class="card-title">Tham quan 1 ngày Jiufen, Yehliu, Shifen</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <p class="time-total"><i class="far fa-clock"></i> 2 ngày</p>
                                        <div class="card-bottom d-flex justify-content-between">
                                            <div class="rate">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <div class="price">8.000.000đ</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="show-more d-md-none">
                    <div class="loading d-flex justify-content-center">
                        <i class="fas fa-spinner fa-pulse"></i>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-block">Xem thêm</button>
                </div>
                <div class="box-pagination d-none d-md-block">
                    <nav>
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Trước">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only"><i class="fas fa-angle-left"></i></span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only"><i class="fas fa-angle-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/rangeslider.min.js') }}"></script>
    <script type="text/javascript">
        var locale_key = "vi";
        var min_price_range = 1;
        var max_price_range = 200;
        $('#price_range-slider').ionRangeSlider({
            type: "double",
            min: (locale_key == 'vi' ? 1 : 5),
            max: (locale_key == 'vi' ? 200 : 500),
            from: min_price_range,
            to: max_price_range,
            step: (locale_key == 'vi' ? 1 : 5),
            hide_min_max: true,
            grid: true,
            postfix: " triệu",
            min_interval: (locale_key == 'vi' ? 1 : 5),
            onFinish: function (data) {
                var minPrice = data.from_pretty.replace(/ /g, '');
                var maxPrice = data.to_pretty.replace(/ /g, '');
                // change param url
                var queryParameters = {}, queryString = location.search.substring(1),
                    re = /([^&=]+)=([^&]*)/g, m;
                while (m = re.exec(queryString)) {
                    queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                }
                queryParameters['min_price'] = minPrice;
                queryParameters['max_price'] = maxPrice;
                location.search = $.param(queryParameters);
            },
        });
        $('#price_range-slider_mb').ionRangeSlider({
            type: "double",
            min: (locale_key == 'vi' ? 1 : 5),
            max: (locale_key == 'vi' ? 200 : 500),
            from: min_price_range,
            to: max_price_range,
            step: (locale_key == 'vi' ? 1 : 5),
            hide_min_max: true,
            grid: true,
            postfix: " triệu",
            min_interval: (locale_key == 'vi' ? 1 : 5),
            onFinish: function (data) {
                var minPrice = data.from_pretty.replace(/ /g, '');
                var maxPrice = data.to_pretty.replace(/ /g, '');
                // change param url
                var queryParameters = {}, queryString = location.search.substring(1),
                    re = /([^&=]+)=([^&]*)/g, m;
                while (m = re.exec(queryString)) {
                    queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                }
                queryParameters['min_price'] = minPrice;
                queryParameters['max_price'] = maxPrice;
                location.search = $.param(queryParameters);
            },
        });
    </script>
@endsection
