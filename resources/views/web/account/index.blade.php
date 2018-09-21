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
        <form method="post" action="{{ route('web.profile.update') }}" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 col-sm-4 col-md-3">
                    <div class="profile-picture-box d-flex justify-content-center align-items-center">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="imageUpload" name="avatar" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"><i class="fas fa-pencil-alt"></i></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('{{ $account->getImage() }}');">
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="menu-action">
                        <li><a href="#" class="active"><i class="far fa-user"></i> Thông tin cá nhân</a></li>
                        <li><a href="{{ route('web.profile.bookings') }}"><i class="fas fa-list"></i> Lịch sửa booking</a></li>
                        <li><a href="{{ route('web.profile.wishlist') }}"><i class="far fa-heart"></i> Địa điểm yêu thích</a></li>
                    </ul>
                </div>
                <div class="col-12 col-sm-8 col-md-9">
                    <div class="card">
                      <div class="card-header">
                        Thông tin tài khoản
                      </div>
                      <div class="card-body">
                        @include('flash-message')
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->first('name') ? 'is-invalid' : '' }}">
                                <label for="name">Tên</label>
                                <input type="text" class="form-control" value="{{ $account->name }}" name="name" placeholder="Nhập tên">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                              </div>
                            <div class="form-group {{ $errors->first('email') ? 'has-error' : '' }}">
                                <label for="email">Email address</label>
                                <input type="email" name="email" class="form-control" value="{{ $account->email }}" placeholder="Nhập email" readonly>
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="form-group {{ $errors->first('phone') ? 'has-error' : '' }}">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" value="{{ $account->phone }}" name="phone" placeholder="Nhập số điện thoại">
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            </div>
                            <div class="form-group {{ $errors->first('birthdate') ? 'has-error' : '' }}">
                                <label for="birthday">Ngày sinh</label>
                                <div class="input-group" style="width: 300px;">
                                    <select class="form-control" name="birthdate">
                                        <option value>Ngày</option>
                                        @for ($day = 1; $day < 32; $day++)
                                        <option value="{{ ($day < 10) ? '0' . $day : $day }}" {{ substr($account->birthday, 9, 2) == $day ? 'selected' :'' }}>{{ $day }}</option>
                                        @endfor
                                    </select>
                                    <select class="form-control" name="birthmonth">
                                        <option value>Tháng</option>
                                        @for($month = 1; $month < 13; $month++)
                                        <option value="{{ $month < 10 ? '0' . $month : $month }}" {{ substr($account->birthday, 6, 2) == $month ? 'selected' : '' }}>{{ $month }}</option>
                                        @endfor
                                    </select>
                                    <select class="form-control" name="birthyear">
                                        <option>Năm</option>
                                        @for ($year = 2010; $year > 1918; $year--)
                                        <option value="{{ $year }}" {{ substr($account->birthday, 0, 4) == $year ? 'selected' : '' }}>{{ $year }}</option>
                                        @endfor
                                    </select>
                                </div>
                                @if($errors->first('birthdate'))
                                <span class="text-danger">{{ $errors->first('birthdate') }}</span>
                                @elseif($errors->first('birthmonth'))
                                <span class="text-danger">{{ $errors->first('birthmonth') }}</span>
                                @elseif($errors->first('birthyear'))
                                <span class="text-danger">{{ $errors->first('birthyear') }}</span>
                                @else
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Lưu lại</button>
                      </div>
                    </div>
                </div>
            </div>
        </form>
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
