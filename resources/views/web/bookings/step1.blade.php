@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .booking-step1 {
            padding-top: 110px;
            background-color: #EEEEEE;
            min-height: 300px;
            padding-bottom: 30px;
        }
    </style>
@endsection

@section('content')
    <div class="booking-step1">
        <booking-step1></booking-step1>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ mix('js/app.js') }}"></script>
@endsection

