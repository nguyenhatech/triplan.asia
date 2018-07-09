@extends('web.layouts.master')

@section('title')
    {{ $title }}
@endsection

@section('styles')
    <style type="text/css">
        .image {
            background-image: url({{ get_asset('web/images/banners/baner1.jpg') }});
            height: 100vh;
            width: 100vw;
            background-size: cover;

        }
    </style>
@endsection

@section('content')
    <div class="web-home">
        <div class="image">

        </div>
    </div>
@endsection

@section('scripts')

@endsection
