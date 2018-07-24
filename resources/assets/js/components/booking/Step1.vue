<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="form-booking">
                    <div class="form-booking__item">
                        <div class="header">
                            <span>
                                Thông tin người đặt
                            </span>
                        </div>
                        <div class="content">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="name" >Tên (trên hộ chiếu)</label>
                                    <input type="text" class="form-control" placeholder="Như trên passport">
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="name" >Họ (trên hộ chiếu)</label>
                                    <input type="text" class="form-control" placeholder="Như trên passport">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="name" >Quốc gia/Vùng lãnh thổ</label>
                                    <select class="custom-select">
                                        <option selected>Vui lòng chọn</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label class="name" >Mã </label>
                                    <select class="custom-select">
                                        <option selected>Chọn</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="name" >Số điện thoại</label>
                                    <input type="text" class="form-control" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="name">Email</label>
                                    <input type="text" class="form-control" placeholder="Địa chỉ email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-booking__item booking_now">
                        <div class="row">
                            <div class="col-md-8">
                                <span>
                                    Khi nhấp vào "Thanh toán", bạn đồng ý rằng bạn đã đọc và hiểu Điều khoản sử dụng và Chính xách huỷ trả
                                </span>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-booking-now">
                                    Thanh toán ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-booking__item info-booking">
                    <div class="name">
                        <span>Vé đi đâu đó</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'BookingStep1',
        props: {

        },
        data () {
            return {
                dataBooking: {}
            }
        },
        components: {

        },
        computed: {

        },
        mounted () {
            this.getDateLocalStorage();
        },
        methods: {
            getDateLocalStorage () {
                this.dataBooking = localStorage.getItem('dataBooking');
            }
        }
    }
</script>

<style type="text/css" scoped>
.form-booking__item {
    border: 1px solid #d1d1d1;
    background-color: #fff;
    margin-bottom: 15px;
}
.form-booking__item .header {
    background-color: #19A577;
    color: #fff;
    font-size: 20px;
    padding: 10px 20px 10px 50px;
}
.form-booking__item .content {
    padding: 40px 32px 10px;
}
.booking_now {
    padding: 15px 25px;
}
.btn-booking-now {
    padding: 6px 40px;
    background-color: #19A577;
    color: #fff;
}
/* Phần Info bên trái*/
.info-booking {
    padding: 15px 20px;
}
.info-booking .name {
    font-size: 15px;
    font-weight: 600;
    color: #333;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 8px;
    margin-bottom: 15px;
}
/*Đè bootstrap*/
.form-control {
    font-size: 14px;
}
</style>
