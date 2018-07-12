@extends('web.layouts.master-scroll')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .detail-banner {
            padding-top: 0px;
            height: 500px;
            background-color: #ccc;
        }
        .detail-banner img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <div class="detail-banner">
        <img src="{{ $service->getImage() }}">
    </div>
@endsection

@section('scripts')

@endsection
