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
            height: 250px;
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
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 gradient-top" style="background-image: url({{ get_asset('web/images/login/background-login.jpg') }});">
                <div class="city-name">
                    <h1>Đăng nhập</h1>
                    <div class="d-none d-lg-block">
                        <p>Đăng nhập để đồng bộ booking và nhận nhiều ưu đãi hấp dẫn</p>
                    </div>
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
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ tôi
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary block">
                                        Đăng nhập
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
