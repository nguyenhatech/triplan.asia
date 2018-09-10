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
                    <h3 class="sub-solugan">@lang('web_home_baner_top_sologun')</h3>
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
    <div class="home-destinations">
        <div class="container">
            <div class="row">
                <div class="home-title col-md-12 d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center">
                        <h1 class="title">@lang('web_home_vn_destination')</h1>
                        <span class="description">@lang('web_home_vn_destination_description')</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($vn_destinations as $key_place => $place)
                    @if($place->services->count())
                    <div class="col-sm-12 col-md-3">
                        <a href="{{ $place->getUrl() }}" title="{{ $place->getTranslation($locale)->name }}">
                            <div class="list__item" style="background-image: url({{ $place->getImage('md') }});">
                                <div class="place-caption">
                                    <span>{{ $place->getTranslation($locale)->name }}</span>
                                    <span class="place-description">{{ shortString($place->getTranslation($locale)->description, 180) }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                @empty

                @endforelse
            </div>
        </div>
        <div class="col-12 d-md-none">
            <a href="{{ route('places.vietnam') }}" id="view-more-btn" class="btn btn-outline-primary btn-block">@lang('web_home_view_more')</a>
        </div>
        <div class="col-12 d-none d-md-block text-center">
            <a href="{{ route('places.vietnam') }}" id="view-more-btn" class="btn btn-outline-primary">@lang('web_home_view_more')</a>
        </div>
    </div>
    <div class="home-destinations">
        <div class="container">
            <div class="row">
                <div class="home-title col-md-12 d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center">
                        <h1 class="title">@lang('web_home_over_destination')</h1>
                        <span class="description">@lang('web_home_over_destination_description')</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($over_destinations as $key_place => $place)
                    @if($place->services->count())
                    <div class="col-sm-12 col-md-3">
                        <a href="{{ $place->getUrl() }}" title="{{ $place->getTranslation($locale)->name }}">
                            <div class="list__item" style="background-image: url({{ $place->getImage('md') }});">
                                <div class="place-caption">
                                    <span>{{ $place->getTranslation($locale)->name }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endif
                @empty

                @endforelse
            </div>
        </div>
        <div class="col-12 d-md-none">
            <a href="{{ route('places.international') }}" id="view-more-btn" class="btn btn-outline-primary btn-block">@lang('web_home_view_more')</a>
        </div>
        <div class="col-12 d-none d-md-block text-center">
            <a href="{{ route('places.international') }}" id="view-more-btn" class="btn btn-outline-primary">@lang('web_home_view_more')</a>
        </div>
    </div>
    <div class="home-best-trips">
        <div class="container">
            <div class="row">
                <div class="home-title col-md-12 d-flex justify-content-center">
                    <div class="d-flex flex-column align-items-center">
                        <span class="title">@lang('web_home_favorite_service')</span>
                        <span class="description">@lang('web_home_favorite_service_description')</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($best_services as $key_service => $service)
                    <div class="col-sm-12 col-md-4">
                        <a href="{{ route('web.services.detail', [$service->getTranslation($locale)->slug, $service->uuid]) }}" class="link-best-trip__item" title="{{ $service->getTranslation($locale)->name }}">
                            <div class="best-trip__item">
                                <div class="image">
                                    <img src="{{ $service->getImage('sm') }}" alt="{{ $service->getTranslation($locale)->name }}" title="{{ $service->getTranslation($locale)->name }}">
                                </div>
                                <div class="info-trip">
                                    <h3 class="name">{{ title_case($service->getTranslation($locale)->name) }}</h3>
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
                }, 1000);
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
