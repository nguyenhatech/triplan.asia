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
                                <div class="form-group col-md-2">
                                    <label class="name" >Mã </label>
                                    <select
                                        v-model="orderBooking.passport_infomation"
                                        class="custom-select">
                                        <option
                                            v-for="country in countries"
                                            :key="country.id"
                                            :value="country.name">
                                            ({{ country.country_code }})
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
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
                    <div class="form-booking__item booking_now">
                        <div class="row">
                            <div class="col-md-8">
                                <span>
                                    Khi nhấp vào "Thanh toán", bạn đồng ý rằng bạn đã đọc và hiểu Điều khoản sử dụng và Chính xách huỷ trả
                                </span>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-booking-now" @click="createBooking()">
                                    Đặt vé ngay
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-booking__item info-booking">
                    <div class="name">
                        <span>{{ dataBooking.service_info.name }}</span>
                    </div>
                    <div class="info">
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 16px;">
                            <span style="color: #888">Tên gọi dịch vụ</span>
                            <span>{{ dataBooking.package_name }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 16px;">
                            <span style="color: #888">Ngày</span>
                            <span>{{ dataBooking.date }}</span>
                        </div>
                        <div class="d-flex justify-content-between" style="margin-bottom: 16px;">
                            <span style="color: #888">Đơn vị</span>
                            <div>
                                <p v-for="item in dataBooking.service_packages" :key="item.id">
                                    <span v-if="item.quantity">{{item.quantity}} x {{item.name}}</span>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-booking__item info-booking">
                    <div class="info">
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 16px;">
                            <span style="color: #888">Tổng cộng</span>
                            <span>{{ calcFee | number }} VND</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center" style="margin-bottom: 16px;">
                            <span style="color: #888">Tổng tiền thanh toán</span>
                            <span>{{ calcFee | number }} VND</span>
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
            data_params: {
                type: Object,
                default: () => {
                    return {}
                }
            }
        },
        data () {
            return {
                dataBooking: {
                    service_info: {
                        name: 'Name'
                    }
                },
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
                    booking_details: []
                },
                countries: []
            }
        },
        components: {

        },
        computed: {
            calcFee () {
                let totalFree = 0;
                _.forEach(this.dataBooking.service_packages, (value) => {
                    totalFree += value.quantity * value.price_with_currency
                })
                return totalFree
            }
        },
        mounted () {
            this.getDateLocalStorage();
            this.fetchCurrencies();
        },
        methods: {
            getDateLocalStorage () {
                if (!(localStorage.getItem('dataBooking'))) {
                    window.location.href = this.data_params.APP_URL
                }
                this.dataBooking = JSON.parse(localStorage.getItem('dataBooking'));
                let booking_detail_item = {
                    service_packages: this.dataBooking.service_packages,
                    date: this.dataBooking.date,
                    service_id: this.dataBooking.service_info.id
                }
                this.orderBooking.booking_details.push(booking_detail_item);
            },
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
            createBooking () {
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        axios.post('bookings', this.orderBooking).then(response => {
                            switch (response.code) {
                                case 200:
                                    alert('Đặt vé thành công');
                                    // Xóa LocalStorage
                                    window.localStorage.removeItem("dataBooking");
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
        },
        watch: {
            'orderBooking.passport_infomation' () {

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
.form-booking__item .header {
    background-color: #19A577;
    color: #fff;
    font-size: 20px;
    padding: 10px 20px 10px 30px;
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
    background: #00F260;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #0575E6, #00F260);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #0575E6, #00F260); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    border: none;
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
