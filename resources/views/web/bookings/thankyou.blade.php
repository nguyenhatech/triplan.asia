@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .thank-you {
            padding-top: 110px;
            background-color: #EEEEEE;
            min-height: 300px;
            padding-bottom: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="thank-you">
        <thank-you :data_params="{{ $data_params }}"></thank-you>
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
