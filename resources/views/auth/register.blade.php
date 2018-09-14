@extends('web.layouts.master')

@section('styles')
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

        .web-login {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .help-block {
            color: red;
            margin-top: 5px;
        }

        .web-login .form-control {
            font-size: 14px;
        }
        .web-login .form-control:focus {
            outline: none;
            box-shadow: none;
        }

        .btn-booking-now {
            padding: 6px 40px;
            background-color: #19A577;
            color: #fff;
            background: #00F260;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #0575E6, #00F260);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #0575E6, #00F260); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            border: none;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 gradient-top" style="background-image: url({{ get_asset('web/images/login/background-login.jpg') }});">
                <div class="city-name">
                    <h1>@lang('register_title')</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container web-login">
        <div class="row">
            <div class="col-md-3 col-lg-4">

            </div>
            <div class="col-md-6 col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus placeholder="@lang('register_name')">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="@lang('login_email')">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required placeholder="@lang('login_pass')">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="@lang('login_re_pass')">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <span>
                                        <button type="submit" class="btn btn-booking-now btn-block">
                                            @lang('register_btn_login_txt')
                                        </button>
                                    </span>

                                </div>
                            </div>
                        </form>


                        <div class="form-group" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <a href="{{ route('redirect-social', 'facebook') }}" class="btn btn-primary btn-block">
                                    <div class="d-flex justify-content-around align-items-center">
                                        <i class="fab fa-facebook"></i>
                                        <span>@lang('register_btn_register_with_FB_txt')</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="form-group" style="margin-top: 30px;">
                            <div class="col-md-12">
                                <a href="{{ route('login') }}">
                                    @lang('register_sugget_login_txt')
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
