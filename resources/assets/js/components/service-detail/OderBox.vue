<template>
    <div class="order-box">
        <div
            class="d-flex justify-content-between"
            v-if="!package_name">
            <span>{{ data_params.trans.web_service_price_form }}</span>
            <span class="price">
                <span>
                    {{ service_info.price_with_currency | number }}
                </span>
                <span style="font-size: 12px;font-weight: bold">VND</span>
            </span>
        </div>
        <div v-if="package_name">
            <span class="name">
                {{ package_name }}
            </span>
            <div>
                <span style="font-weight: bold">{{ date }}</span>
            </div>
            <div v-if="service_packages">
                <span style="display: block; margin-top: 5px; font-size: 12px;">Số lượng:</span>
                <div
                    v-for="service_package in service_packages"
                    :key="service_package.id">
                    <div class="d-flex justify-content-between align-items-center" style="min-height: 30px">
                        <span>
                            {{ service_package.quantity }} x {{service_package.name}}
                        </span>
                        <span>
                            {{ service_package.quantity * service_package.price_with_currency | number }} VND
                        </span>
                    </div>
                </div>
                <div
                    v-for="service_package_sub in service_packages"
                    :key="service_package_sub.id_translation">
                    <span v-if="service_package_sub.free" style="display: block; margin-top: 5px; font-size: 12px;">Miễn phí:</span>
                    <div v-if="service_package_sub.free" class="d-flex justify-content-between align-items-center" style="min-height: 30px">
                        <span>
                            {{ Math.min(service_package_sub.free,service_package_sub.quantity) }} x {{service_package_sub.name}}
                        </span>
                        <span>
                            - {{ Math.min(service_package_sub.free,service_package_sub.quantity) * service_package_sub.price_with_currency | number }} VND
                        </span>
                    </div>
                </div>
                <div class="d-flex justify-content-between" style="padding-top: 10px;border-top-color: #ccc; border-width: 1px; border-top-style: solid;">
                    <span>Tổng tiền</span>
                    <span>{{ calcFee | number }} VND</span>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-between align-items-center">
            <span @click="nextStepBooking()" class="btn btn-block booking-now" :class="[!disableButton ? 'isDisabled' : '']">
                {{ data_params.trans.web_service_book_now }}
            </span>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'OderBox',
        props: {
            data_params: {
                type: Object,
                default: () => {
                    return {}
                }
            },
            service: {
                type: Object,
                    default: () => {
                    return {}
                }
            }
        },
        data () {
            return {

            }
        },
        components: {

        },
        computed: {
            ...mapGetters('serviceDetail', ['date', 'package_name', 'service_packages', 'service_info']),
            calcFee () {
                let totalFree = 0;
                _.forEach(this.service_packages, (value) => {
                    totalFree += (value.quantity - Math.min(value.free,value.quantity)) * value.price_with_currency
                })
                return totalFree
            },
            disableButton () {
                let flag = false;
                _.forEach(this.service_packages, (item) => {
                    if (item.quantity) {
                        flag = true
                    }
                })
                _.forEach(this.service_packages, (item) => {
                    if (item.min != 0) {
                        if (item.min > item.quantity) {
                             flag = false
                        }
                    }
                })
                return this.date !== '' && this.package_name !== '' && flag;
            }
        },
        mounted () {
                            console.log(this.data_params.url_cart)
        },
        methods: {
            ...mapActions('serviceDetail', ['setServiceInfo']),
            nextStepBooking () {
                var dataBooking = {
                    service_info: this.service_info,
                    date: this.date,
                    package_name: this.package_name,
                    service_packages: this.service_packages
                };

                localStorage.setItem('dataBooking', JSON.stringify(dataBooking));

                $.ajaxSetup({
                    headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') }
                });
                let _this = this
                $.ajax({
                    url: app_url + '/vi/gio-hang/add-cart-real-time',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {dataBooking: JSON.stringify(dataBooking)}
                })
                .done(function() {
                    window.location.href = _this.data_params.url_cart
                })
                .fail(function() {

                });
            }
        }
    }
</script>

<style type="text/css" scoped>
.order-box .name {
    font-size: 18px;
    font-weight: 700;
}
.isDisabled {
   color: currentColor;
   cursor: not-allowed;
   opacity: 0.5;
   text-decoration: none;
   display: inline-block;  /* For IE11/ MS Edge bug */
   pointer-events: none;
}
.booking-now {
    background: #00F260;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #0575E6, #00F260);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #0575E6, #00F260); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    border: none;
}
</style>
