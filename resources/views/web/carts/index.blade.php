@extends('web.layouts.master')

@section('styles')
    <style type="text/css">
        .cart {
            padding-top: 80px;
            min-height: 500px;
            background-color: #f7f7f7;
        }
        .data-cart-right {
            background-color: #fff;
            border-radius: 4px;
        }
        .data-cart-right .provisional {
            border-bottom: 1px solid #F4F4F4;
            padding: 17px 20px 21px 19px;
        }
        .data-cart-right .provisional .price {
            color: #ff424e;
            font-size: 18px;
        }
        .data-cart-right-checkout .btn-checkout,
        .data-cart-empty .btn-checkout {
            color: #fff;
            background-color: #ff424e;
            border-color: #ff424e;
            font-size: 14px;
            padding: 8px;
            margin-bottom: 15px;
        }
        .data-cart {
            background-color: #fff;
            border-radius: 4px;
        }
        .data-cart img {
            width: 180px;
            height: 110px;
        }
        .data-cart .info span {
            margin-bottom: 10px;
            line-height: 16px;
            color: #888;
        }
        .data-cart .info .name {
            font-weight: bold;
            color: #000;
            margin-top: 5px;
        }
        .data-cart .action .item {
            font-size: 12px;
            text-decoration: none;
        }
        .data-cart .action .delete {
            margin-left: 10px;
            color: #ff424e;
            cursor: pointer;
        }
        .data-cart-empty {
            background-color: #fff;
            min-height: 300px;
            border-radius: 4px;
        }
        .data-cart-empty .btn-checkout {
            padding: 8px 45px;
        }
    </style>
@endsection

@section('content')
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-1">
                    <h6 class="text-uppercase font-weight-bold">
                        Giỏ hàng <span  class="font-weight-light text-lowercase">({{ count($dataCart) }} dịch vụ)</span>
                    </h6>
                </div>
            </div>
            @if (count($dataCart))
                <div class="row">
                    <div class="col-md-9">
                        <div class="data-cart">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <tbody>
                                        @forelse ($dataCart as $item)
                                            <tr>
                                                <td width="180">
                                                    <img src="{{ $item->service_info->thumb_path }}" alt="{{ $item->service_info->name }}">
                                                </td>
                                                <td width="250">
                                                    <div class="info d-flex flex-column">
                                                        <span class="name">{{ $item->service_info->name }}</span>
                                                        <span class="package_name">Gói: {{ $item->package_name }}</span>
                                                        <span class="date">Ngày: {{ $item->date }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    Chi tiết tiền
                                                </td>
                                                <td width="120">
                                                    <div class="action">
                                                        <a class="item" href="{{ route('web.services.detail', [$item->service_info->slug, $item->service_info->uuid]) }}">
                                                            <i class="far fa-edit"></i>
                                                            Sửa
                                                        </a>
                                                        <span class="item delete btn-delete-cart"
                                                            data-url="{{ route('web.cart.delete-one-cart', $item->service_info->id) }}"
                                                            data-name="{{ $item->service_info->name }}">
                                                            <i class="far fa-trash-alt"></i>
                                                            Xóa
                                                        </span>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="data-cart-right">
                            <div class="provisional">
                                <span class="d-flex justify-content-between">
                                    <span class="font-weight-light">Tạm tính:</span>
                                    <span>13.500.400 đ</span>
                                </span>
                            </div>
                            <div class="provisional">
                                <span class="d-flex justify-content-between">
                                    <span class="font-weight-light">Thành tiền:</span>
                                    <span class="d-flex flex-column align-items-end">
                                        <span class="font-weight-bold price">13.500.400 đ</span>
                                        <span class="font-weight-light" style="font-size: 12px;">(Đã bao gồm VAT)</span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="pt-3 data-cart-right-checkout">
                            <a href="#" class="btn btn-large btn-block btn-danger btn-checkout">
                                Tiến hành đặt hàng
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12">
                        <div class="data-cart data-cart-empty d-flex justify-content-center align-items-center">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <img class="mb-3" src="{{ get_asset('web/images/download/cartEmpty.png')}}">
                                <h5 class="pb-3">Không có sản phẩm nào trong giỏ hàng</h5>
                                <a href="{{ route('web.home') }}" class="btn btn-danger btn-checkout">
                                    Trở về trang chủ
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('.header-top-navigation').addClass('header-top-navigation-scroll');
            $('.navbar-light .navbar-nav .nav-link').addClass('nav-link-scroll');
            $('#logo_white').hide();
            $('#logo_blue').show();


            $('.btn-delete-cart').click(function(event) {
                let deleteOneCartUrl = $(this).attr("data-url");
                let nameCourse = $(this).attr("data-name");
                console.log(deleteOneCartUrl)
                console.log(nameCourse)
                if (confirm("Xóa " + nameCourse + ' ?')) {
                    window.location.href = deleteOneCartUrl;
                }
                return false;
            });
        });
    </script>
@endsection
