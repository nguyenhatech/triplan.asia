<template>
    <div class="service-package">
        <div class="service-package__item">
            <div class="package_parent d-flex justify-content-between">
                <div class="name">
                    Gói Summer Discounted Ticket QR Code (tháng 7)
                </div>
                <div class="d-flex flex-column">
                    <div>
                        <span class="currency">VND</span>
                        <span class="price">76.000</span>
                    </div>
                    <span class="choose_package">Chọn</span>
                </div>
            </div>
            <div class="package_children">
                <div class="package_children__item d-flex justify-content-between">
                    <div>
                        <span>
                            Người lớn
                        </span>
                        <span>
                            VND 1,444,009/Số lượng
                        </span>
                    </div>
                    <div>
                        <i class="fas fa-minus"></i>
                        <i class="fas fa-plus"></i>
                    </div>
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
.service-package {
    padding: 10px 10px;
    background-color: #f2f2f2;
}
.service-package__item {
    padding: 10px 10px;
    background-color: #fff;

}
.service-package__item .package_parent {
    padding: 10px 0px 10px 15px;
}
.package_parent .name {
    font-weight: bold;
    font-size: 16px;
}
.package_parent .currency {
    color: #777;
    font-size: 12px;
    font-weight: bold;
}
.package_parent .price {
    color: #333;
    font-size: 18px;
    font-weight: bold;
}
.package_children__item {
    padding-right: 50%;
}
</style>
