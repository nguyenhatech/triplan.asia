@extends('web.layouts.master')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ get_asset('web/librarys/screens/web/homes/index.css') }}">
    <style type="text/css">
        #view-more-btn {
            color: #02a676;
            border-color: #02a676;
        }
        #view-more-btn:hover {
            color: #fff;
            background-color: #02a676;
        }
    </style>
@endsection

@php
    $locale = \App::getLocale();
@endphp

@section('content')
    <div class="home-banner">
        <div class="slide-show">
            @forelse($banners as $banner)
            <div class="slide-show__item">
                <img src="{{ $banner->getImage() }}">
            </div>
            @empty
            <div class="slide-show__item">
                <img src="{{ get_asset('web/images/banners/baner2-min.jpg') }}">
            </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <div class="quick-search d-flex flex-column justify-content-center align-items-center">
                <div class="solugan d-flex flex-column justify-content-center align-items-center">
                    <h1 class="main-solugan">@lang('where_do_you_want_to_go')</h1>
                    {{-- <h3 class="sub-solugan">@lang('web_home_baner_top_sologun')</h3> --}}
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
    <div class="home-best-trips">
        <div class="container">
            <div class="row">
                <div class="home-title col-md-12">
                    <span class="title">@lang('web_home_favorite_service')</span>
                </div>
            </div>
            <div class="row no-gutters">
                @forelse ($best_services as $key_service => $service)
                    <div class="col-sm-12 col-md-3">
                        <a target="_blank" href="{{ route('web.services.detail', [$service->getTranslation($locale)->slug, $service->uuid]) }}" class="link-best-trip__item" title="{{ $service->getTranslation($locale)->name }}">
                            <div class="best-trip__item">
                                <div class="image">
                                    <img src="{{ $service->getImage('sm') }}" alt="{{ $service->getTranslation($locale)->name }}" title="{{ $service->getTranslation($locale)->name }}">
                                </div>
                                <div class="info-trip">
                                    <h3 class="name">{{ shortString(title_case($service->getTranslation($locale)->name), 70) }}</h3>
                                    <div class="d-flex justify-content-between">
                                        <span class="address">
                                            @if($service->getTranslation($locale)->address)
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>{{ $service->place ? $service->place->getTranslation($locale)->name: '' }}</span>
                                            @endif
                                        </span>

                                        <span class="d-flex align-items-center">
                                            <span class="price">{{ $service->getPrice() }}</span>
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
    <div class="home-best-trips home-resorts">
        <div class="container">
            @forelse ($resorts as $resort)
                <div class="resort-item">
                    <div class="row no-gutters">
                        <div class="resorts-description col-md-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <p>{{ $resort->name }}</p>
                                    <span class="title">{{ $resort->slogan }}</span>
                                </div>
                                <a target="_blank" href="{{ route('resorts.show', $resort->id) }}" class="view-more">
                                    <span>Xem tất cả</span>
                                    <span><i class="fas fa-chevron-right"></i></span>
                                </a>
                            </div>
                        </div>
                        @forelse ($resort->services as $key_service => $service)
                            <div class="col-sm-12 col-md-3">
                                <a target="_blank" href="{{ route('web.services.detail', [$service->getTranslation($locale)->slug, $service->uuid]) }}" class="link-best-trip__item" title="{{ $service->getTranslation($locale)->name }}">
                                    <div class="best-trip__item">
                                        <div class="image">
                                            <img src="{{ $service->getImage('sm') }}" alt="{{ $service->getTranslation($locale)->name }}" title="{{ $service->getTranslation($locale)->name }}">
                                        </div>
                                        <div class="info-trip">
                                            <h3 class="name">{{ shortString(title_case($service->getTranslation($locale)->name), 70) }}</h3>
                                            <div class="d-flex justify-content-between">
                                                <span class="address">
                                                    @if($service->getTranslation($locale)->address)
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <span>{{ $service->place ? $service->place->getTranslation($locale)->name: '' }}</span>
                                                    @endif
                                                </span>

                                                <span class="d-flex align-items-center">
                                                    <span class="price">{{ $service->getPrice() }}</span>
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
            @empty

            @endforelse
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {

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
@endsection
