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
        .data-cart-right-checkout .btn-checkout {
            color: #fff;
            background-color: #ff424e;
            border-color: #ff424e;
            font-size: 14px;
            padding: 8px;
        }
        .data-cart {
            background-color: #fff;
            min-height: 20px;
        }
    </style>
@endsection

@section('content')
    <div class="cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb-1">
                    <h6 class="text-uppercase font-weight-bold">Giỏ hàng</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="data-cart">
                        <div class="data-cart_item">

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
        });
    </script>
@endsection
