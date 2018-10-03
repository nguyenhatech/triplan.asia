@extends('web.layouts.master')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/screens/web/homes/index.css') }}">
    <style type="text/css">
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
        .city-name p {
            font-size: 16px;
        }
        .box-title {
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #box-pagination .page-link {
            color: #02a676;
        }
        #box-pagination .page-item.active .page-link {
            background-color: #02a676;
            border-color: #02a676;
            color: #fff;
        }
        .home-destinations .list__item:hover .place-caption {
            height: 240px;
        }
        @media screen and (min-width: 768px) {
            .gradient-top {
                height: 320px;
            }
            .city-name {
                padding-left: 120px;
                padding-right: 120px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 gradient-top" style="background-image: url('{{ asset('web/images/places/resort.jpg') }}');">
                <div class="city-name">
                    <h1>@lang('menu_resort')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="home-destinations">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="box-title">@lang('places_resort_title')</h3>
                </div>
                @foreach($places as $place)
                    <div class="col-12 col-md-4">
                        <a href="{{ route('resorts.show', $place->slug) }}" title="{{ $place->name }}">
                            <div class="list__item" style="background-image: url({{ $place->getImage('sm') }}); height: 240px;">
                                <div class="place-caption">
                                    <span>{{ $place->name }}</span>
                                    <span class="place-description">{{ shortString($place->short_description, 300) }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection