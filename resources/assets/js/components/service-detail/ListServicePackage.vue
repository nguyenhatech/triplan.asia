<template>
    <div class="service-package">
        <h4 class="title">Tùy chọn gói</h4>
        <div class="calander">
            <datepicker
                ref="programaticOpen"
                :inline="false"
                placeholder="Chọn ngày"
                :language="vi"
                format="yyyy-MM-dd"
                :disabledDates="{
                    to: new Date(2018, 6, 20),
                    from: new Date(2018, 6, 26),
                }"
                v-model="day"
                @closed="changeDay()">

            </datepicker>
        </div>
        <div class="d-flex flex-column">
            <div class="service-package__item"
                v-for="package_parent in servicePackageParent"
                :key="package_parent.id">
                <div class="package_parent d-flex justify-content-between">
                    <div class="name">
                        {{ package_parent.name }}
                    </div>
                    <div class="d-flex flex-column">
                        <div>
                            <span class="price">{{ package_parent.price_with_currency | number }}</span>
                            <span class="currency">VND</span>
                        </div>
                        <span class="choose_package justify-content-center align-items-center"
                            v-show="!package_parent.checked"
                            @click="openPackageChildren(package_parent)"
                            v-if="package_parent.service_package_children_actives.data.length">
                            Chọn
                        </span>
                    </div>
                </div>
                <transition name="slide-fade">
                    <div class="package_children"
                        v-show="package_parent.checked"
                        v-if="package_parent.service_package_children_actives.data.length">
                        <div class="package_children__item d-flex justify-content-between align-items-center"
                            v-for="package_children in package_parent.service_package_children_actives.data">
                            <div class="d-flex flex-column">
                                <span class="name">
                                    {{ package_children.name }}
                                </span>
                                <span class="price">
                                    {{ package_children.price_with_currency | number }} <span style="font-size: 10px; font-weight: bold">VND</span> / Số lượng
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span
                                    @click="decreaseServicePackage(package_children)"
                                    :class="[package_children.quantity > 0 ? '' : 'disable']"
                                    class="button-action d-flex justify-content-center align-items-center">
                                    <i class="fas fa-minus"></i>
                                </span>
                                <span class="quantity">
                                    {{ package_children.quantity }}
                                </span>
                                <span
                                    @click="increaseServicePackage(package_children)"
                                    class="button-action d-flex justify-content-center align-items-center">
                                    <i class="fas fa-plus"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </transition>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import Datepicker from 'vuejs-datepicker';
    import {vi,en} from 'vuejs-datepicker/dist/locale'
    export default {
        name: 'ListServicePackage',
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
                en: en,
                vi: vi,
                servicePackageParent: [],
                serviceDays: [],
                day: null,
                service_info: {}

            }
        },
        components: {
            Datepicker
        },
        computed: {
          ...mapGetters(['loading'])
        },
        mounted () {
            this.getServicePackageParent();
        },
        methods: {
            ...mapActions('serviceDetail', ['setServicePackageName', 'setServicePackageDay', 'setArrayServicePackages', 'setServiceInfo']),
            getServicePackageParent () {
                axios.get('services/' + this.service.id, {params: {status: 1, include:'service_package_parent_actives.service_package_children_actives,service_day_actives'}}).then(response => {
                    switch (response.code) {
                        case 200:
                            let servicePackageParent = response.data.service_package_parent_actives.data;
                            servicePackageParent.map(function(index, elem) {
                                index.checked = false;
                                index.service_package_children_actives.data.map(function(index2, elem2) {
                                    index2.quantity = 0;
                                    return index2;
                                })
                                return index;
                            })
                            this.servicePackageParent = servicePackageParent;
                            this.serviceDays = response.data.service_day_actives;
                            this.service_info = response.data;
                            this.setServiceInfo(this.service_info)
                            break
                        case 404:
                            break
                        default:
                            break
                    }
                })
            },
            changeDay () {
                let day = this.getFormattedDate(this.day);
                this.setServicePackageDay(day)
            },
            // Kích hoạt nút mở gói dịch vụ
            openPackageChildren (item) {
                if (this.day === null) {
                    this.$refs.programaticOpen.showCalendar();
                    return
                }
                this.servicePackageParent.map(function(item, elem) {
                    item.checked = false;
                    // Reset số lượng các package con về 0
                    item.service_package_children_actives.data.map(function(item2) {
                        item2.quantity = 0;
                        item2.service_package_id = item2.id;
                        return item2;
                    })
                    return item;
                })
                item.checked = true;
                this.setServicePackageName(item.name)
            },
            getFormattedDate(date) {
                let year = date.getFullYear();
                let month = date.getMonth() + 1;
                if (month < 10 ) {
                    month = "0" + month;
                }
                let day = date.getDate();
                if (day < 10 ) {
                    day = "0" + day;
                }
                let str = year + "-" + month + "-" + day;
                return str;
            },
            // Tăng 1 gói con
            decreaseServicePackage (item) {
                if (item.quantity != 0) {
                    item.quantity = item.quantity -1
                }
                this.setArrayServicePackages(item)
            },
            // Trừ 1 gói con
            increaseServicePackage (item) {
                item.quantity = item.quantity + 1
                this.setArrayServicePackages(item)
            }
        }
    }
</script>

<style type="text/css" scoped>
.slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .2s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
.service-package {
    background-color: #f2f2f2;
    padding: 10px 10px 0px 10px;
    margin: 10px 0px;
}
.service-package .title {
    font-weight: 700;
    font-size: 18px;
}
.service-package .calander {
    margin-bottom: 15px;
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
    padding: 20px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
}
.package_parent .name {
    font-weight: bold;
    font-size: 16px;
}
.package_parent .currency {
    color: #777;
    font-size: 10px;
    font-weight: bold;
}
.package_parent .price {
    color: #333;
    font-size: 18px;
    font-weight: bold;
}
.package_parent .choose_package {
    border: 1px solid #19A577;
    cursor: pointer;
    padding: 6px 35px;
    border-radius: 4px;
    margin-top: 3px;
    display: flex;
}
.package_parent .choose_package:hover {
    background: #00F260;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #0575E6, #00F260);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #0575E6, #00F260); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    color: #fff;
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
    width: 35px;
}
.package_children__item .button-action {
    width: 30px;
    height: 30px;
    border: 1px solid #19A577;
    cursor: pointer;
    border-radius: 4px;
}
.package_children__item .button-action i {
    font-size: 10px;
    color: #19A577;
}
.package_children__item .button-action:hover {
    background-color: #f2f2f2;
}
.package_children__item .button-action.disable {
    opacity: 0.4;
    cursor: default;
}

</style>

<style type="text/css">
.calander input {
    height: 40px;
    width: 250px;
    border: none;
    padding-left: 10px;
    outline: none;
    border-radius: 4px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.05);
}
.vdp-datepicker__calendar {
    border: none !important;
    box-shadow: 0 22px 40px rgba(0, 0, 0, 0.15);
    border-radius: 4px;
}
</style>
