@extends('web.layouts.master')

@section('styles')
    <style type="text/css">
        .become-host {
            padding-top: 150px;
            height: 100vh;
            background-color: #f7f7f7;
            background-image: url('{{ get_asset('web/images/login/0ffd8594-f123-43f0-85bb-7ef88c6f0624.jpg') }}');
            background-size: cover;
            background-position: center;
        }
        .form-data {
            background: #ffffff !important;
            border-radius: 4px !important;
            padding: 32px !important;
            padding-bottom: 24px !important;
            margin-left: 100px;
            width: 350px !important;
            margin-bottom: 64px !important;
            box-shadow: 0 16px 40px rgba(0,0,0,0.12) !important;
        }
    </style>
@endsection

@section('content')
    <div class="become-host">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-data">
                        <form>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
