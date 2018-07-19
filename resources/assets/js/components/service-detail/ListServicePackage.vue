<template>
    <div>
        <div class="service-package__item">
            <div class="d-flex justify-content-between">
                <div>
                    Gói Summer Discounted Ticket QR Code (tháng 7)
                </div>
                <div>
                    <span>VND</span>
                    <span>76.000 đồng</span>
                    <span>Chọn</span>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div>
                    Bên trái
                </div>
                <div>
                    Bên phải
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'BookingComponent',
        props: {
          service_id: {
            type: Number,
            default: () => {
              return {}
            }
          }
        },
        data () {
            return {
                servicePackageParent: []
            }
        },
        components: {

        },
        mounted () {
            this.getServicePackageParent();
        },
        methods: {
            getServicePackageParent () {
                axios.get('service-packages', {params: {service_id: this.service_id, parent_id: 0, include:'service_package_childrens'}}).then(response => {
                    console.log(response.data.data)
                    switch (response.code) {
                        case 200:
                            this.servicePackageParent = response.data.data;
                            break
                        case 404:
                            break
                        default:
                            break
                    }
                })
            }
        }
    }
</script>

<style type="text/css" scoped>

</style>
