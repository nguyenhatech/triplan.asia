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
        .form-data h4 {
            margin-bottom: 20px;
        }
        .form-data label {
            font-size: 10px;
            text-transform: uppercase;
            font-weight: bold;
        }
        .form-data input {
            font-size: 13px;
            border: 1px solid #EBEBEB;
            height: 36px;
        }
        .form-data .form-control:focus {
            outline: none;
            box-shadow: none;
        }
        ::-webkit-input-placeholder { /* WebKit, Blink, Edge */
            color:    #909;
        }
        :-moz-placeholder { /* Mozilla Firefox 4 to 18 */
           color:    #909;
           opacity:  1;
        }
        ::-moz-placeholder { /* Mozilla Firefox 19+ */
           color:    #909;
           opacity:  1;
        }
        :-ms-input-placeholder { /* Internet Explorer 10-11 */
           color:    #909;
        }
        ::-ms-input-placeholder { /* Microsoft Edge */
           color:    #909;
        }

        ::placeholder { /* Most modern browsers support this now. */
           color:    #909;
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
                            <h4 class="font-weight-bold">Trở thành Merchant và hưởng nhiều ưu đãi</h4>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Họ và tên:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập họ tên">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Số điện thoại:</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Số điện thoại">
                                <small id="emailHelp" class="form-text text-muted">Chúng tôi sẽ không bao giờ chia sẻ số điện thoại của bạn với bất kỳ ai khác.</small>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-danger">Gửi ngay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
