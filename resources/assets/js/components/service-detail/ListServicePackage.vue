<template>
    <div class="service-package d-flex flex-column">
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
                    <span class="choose_package d-flex justify-content-center align-items-center">
                        Chọn
                    </span>
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
                    <span class="choose_package d-flex justify-content-center align-items-center">
                        Chọn
                    </span>
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
    background-color: #f2f2f2;
    padding: 10px 10px 0px 10px;
}
.service-package__item {
    background-color: #fff;
    margin-bottom: 15px;
    border-radius: 4px;
}
.service-package__item .package_parent {
    padding: 10px;
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
.package_parent .choose_package {
    border: 2px solid #19A577;
    cursor: pointer;
    padding: 6px;
    border-radius: 4px;
    margin-top: 3px;
}
.package_children__item {
    padding-right: 50%;
}
.package_children {
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    padding: 10px;
    margin-bottom: 20px;
}
</style>
