@extends('web.layouts.master-scroll')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .service-banner {
            padding-top: 55px;
            height: 300px;
            background-color: #ccc;
            margin-bottom: 20px;
        }
        .service-banner img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        @media screen and (min-width: 768px) {
            .service-banner {
                height: 550px;
            }
        }

        .service-name h1 {
            font-weight: 700;
            color: #333;
            font-size: 24px;
        }
        @media screen and (min-width: 768px) {
            .service-name h1 {
                font-size: 32px;
            }
        }

        .service-time_confirm_love {
            padding: 10px 0px;
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
            padding: 10px 0px;
        }
        .service-sub_data_mobile .price {
            color: red;
            font-weight: 700;
            font-size: 24px;
        }
        .service-sub_data_mobile .count-booking {
            color: rgba(0,0,0,0.54);
        }
    </style>
@endsection

@section('content')
    <div class="service-banner">
        <img src="{{ $service->getImage() }}"  alt="{{ $service->getTranslation()->name }}" title="{{ $service->getTranslation()->name }}">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="service-info">
                    <div class="service-name">
                        <h1>{{ $service->getTranslation()->name }}</h1>
                    </div>
                    <div class="service-time_confirm_love d-flex justify-content-between align-items-center">
                        <div class="time_confirm d-flex align-items-center">
                            <i class="fab fa-telegram-plane"></i>
                            <span>
                                {{ $service->getTimeConfirmText() }}
                            </span>
                        </div>
                        <div class="love">
                            <i class="far fa-heart"></i>
                            <span>Yêu thích</span>
                        </div>
                    </div>
                    <div class="service-sub_data_mobile d-block d-sm-none">
                        <div>
                            <div>
                                <span class="price">VND {{ number_format($service->price) }}</span>
                            </div>
                            <div class="count-booking">
                                <i class="fas fa-users"></i>
                                836 Đã được đặt
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
