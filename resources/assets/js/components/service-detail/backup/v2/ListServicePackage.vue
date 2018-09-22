<template>
    <div class="service-package" ref="porto">
        <h4 class="title">{{ data_params.trans.web_service_package_options }}</h4>
        <div class="calander">
            <datepicker
                ref="programaticOpen"
                :inline="false"
                placeholder="Chọn ngày"
                :language="languages.vi"
                format="yyyy-MM-dd"
                v-model="day"
                :disabledDates="{
                    to:  new Date(),
                    from: disabledDates.from,
                    dates: disabledDates.dates
                }"
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
                                <span style="font-size: 11px; font-style: italic;">
                                    {{ package_children.view_more }}
                                </span>
                                <span class="price">
                                    {{ package_children.price_with_currency | number }}
                                    <span style="font-size: 12px; font-weight: bold">VND</span>
                                </span>
                            </div>
                            <div class="d-flex align-items-center">
                                <span
                                    @click="decreaseServicePackage(package_children)"
                                    :class="getClassDecrease(package_children)"
                                    class="button-action d-flex justify-content-center align-items-center">
                                    <i class="fas fa-minus"></i>
                                </span>
                                <span class="quantity">
                                    {{ package_children.quantity }}
                                </span>
                                <span
                                    @click="increaseServicePackage(package_children)"
                                    :class="getClassIncrease(package_children)"
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
    import { forEach } from 'lodash'
    import moment from 'moment'
    import Datepicker from 'vuejs-datepicker';
    import {vi} from 'vuejs-datepicker/dist/locale'
    export default {
        name: 'ListServicePackage',
        props: {
            data_booking: {
                type: Object,
                default: () => {
                  return {}
                }
            },
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
                languages: {
                    vi: vi
                },
                disabledDates: {
                    from: '',
                    dates: []
                },
                servicePackageParent: [],
                day: null,
                item: {}

            }
        },
        components: {
            Datepicker
        },
        computed: {
            ...mapGetters(['loading'])
        },
        mounted () {
            let _this = this
            setTimeout(() => {
                _this.goto('porto')
            }, 15000)
            if (_.isEmpty(this.data_booking)) {
                this.getServicePackageParent();
            } else {
                // console.log(this.data_booking)
                this.servicePackageParent = this.data_booking.service_info.service_package_parent_actives.data;
                this.day = this.data_booking.date;
                this.setServicePackageDay(this.day)
                this.setServicePackageName(this.data_booking.package_name)
                this.setServiceInfo(this.data_booking.service_info);
                _.forEach(this.data_booking.service_info.service_package_parent_actives.data, (item) => {
                    if (item.checked) {
                        _.forEach(item.service_package_children_actives.data , (item2) => {
                            if (item2.quantity) {
                                this.setArrayServicePackages(item2)
                            }
                        })

                    }
                });
            }
        },
        methods: {
            ...mapActions('serviceDetail', [
                'setServicePackageName',
                'setServicePackageDay',
                'setArrayServicePackages',
                'setServiceInfo'
            ]),
            // Fetch gói dịch vụ
            getServicePackageParent () {
                let params = {
                    status: 1,
                    day: this.day,
                    include:'service_package_parent_actives.service_package_children_actives,service_day_actives'
                }
                axios.get('services/' + this.service.id, {params: params}).then(response => {
                    switch (response.code) {
                        case 200:
                            this.addColumnToServicePackage(response.data.service_package_parent_actives.data);
                            this.setDisabledDates(response.data.disabledDates);
                            this.setServiceInfo(response.data);
                            break
                        case 404:
                            break
                        default:
                            break
                    }
                })
            },
            addColumnToServicePackage (servicePackageParent) {
                servicePackageParent.map(function(index) {
                    index.checked = false;
                    index.service_package_children_actives.data.map(function(item) {
                        item.quantity = 0;
                        return item;
                    })
                    return index;
                })
                this.servicePackageParent = servicePackageParent;
            },
            setDisabledDates (data) {
                let disabledDates = JSON.parse(data)
                if (disabledDates.length) {
                    let  _this = this
                    forEach (disabledDates, function (item) {
                        _this.disabledDates.dates.push(moment(item)._d)
                        _this.disabledDates.from = moment(item)._d
                    })
                }
            },
            // Thay đổi ngày dịch vụ
            changeDay () {
                if (this.day) {
                    let day = this.getFormattedDate(this.day);
                    this.setServicePackageDay(day)
                    this.getServicePackageParent();
                    this.setServicePackageName('');
                    if (this.item.id) {
                        this.openPackageChildren(this.item)
                        this.item = {}
                    }
                }
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
            // Kích hoạt nút mở gói dịch vụ
            openPackageChildren (item) {
                if (this.day === null) {
                    this.$refs.programaticOpen.showCalendar();
                    this.item = item;
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
            // Trừ 1 gói con
            decreaseServicePackage (item) {
                let flag = false;
                if (item.min == 0 && item.quantity > 0) {
                    flag = true;
                }
                if (item.min != 0 && item.quantity > item.min) {
                    flag = true;
                }
                if (flag) {
                    item.quantity = parseInt(item.quantity) - 1
                    this.setArrayServicePackages(item)
                }
            },
            // Tăng 1 gói con
            increaseServicePackage (item) {
                let flag = false;

                if (item.max == 0) {
                    flag = true;
                }
                if (item.max != 0 && item.quantity < item.max) {
                    flag = true;
                }

                if (flag) {
                    item.quantity = parseInt(item.quantity) + 1
                    this.setArrayServicePackages(item)
                }
            },
            // Check điều kiện để disable phần giảm gói
            getClassDecrease (item) {
                if (item.min == 0 && item.quantity > 0) {
                    return '';
                }
                if (item.min != 0 && item.quantity > item.min) {
                    return '';
                }
                return 'disable';
            },
            // Check điều kiện để disable phần tăng gói
            getClassIncrease (item) {
                if (item.max == 0) {
                    return '';
                }
                if (item.max != 0 && item.quantity < item.max) {
                    return '';
                }
                return 'disable';
            },
            goto(refName) {
                var element = this.$refs[refName];
                console.log(element);
                var top = element.offsetTop;
                console.log(top)
                // window.scrollTo(0, top);
                $("html, body").animate({
                    scrollTop: 800
                }, 600);
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
    border-bottom: 1px solid #fff;
    padding: 30px 20px 0px 20px;
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
    font-size: 13px;
    font-weight: bold;
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
    padding: 5px;
}
</style>
