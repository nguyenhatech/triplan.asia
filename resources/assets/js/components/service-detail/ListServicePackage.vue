<template>
    <div class="service-package d-flex flex-column">
        <div class="service-package__item"
            v-for="package_parent in servicePackageParent"
            :key="package_parent.id">
            <div class="package_parent d-flex justify-content-between">
                <div class="name">
                    {{ package_parent.name }}
                </div>
                <div class="d-flex flex-column">
                    <div>
                        <span class="currency">VND</span>
                        <span class="price">{{ package_parent.price }}</span>
                    </div>
                    <span class="choose_package d-flex justify-content-center align-items-center"
                        v-if="package_parent.service_package_childrens.data.length">
                        Chọn
                    </span>
                </div>
            </div>
            <div class="package_children"
                v-if="package_parent.service_package_childrens.data.length">
                <div class="package_children__item d-flex justify-content-between align-items-center"
                    v-for="package_children in package_parent.service_package_childrens.data">
                    <div class="d-flex flex-column">
                        <span class="name">
                            {{ package_children.name }}
                        </span>
                        <span class="price">
                            VND {{ package_children.price }} / Số lượng
                        </span>
                    </div>
                    <div class="d-flex align-items-center">
                        <span class="button-action d-flex justify-content-center align-items-center">
                            <i class="fas fa-minus"></i>
                        </span>
                        <span class="quantity">
                            9
                        </span>
                        <span class="button-action d-flex justify-content-center align-items-center">
                            <i class="fas fa-plus"></i>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters } from 'vuex'
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
        computed: {
          ...mapGetters(['loading'])
        },
        mounted () {
            console.log(this.loading)
            this.getServicePackageParent();
        },
        methods: {
            getServicePackageParent () {
                axios.get('service-packages', {params: {service_id: this.service_id, parent_id: 0, include:'service_package_childrens'}}).then(response => {
                    let servicePackageParent = response.data.data;
                    servicePackageParent.map(function(index, elem) {
                        index.checked = false;
                        return index;
                    })
                    switch (response.data.code) {
                        case 200:
                            this.servicePackageParent = servicePackageParent;
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
    margin: 10px 0px;
}
.service-package__item {
    background-color: #fff;
    margin-bottom: 15px;
    border-radius: 4px;
}
.service-package__item.active {
    border: 2px solid #19A577;
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

.package_children {
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    padding: 10px 10px 0px 10px;
    margin-bottom: 20px;
}
.package_children__item {
    padding-right: 50%;
    margin-bottom: 10px;
}
.package_children__item .name {
    font-weight: 700;
    color: #333;
    font-size: 15px;
}
.package_children__item .price {
    color: #666;
    font-size: 12px;
}
.package_children__item .quantity {
    padding-right: 10px;
    padding-left: 10px;
    font-weight: bold;
}
.package_children__item .button-action {
    width: 30px;
    height: 30px;
    border: 1px solid #19A577;
    cursor: pointer;
}
.package_children__item .button-action i {
    font-size: 10px;
    color: #19A577;
}
</style>
