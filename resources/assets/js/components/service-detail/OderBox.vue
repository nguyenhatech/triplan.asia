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
        <div v-else>
            <span class="name">
                {{ package_name }}
            </span>
        </div>
        <div class="d-flex flex-column justify-content-between align-items-center">
            <a href="/" class="btn btn-block booking-now">
                ĐẶT NGAY
            </a>
            <a href="https://www.facebook.com/TriplanVN/" target="_blank" class="btn btn-block btn-warning" style="margin-top: 15px; color: #fff">
                Chat ngay với Triplan
            </a>
        </div>
        <div class="count-booking">
            <i class="fas fa-users"></i>
            836 Đã được đặt
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
    export default {
        name: 'OderBox',
        props: {
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
          ...mapGetters('serviceDetail', ['date', 'package_name', 'service_packages'])
        },
        mounted () {

        },
        methods: {

        }
    }
</script>

<style type="text/css" scoped>
.order-box .name {
    font-size: 18px;
    font-weight: 700;
}
</style>
