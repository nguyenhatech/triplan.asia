<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="form-booking">
                    <div class="form-booking__item">
                        <div class="header">
                            <span style="font-weight: bold; font-size: 16px;">
                                Thông tin người đặt
                            </span>
                        </div>
                        <div class="content">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="name" >Tên (trên hộ chiếu)</label>
                                    <input
                                        v-model="orderBooking.passport_last_name"
                                        v-validate="'required'"
                                        name="passport_last_name"
                                        data-vv-as="Tên (trên hộ chiếu)"
                                        type="text"
                                        class="form-control"
                                        placeholder="Như trên passport">
                                    <span class="error" v-show="errors.has('passport_last_name')">{{ errors.first('passport_last_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="name" >Họ (trên hộ chiếu)</label>
                                    <input
                                        v-model="orderBooking.passport_first_name"
                                        v-validate="'required'"
                                        name="passport_first_name"
                                        data-vv-as="Họ (trên hộ chiếu)"
                                        type="text"
                                        class="form-control"
                                        placeholder="Như trên passport">
                                    <span class="error" v-show="errors.has('passport_first_name')">{{ errors.first('passport_first_name') }}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="name" >Quốc gia/Vùng lãnh thổ</label>
                                    <select
                                        v-model="orderBooking.passport_infomation"
                                        class="custom-select">
                                        <option
                                            v-for="country in countries"
                                            :key="country.id"
                                            :value="country.name">
                                            {{ country.name }} ({{ country.country_code }})
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="name" >Số điện thoại</label>
                                    <input
                                        v-model="orderBooking.phone"
                                        v-validate="'required'"
                                        name="phone"
                                        data-vv-as="Số điện thoại"
                                        type="text"
                                        class="form-control"
                                        placeholder="Số điện thoại">
                                    <span class="error" v-show="errors.has('phone')">{{ errors.first('phone') }}</span>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="name">Email</label>
                                    <input
                                        v-model="orderBooking.email"
                                        v-validate="'required|email'"
                                        name="email"
                                        data-vv-as="Email"
                                        type="email"
                                        class="form-control"
                                        placeholder="Địa chỉ email">
                                    <span class="error" v-show="errors.has('email')">{{ errors.first('email') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-booking__item">
                        <div class="header">
                            <span style="font-weight: bold; font-size: 16px;">
                                Mã khuyến mại
                            </span>
                        </div>
                        <div class="content-promotion">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label class="name" >Tên (trên hộ chiếu)</label>
                                    <input
                                        v-validate="'required'"
                                        name="passport_last_name"
                                        data-vv-as="Tên (trên hộ chiếu)"
                                        type="text"
                                        class="form-control"
                                        placeholder="Như trên passport">
                                    <span class="error" v-show="errors.has('passport_last_name')">{{ errors.first('passport_last_name') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    Nút
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-booking__item booking_now">
                        <div class="row">
                            <div class="col-md-8">
                                <span>
                                    Khi nhấp vào "Thanh toán", bạn đồng ý rằng bạn đã đọc và hiểu Điều khoản sử dụng và Chính sách huỷ trả
                                </span>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-block btn-booking-now" @click="createBooking()">
                                    Đặt ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div
                    v-for="cart in data_cart"
                    class="form-booking__item info-booking">
                    <div class="name">
                        <span>{{ cart.service_info.name }}</span>
                    </div>
                    <div class="info">
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 5px;">
                            <span style="color: #888">Gói: {{ cart.package_name }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 5px;">
                            <span style="color: #888">Ngày: {{ cart.date }}</span>
                        </div>
                        <div>
                            <div v-for="item in cart.service_packages" :key="item.id">
                                <div class="d-flex justify-content-between align-items-center" style="min-height: 30px">
                                    <span>{{item.quantity}} x {{item.name}}</span>
                                    <span style="color: #ff424e; font-weight: bold">
                                        {{ item.quantity * item.price_with_currency | number }} đ
                                    </span>
                                </div>
                            </div>
                        </div>
                        <span v-if="checkTitleFree(cart.service_packages)" style="color: #888; margin-bottom: 5px; display: block">Miễn phí</span>
                        <div>
                            <div v-for="item_sub in cart.service_packages" :key="item_sub.id">
                                <div  v-if="item_sub.free" class="d-flex justify-content-between align-item_subs-center" style="min-height: 30px">
                                    <span>
                                        - {{ Math.min(item_sub.free, item_sub.quantity) }} x {{item_sub.name}}
                                    </span>
                                    <span style="color: #ff424e; font-weight: bold">
                                        - {{ Math.min(item_sub.free, item_sub.quantity) * item_sub.price_with_currency | number }} đ
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-booking__item info-booking">
                    <div class="info">
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 16px;">
                            <span style="color: #888">Tạm tính:</span>
                            <span  style="color: #ff424e; font-weight: bold">{{ data_params.totalCart | number }} đ</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 16px;">
                            <span style="color: #888">Thành tiền:</span>
                            <span  style="color: #ff424e; font-weight: bold">{{ data_params.totalCart | number }} đ</span>
                        </div>
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
            data_cart: {
                type: Object,
                default: () => {
                    return {}
                }
            },
            data_params: {
                type: Object,
                default: () => {
                    return {}
                }
            }
        },
        data () {
            return {
                orderBooking: {
                    phone: '',
                    email: '',
                    alias: 'Mr',
                    passport_last_name: '',
                    passport_first_name: '',
                    passport_infomation: 'Việt Nam',
                    country_code: '+84',
                    payment_method: 1,
                    currency_id: 1,
                    booking_details: [],
                    source: 2
                },
                countries: []
            }
        },
        components: {

        },
        computed: {

        },
        mounted () {
            this.fetchCurrencies();
            _.forEach(this.data_cart, (item) => {
                let booking_detail_item = {
                    service_packages: item.service_packages,
                    date: item.date,
                    service_id: item.service_info.id
                }
                this.orderBooking.booking_details.push(booking_detail_item);
            })
        },
        methods: {
            fetchCurrencies () {
                axios.get('countries', {params: {'limit':-1}}).then(response => {
                    switch (response.code) {
                        case 200:
                            this.countries = response.data
                            break;
                        default:
                            alert('Có lỗi xảy ra. Vui lòng liên hệ amdin')
                    }
                })
            },
            checkTitleFree (service_packages) {
                let flagFree = false
                _.forEach(service_packages, (value) => {
                    if (value.free) {
                        flagFree = true
                    }
                })
                return flagFree;
            },
            createBooking () {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('bookings', this.orderBooking).then(response => {
                            switch (response.code) {
                                case 200:
                                    window.location.href = this.data_params.url_booking_thankyou + '?code=' + response.data.code
                                    break;
                                case 422:
                                    let er = response.data.errors
                                    let message = _.head(er[Object.keys(er)[0]])
                                    alert(message)
                                    break;
                                default:
                                    alert('Có lỗi xảy ra. Vui lòng liên hệ amdin')
                            }
                        })
                    }
                })
            }
        }
    }
</script>

<style type="text/css" scoped>
.error {
    color: red;
}
.form-booking__item {
    background-color: #fff;
    margin-bottom: 15px;
}
.form-booking__item span {
    font-size: 13px;
}
.form-booking__item .header {
    background-color: #fff;
    color: #000;
    font-size: 20px;
    padding: 10px 20px 10px 30px;
    border-bottom: 1px solid #e0e0e0;
}
.form-booking__item .content {
    padding: 40px 32px 10px;
}
.form-booking__item .content-promotion {
    padding: 20px 32px 10px;
}
.booking_now {
    padding: 15px 25px;
}
.btn-booking-now {
    padding: 6px 40px;
    color: #fff;
    background-color: #ff424e;
    border-color: #ff424e;
    border: none;
}
/* Phần Info bên trái*/
.info-booking {
    padding: 15px 20px;
}
.info-booking .name {
    font-size: 14px;
    font-weight: 600;
    color: #333;
    border-bottom: 1px solid #e0e0e0;
    padding-bottom: 8px;
    margin-bottom: 8px;
}
/*Đè bootstrap*/
.form-control {
    font-size: 14px;
}
</style>
