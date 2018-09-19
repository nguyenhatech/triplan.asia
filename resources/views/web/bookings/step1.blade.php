@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .booking-step1 {
            padding-top: 110px;
            background-color: #f7f7f7;
            min-height: 300px;
            padding-bottom: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="booking-step1">
        <booking-step1 :data_params="{{ $data_params }}"></booking-step1>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.header-top-navigation').addClass('header-top-navigation-scroll');
            $('.navbar-light .navbar-nav .nav-link').addClass('nav-link-scroll');
            $('#logo_white').hide();
            $('#logo_blue').show();
        });
    </script>
@endsection

