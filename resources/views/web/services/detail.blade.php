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
            margin-bottom: 15px;
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

        .service-info {

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
                    <div class="name">
                        <h1>{{ $service->getTranslation()->name }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                b
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
