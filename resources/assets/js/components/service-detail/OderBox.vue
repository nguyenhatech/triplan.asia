<template>
    <div class="order-box">
        <div
            class="d-flex justify-content-between"
            v-if="!package_name">
            <span>Giá từ</span>
            <span class="price">
                <span>
                    VND
                </span>
                <span>
                    {{ service.price }}
                </span>
            </span>
        </div>
        <div v-if="package_name">
            <span class="name">
                {{ package_name }}
            </span>
            <div>
                {{ date }}
            </div>
            <div v-if="service_packages.length">
                <div
                    v-for="service_package in service_packages"
                    :key="service_package.id">
                    <span>
                        {{service_package.name}}
                    </span>
                    <span>
                        x {{service_package.quantity}}
                    </span>
                </div>
                <p>Tổng tiền: {{ calcFee }}</p>
            </div>
        </div>
        <div class="d-flex flex-column justify-content-between align-items-center">
            <span @click="nextStepBooking()" class="btn btn-block booking-now" :class="[!disableButton ? 'isDisabled' : '']">
                ĐẶT NGAY
            </span>
        </div>
        <div class="count-booking">
            <i class="fas fa-users"></i>
            836 Đã được đặt
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
                    totalFree += value.quantity * value.price
                })
                return totalFree
            },
            disableButton () {
                return this.date !== '' && this.package_name !== '';
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

                // Put the object into storage
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
</style>
