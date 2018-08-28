@extends('web.layouts.master')

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
            margin-top: 20px;
        }
        .box-list-result a {
            color: rgb(33, 37, 41);
        }
        .box-list-result a:hover {
            text-decoration: none;
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
        .city-name p {
            font-size: 16px;
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
            <div class="col-12 gradient-top" style="background-image: url('{{ $place->getImage() }}');">
                <div class="city-name">
                    <h1>{{ $place->getTranslation(\App::getLocale())->name }}</h1>
                    <div class="d-none d-lg-block">
                        <p>{{ $place->getTranslation(\App::getLocale())->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-3 d-none d-md-block" style="margin-top: 42px; margin-bottom: 20px;">
                <div class="box-service-filter">
                    <h5>@lang('places_service_type_filter')</h5>
                    <div class="card" style="width: 100%; padding: 5px 15px 5px 15px;">
                        <ul class="list-group list-group-flush">
                            @foreach($service_groups as $group)
                            <li class="list-group-item dropright">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ Request::fullUrlWithQuery(['group' => $group->id ]) }}">{{ $group->name }}</a>
                                    <span><i class="fas fa-angle-right"></i></span>
                                </div>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @if(array_key_exists($group->id, $service_types->toArray()))
                                    @foreach($service_types->toArray()[$group->id] as $type)
                                    <a href="{{ Request::fullUrlWithQuery(['type' => $type['id'] ]) }}" class="dropdown-item">{{ $type['name'] }}</a>
                                    @endforeach
                                    @endif
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="box-service-filter box-checkbox-custom">
                    <h5>@lang('places_duration_filter')</h5>
                    <div class="card" style="width: 100%; padding: 5px 15px 5px 15px;">
                        <form name="duration">
                        @foreach($durations as $index => $duration)
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" value="{{ $index }}" id="time{{ $index }}" name="duration[]" {{ in_array($index, explode(',', Request::get('duration'))) ? 'checked' : '' }}>
                            <label class="custom-control-label" for="time{{ $index }}">
                                {{ $duration }}
                            </label>
                        </div>
                        @endforeach
                        </form>
                    </div>
                </div>
                <div class="box-service-filter">
                    <h5>@lang('places_price_filter')</h5>
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
                                <button class="btn btn-outline-primary btn-sm collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">@lang('places_service_type_filter') <i class="fas fa-angle-down"></i></button>
                            </div>
                            <div class="flex-fill btn-group" id="headingTwo">
                                <button class="btn btn-outline-primary btn-light btn-sm collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">@lang('places_price_filter') <i class="fas fa-angle-down"></i></button>
                            </div>
                            <div class="flex-fill btn-group" id="headingThree">
                                <button class="btn btn-outline-primary btn-light btn-sm collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">@lang('places_duration_filter') <i class="fas fa-angle-down"></i></button>
                            </div>
                        </div>
                        <div class="accordion" id="accordionFilters">
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionFilters">
                                <div class="dropdown-item-text">
                                    <ul class="list-group list-group-flush">
                                        @foreach($service_groups as $group)
                                        <li class="list-group-item dropright">
                                            <div class="d-flex justify-content-between">
                                                <a href="{{ Request::fullUrlWithQuery(['group' => $group->id ]) }}">{{ $group->name }}</a>
                                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#group{{ $group->id }}" aria-expanded="false" aria-controls="group{{ $group->id }}"><i class="fas fa-angle-down"></i></button>
                                            </div>
                                            <div class="collapse" id="group{{ $group->id }}">
                                                @if(array_key_exists($group->id, $service_types->toArray()))
                                                @foreach($service_types->toArray()[$group->id] as $type)
                                                <a href="{{ Request::fullUrlWithQuery(['type' => $type['id'] ]) }}" class="dropdown-item">{{ $type['name'] }}</a>
                                                @endforeach
                                                @endif
                                            </div>
                                        </li>
                                        @endforeach
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
                                <div class="dropdown-item-text box-checkbox-custom">
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="time1" />
                                        <label class="custom-control-label" for="time1">
                                            1 đến 2 ngày
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="time2" />
                                        <label class="custom-control-label" for="time2">
                                            3 đến 5 ngày
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input class="custom-control-input" type="checkbox" value="" id="time3" />
                                        <label class="custom-control-label" for="time3">
                                            Hơn 5 ngày
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-search">
                        <form autocomplete="off" action="">
                            <div class="input-group search-box">
                                <div class="input-group-prepend">
                                    <button class="btn" type="button" id="button-addon1">
                                        <svg viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false" style="height: 24px; width: 24px; display: block; fill: rgb(118, 118, 118);"><path d="m10.4 18.2c-4.2-.6-7.2-4.5-6.6-8.8.6-4.2 4.5-7.2 8.8-6.6 4.2.6 7.2 4.5 6.6 8.8-.6 4.2-4.6 7.2-8.8 6.6m12.6 3.8-5-5c1.4-1.4 2.3-3.1 2.6-5.2.7-5.1-2.8-9.7-7.8-10.5-5-.7-9.7 2.8-10.5 7.9-.7 5.1 2.8 9.7 7.8 10.5 2.5.4 4.9-.3 6.7-1.7v.1l5 5c .3.3.8.3 1.1 0s .4-.8.1-1.1" fill-rule="evenodd"></path></svg>
                                    </button>
                                </div>
                                <input type="text" value="" id="input-search" onkeydown="onKeySearch.call(this)" class="form-control typeahead {{ $place ? 'input-selected' : '' }}" placeholder="@lang('web_home_baner_top_placehoder_input')" aria-describedby="button-addon2" data-provide="typeahead">
                                <div class="input-group-append">
                                    <button class="btn" type="button" id="button-addon2">
                                        <svg viewBox="0 0 24 24" role="img" aria-label="Clear Input" focusable="false" style="height: 12px; width: 12px; display: block; fill: rgb(118, 118, 118);"><path d="m23.25 24c-.19 0-.38-.07-.53-.22l-10.72-10.72-10.72 10.72c-.29.29-.77.29-1.06 0s-.29-.77 0-1.06l10.72-10.72-10.72-10.72c-.29-.29-.29-.77 0-1.06s.77-.29 1.06 0l10.72 10.72 10.72-10.72c.29-.29.77-.29 1.06 0s .29.77 0 1.06l-10.72 10.72 10.72 10.72c.29.29.29.77 0 1.06-.15.15-.34.22-.53.22" fill-rule="evenodd"></path></svg>
                                    </button>
                                </div>
                                <div class="d-none d-lg-block">
                                    <div class="box-suggest" style="display: none;">
                                        <div class="row">
                                            <div class="col-3">
                                                <ul class="nav nav-pills flex-column">
                                                    <li class="active">
                                                        <a href="#tab-1" data-toggle="tab">@lang('places_hot_places')</a>
                                                    </li>
                                                    <li><a href="#tab-2" data-toggle="tab">@lang('places_hot_services')</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-9" style="padding-left: 0px;">
                                                <div class="tab-content well">
                                                    <div class="tab-pane active" id="tab-1">
                                                        <div class="suggest__list-place">
                                                            <div class="row">
                                                                @foreach($places as $item)
                                                                <div class="col-3" style="margin-bottom: 15px; padding-left: 0px;">
                                                                    <div class="box-image box-hover" style="background-image: url('{{ $item->getImage("sm") }}');">
                                                                        <a href="{{ $item->getUrl() }}">
                                                                            <h6>{{ $item->name }}</h6>
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
                                                                <div class="col-3 hot-service-list" style="margin-bottom: 10px; padding-left: 0px;">
                                                                    <a href="{{ $item->getUrl() }}" title="{{ $item->name }}">
                                                                        <div class="box-image" style="background-image: url('{{ $item->getImage("sm") }}'); height: 80px; background-color: none;">
                                                                        </div>
                                                                        <h6>{{ shortString($item->name, 34) }}</h6>
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
                            @if(Request::get('group') || Request::get('type'))
                            <div style="margin-top: 10px;">
                                @if(Request::get('group'))
                                <span title="@lang('places_removie_tag_tooltip')" class="btn btn-sm btn-info">{{ $service_groups->firstWhere('id', Request::get('group'))->name  }} <span id="close-group" class="close-tag-btn"><i class="fas fa-times"></i></span></span>
                                @endif
                                @if(Request::get('type'))
                                <span title="@lang('places_removie_tag_tooltip')" class="btn btn-sm btn-info">{{ $service_types->flatten(1)->firstWhere('id', Request::get('type'))->name  }} <span id="close-type" class="close-tag-btn"><i class="fas fa-times"></i></span></span>
                                @endif
                            </div>
                            @endif
                        </form>
                    </div>
                    <nav aria-label="breadcrumb">
                        @if($tours->count())
                        <h3 class="search-result">@lang('places_search_result', ['total' => $tours->total(), 'name' => $place->getTranslation(\App::getLocale())->name])</h3>
                        @else
                        <h3 class="search-result">@lang('places_null_result')</h3>
                        @endif
                    </nav>
                </div>
                <div class="box-list-result">
                    <div class="row">
                        @forelse($tours as $tour)
                        <div class="col-12">
                            <div class="card">
                                <div class="row">
                                    <div class="col-12 col-md-5">
                                        <a href="{{ $tour->getUrl() }}">
                                            <img class="card-img-top" src="{{ $tour->getImage('sm') }}">
                                        </a>
                                    </div>
                                    <div class="col-12 col-md-7">
                                        <div class="card-body">
                                            <a href="{{ $tour->getUrl() }}">
                                                <h3 class="card-title">{{ $tour->name }}</h5>
                                                <p class="card-text">{!! trim_text($tour->description, 200) !!}</p>
                                                {{-- <p class="time-total"><i class="far fa-clock"></i> 2 ngày</p> --}}
                                                <div class="card-bottom d-flex justify-content-between">
                                                    <div class="rate">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="price">{{ number_format($tour->getPrice()) }} @lang('places_currency')</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        @endforelse
                    </div>
                </div>
                {{-- <div class="show-more d-md-none">
                    <div class="loading d-flex justify-content-center">
                        <i class="fas fa-spinner fa-pulse"></i>
                    </div>
                    <button type="button" class="btn btn-outline-primary btn-block">Xem thêm</button>
                </div> --}}
                <div class="box-pagination">
                    @if(count($tours))
                        {!! $tours->appends(Request::all())->links() !!}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/rangeslider.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        var locale_key = "{{ \App::getLocale() }}";
        var min_price_range = {{ Request::get('min_price') ? Request::get('min_price') : (\App::getLocale() == 'vi' ? 1 : 5) }};
        var max_price_range = {{ Request::get('max_price') ? Request::get('max_price') : (\App::getLocale() == 'vi' ? 200 : 500) }};
        $('#price_range-slider').ionRangeSlider({
            type: "double",
            min: (locale_key == 'vi' ? 1 : 5),
            max: (locale_key == 'vi' ? 200 : 500),
            from: min_price_range,
            to: max_price_range,
            step: (locale_key == 'vi' ? 1 : 5),
            hide_min_max: true,
            grid: true,
            postfix: " {{ __('places_million') }}",
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
                queryParameters['page'] = 1;
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
                queryParameters['page'] = 1;
                location.search = $.param(queryParameters);
            },
        });

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

        $('.box-checkbox-custom input[type=checkbox]').on('change', function(e){
            durationArray = $('form[name=duration]').serializeArray();
            var queryParameters = {}, queryString = location.search.substring(1),
                re = /([^&=]+)=([^&]*)/g, m;
            while (m = re.exec(queryString)) {
                queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
            }
            queryParameters['page'] = 1;
            queryParameters['duration'] = durationArray.map(a => a.value).toString();
            location.search = $.param(queryParameters);
        });

        $("#close-group").click(function(){
            var queryParameters = {}, queryString = location.search.substring(1),
                re = /([^&=]+)=([^&]*)/g, m;
            while (m = re.exec(queryString)) {
                queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
            }
            delete queryParameters['group'];
            location.search = $.param(queryParameters);
        });
        $("#close-type").click(function(){
            var queryParameters = {}, queryString = location.search.substring(1),
                re = /([^&=]+)=([^&]*)/g, m;
            while (m = re.exec(queryString)) {
                queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
            }
            delete queryParameters['type'];
            location.search = $.param(queryParameters);
        });
        $("#button-addon2").click(function(){
            $("#input-search").val('');
        });
    </script>
    <script type="text/javascript">
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
@endsection
