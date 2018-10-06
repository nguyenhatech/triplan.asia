@extends('web.layouts.master')

@section('styles')
    <style type="text/css">
        .become-host {
            padding-top: 150px;
            height: 100vh;
            background-color: #f7f7f7;
        }
        .form-data {
            background: #ffffff !important;
            border-radius: 4px !important;
            padding: 32px !important;
            padding-bottom: 24px !important;
            margin-bottom: 64px !important;
            box-shadow: 0 16px 40px rgba(0,0,0,0.12) !important;
            min-height: 300px;
        }
        .form-data img {
            width: 150px;
        }
    </style>
@endsection

@section('content')
    <div class="become-host">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-8">
                    <div class="form-data d-flex flex-column align-items-center justify-content-center">
                        <img src="{{ get_asset('web/images/login/empty-booking.jpg') }}">
                        <p class="pt-3">Xin cảm ơn. Chúng tôi đã nhận được yêu cầu trở thành đối tác của bạn.</p>
                        <a href="/" class="btn btn-danger btn-sm">Trở về trang chủ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
