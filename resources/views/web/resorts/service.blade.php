@extends('web.layouts.master')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/rangeslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/rangeslider.skinHTML5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/owl-carousel-2.3.4/dist/assets/owl.carousel.min.css') }}" >
    <style type="text/css">
        .box-title .breadcrumb {
            background-color: transparent;
            padding-left: 0px;
            padding-right: 0px;
            margin-bottom: 0px;
        }
        .box-title .search-result {
            font-size: 18px;
            margin-top: 20px;
        }
        .box-list-result a {
            color: rgb(33, 37, 41);
        }
        .box-list-result a:hover {
            text-decoration: no ne;
        }
        .box-list-result .card {
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .box-list-result .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .box-list-result .card h3.card-title {
            font-size: 18px;
            font-weight: bold;
            text-transform: capitalize;
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
        .city-name {
            color: #fff;
        }
        .city-name h1 {
            font-size: 20px;
            margin-top: 30px;
            font-weight: bold;
        }
        .city-name p {
            font-size: 16px;
        }
        .box-service-filter {
            margin-top: 6px;
            margin-bottom: 20px;
        }
        .box-service-filter h5 {
            padding-left: 36px;
        }
        .box-service-filter .list-group-item a {
            color: #343a40;
        }
        .box-service-filter .list-group li.list-group-item:hover {
            color: #02a676;
            cursor: pointer;
        }
        .box-service-filter .list-group li.list-group-item:hover .dropdown-menu {
            display: block;
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
        .box-search {
            margin-top: 20px;
        }
        .box-search input.input-selected {
            border-right: none;
        }
        .box-search .input-group-prepend button {
            background: transparent;
            border-left: 1px solid #ddd;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            color: #ddd;
        }
        .box-search .input-group-append button {
            background: transparent;
            border-right: 1px solid #ddd;
            border-top: 1px solid #ddd;
            border-bottom: 1px solid #ddd;
            color: #ddd;
        }
        .box-search .input-group input {
            border-left: none;
        }
        .box-search .form-control:focus {
            border-color: #ddd;
            box-shadow: 0 0 0 0.2px #dddddda6;
        }
        .box-search .btn:focus {
            box-shadow: none;
        }
        .close-tag-btn {
            padding-left: 5px;
            cursor: pointer;
        }
        .search-box {
            position: relative;
        }
        .box-suggest {
            position: absolute;
            top: 37px;
            left: 0px;
            width: 100%;
            z-index: 1;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 2px;
        }
        .box-suggest .tab-content {
            padding: 20px;
        }
        .box-suggest .nav {
            height: 100%;
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
            height: 90px;
            padding: 5px;
            text-align: center;
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
        .suggest__list-place .hot-service-list h6 {
            text-transform: capitalize;
            font-size: 14px;
        }
        .suggest__list-place .box-hover:hover a:before {
            opacity: 0.4;
        }
        .suggest__list-place .box-hover a:before {
            content: '';
            width: 79%;
            height: 85%;
            border: 1px solid #fff;
            opacity: 0;
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            margin: auto;
            margin-right: 23px;
        }
        .box-list-result .price {
            font-size: 16px;
            font-weight: bold;
            color: #28a745;
            margin-left: 5px;
        }
        .typeahead .dropdown-item {
            text-transform: capitalize;
        }
        @media screen and (min-width: 768px) {
            .box-list-result .card-body {
                padding-left: 0px;
            }
            .box-list-result .card-img-top {
                border-top-right-radius: 0px;
                border-bottom-left-radius: calc(.25rem - 1px);
            }
            .gradient-top {
                height: 300px;
            }
            .city-name {
                padding-left: 120px;
                padding-right: 120px;
            }
            .city-name h1 {
                font-size: 2.5rem;
                margin-top: 0px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row parallax" id="background-top">
            <div class="col-12 gradient-top" style="background-image: url('{{ $resort->getImage() }}');">
                <div class="city-name">
                    <h1>{{ $resort->name }}</h1>
                    <div class="d-none d-lg-block">
                        <p>{{ $resort->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <place-info language="{{ \App::getLocale() }}" place_name="{{ $resort->name }}" :resort_id="{{ $resort->id }}"></place-info>
    </div>
@endsection
