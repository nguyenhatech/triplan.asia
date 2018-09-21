@extends('web.layouts.master')

@section('styles')
    <style type="text/css">
        .gradient-top {
            padding-top: 52px;
            background-color: #02a676;
        }
        .profile-picture-box {
            width: 100%;
            height: 200px;
            /*border: 1px solid #ddd;*/
            /*border-radius: 3px;*/
        }
        .menu-action {
            list-style: none;
            padding-left: 50px;
            margin-top: 10px;
        }
        .menu-action li {
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 16px;
        }
        .menu-action li a {
            color: #000;
        }
        .menu-action li a:hover {
            text-decoration: none;
            color: #02a676;
        }
        .menu-action li a.active {
            color: #02a676;
        }
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit label {
            display: flex;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all .2s ease-in-out;
            color: #797979;
            justify-content: center;
            align-items: center;
        }
        .avatar-upload .avatar-edit label:hover {
            background: #c8ece1;
            border-color: #87cab7;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .booking-code {
            font-size: 16px;
            font-weight: bold;
            text-transform: uppercase;
            color: #02a676;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 gradient-top">
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px; margin-bottom: 20px;">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-3">
                <div class="profile-picture-box d-flex justify-content-center align-items-center">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type="file" id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg" />
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="background-image: url('{{ $account->getImage() }}');">
                            </div>
                        </div>
                    </div>
                </div>

                <ul class="menu-action">
                    <li><a href="{{ route('web.dashbroad') }}"><i class="far fa-user"></i> Thông tin cá nhân</a></li>
                    <li><a href="#" class="active"><i class="fas fa-list"></i> Lịch sửa booking</a></li>
                    <li><a href="{{ route('web.profile.wishlist') }}"><i class="far fa-heart"></i> Địa điểm yêu thích</a></li>
                </ul>
            </div>
            <div class="col-12 col-sm-8 col-md-9">
                <div class="card">
                    <div class="card-header">
                    Booking đã đặt
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col" width="180px">Thông tin</th>
                                    <th scope="col">Dịch vụ</th>
                                    <th scope="col" width="100px">Thanh toán</th>
                                    <th scope="col" width="100px">Trạng thái</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($account->bookings as $index => $booking)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>
                                            <p>
                                                Mã:
                                                <span class="booking-code">{{ $booking->code }}</span>
                                            </p>
                                            <p>Ngày đặt: {{ substr($booking->created_at, 0, 10) }}</p>
                                        </td>
                                        <td>
                                            @foreach($booking->details as $detail)
                                            <p>{{ $detail->service->getTranslation(\App::getLocale())->name }}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $booking->getPaymentText() }}
                                        </td>
                                        <td>
                                            {{ $booking->getStatusText() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                        $('#imagePreview').hide();
                        $('#imagePreview').fadeIn(650);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imageUpload").change(function() {
                readURL(this);
            });
        });
    </script>
@endsection
