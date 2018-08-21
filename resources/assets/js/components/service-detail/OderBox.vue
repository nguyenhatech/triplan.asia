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
                <span>Ngày đi:</span>
                <span style="font-weight: bold">{{ date }}</span>
            </div>
            <div v-if="service_packages.length">
                <span style="display: block; margin-top: 5px;">Số lượng:</span>
                <div
                    v-for="service_package in service_packages"
                    :key="service_package.id">
                    <div class="d-flex justify-content-between align-items-center" style="min-height: 30px">
                        <span>
                            {{ service_package.quantity }} x {{service_package.name}}
                        </span>
                        <span>
                            {{ service_package.quantity * service_package.price_with_currency | number }}
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
                    totalFree += value.quantity * value.price_with_currency
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
                window.location.href = this.data_params.url_booking_step1
                // var dataBooking = localStorage.getItem('dataBooking');
                // console.log('dataBooking: ', JSON.parse(dataBooking));
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
