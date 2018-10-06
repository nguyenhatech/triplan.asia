<template>
    <div class="row">
        <div class="col-12 d-none d-lg-block" style="margin-top: 20px;">
            <swiper :options="swiperOption">
                <swiper-slide v-for="(group, index) in serviceGroups" :key="index">
                    <div @click="toggleServiceGroupFilter(group.id)" :class="'service-group-box ' + (filters.service_group.length && !filters.service_group.includes(group.id) ? 'service-group-box-disabled' : '')" :style="{ backgroundImage: 'url(' + group.image_path + ')' }">
                        <div class="caption">
                            <h6 class="box-name">{{ group.name }}</h6>
                            <h6 class="total-number">{{ group.total }}</h6>
                            <div v-if="filters.service_group.includes(group.id)" class="close-button">
                                <i class="fa fa-check"></i>
                            </div>
                        </div>
                    </div>
                </swiper-slide>
                <div class="swiper-button-prev" slot="button-prev"><i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i></div>
                <div class="swiper-button-next" slot="button-next"><i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i></div>
            </swiper>
        </div>
        <div class="col-3 d-none d-md-block" style="margin-top: 42px; margin-bottom: 20px;">
            <div v-if="serviceTypes.length > 1" class="box-service-filter animated animatedFadeInUp fadeInUp">
                <h5>{{ trans ? trans.places_service_type_filter : 'Loại dịch vụ' }}</h5>
                <div class="card" style="width: 100%; padding: 5px 15px 5px 15px;">
                    <form name="duration">
                        <div v-for="(type, index) in serviceTypes" :key="index" class="custom-control custom-checkbox" @click="toggleServiceTypeFilter(type.id)">
                            <input class="custom-control-input" type="checkbox" :id="'type'+type.id" :value="type.id" v-model="filters.service_type">
                            <label class="custom-control-label" :for="'type'+type.id">
                                {{ type.name }}
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-service-filter box-checkbox-custom">
                <h5>{{ trans ? trans.places_price_filter : 'Giá' }}</h5>
                <div class="card" style="width: 100%; padding: 5px 15px 5px 15px;">
                    <div v-for="(price, index) in pricePeriods" :key="index" class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" :id="'price' + price.value" v-model="filters.price" :value="price.value">
                        <label class="custom-control-label" :for="'price' + price.value">
                            {{ price.text }}
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-9">
            <div class="box-title">
                <div class="box-search">
                    <div class="input-group search-box">
                        <div class="input-group-prepend">
                            <button class="btn" type="button" id="button-addon1">
                                <svg viewBox="0 0 24 24" role="presentation" aria-hidden="true" focusable="false" style="height: 24px; width: 24px; display: block; fill: rgb(118, 118, 118);"><path d="m10.4 18.2c-4.2-.6-7.2-4.5-6.6-8.8.6-4.2 4.5-7.2 8.8-6.6 4.2.6 7.2 4.5 6.6 8.8-.6 4.2-4.6 7.2-8.8 6.6m12.6 3.8-5-5c1.4-1.4 2.3-3.1 2.6-5.2.7-5.1-2.8-9.7-7.8-10.5-5-.7-9.7 2.8-10.5 7.9-.7 5.1 2.8 9.7 7.8 10.5 2.5.4 4.9-.3 6.7-1.7v.1l5 5c .3.3.8.3 1.1 0s .4-.8.1-1.1" fill-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <input type="text" value="" id="input-search" :class="'form-control typeahead' + (filters.q ? ' has-search-key' : '')" :placeholder="(trans ? trans.web_home_baner_top_placehoder_input : 'Tìm dịch vụ ở ') + place_name" aria-describedby="button-addon2" v-model="filters.q">
                        <div v-if="filters.q" class="input-group-append">
                            <button @click="filters.q = ''" class="btn" type="button" id="button-addon2">
                                <svg viewBox="0 0 24 24" role="img" focusable="false" style="height: 12px; width: 12px; display: block; fill: rgb(118, 118, 118);"><path d="m23.25 24c-.19 0-.38-.07-.53-.22l-10.72-10.72-10.72 10.72c-.29.29-.77.29-1.06 0s-.29-.77 0-1.06l10.72-10.72-10.72-10.72c-.29-.29-.29-.77 0-1.06s.77-.29 1.06 0l10.72 10.72 10.72-10.72c.29-.29.77-.29 1.06 0s .29.77 0 1.06l-10.72 10.72 10.72 10.72c.29.29.29.77 0 1.06-.15.15-.34.22-.53.22" fill-rule="evenodd"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="mobile-filter-button d-sm-none">
                        <button @click="showFilterDialog = true" class="btn btn-sm btn-light"><i class="fas fa-filter"></i> Bộ lọc</button>
                    </div>
                </div>
                <div class="col-8">
                    <div class="box-sort d-flex justify-content-end">
                        <div class="dropdown">
                          <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="sortMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Sắp xếp theo: {{ sortCurrent }}
                          </button>
                          <div class="dropdown-menu" aria-labelledby="sortMenuButton">
                            <span v-for="(item, index) in sortList" :key="index" @click="changeSort(item)" class="dropdown-item">{{ item.text }}</span>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-list-result">
                <div class="row">
                <transition-group name="list">
                    <div v-for="(service, index) in services" :key="index" class="col-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <a :href="service.link">
                                        <img class="card-img-top" :src="service.thumb_path">
                                    </a>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="card-body">
                                        <a :href="service.link" :title="service.name">
                                            <h3 class="card-title">{{ trimText(service.name, 80)}}</h3>
                                            <p class="card-text">{{ trimText(service.description, 180) }}</p>
                                            <div class="card-bottom d-flex justify-content-between">
                                                <div class="rate d-flex justify-content-between align-items-center">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div v-if="service.price_with_currency" class="price">{{ service.price_with_currency | number }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </transition-group>
                </div>
            </div>
            <div v-if="loading" class="d-flex justify-content-center service-loading">
                <i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>
            </div>
            <div v-if="!loading && (filters.page < pagination.total_pages)" class="load-more">
                <div class="col-12 d-md-none">
                    <button @click="fetchMoreServices()" type="button" class="btn btn-outline-primary btn-block">{{ trans ? trans.places_view_more : 'Xem thêm' }}</button>
                </div>
                <div class="col-12 d-none d-md-block text-center">
                    <button @click="fetchMoreServices()" type="button" class="btn btn-outline-primary">{{ trans ? trans.places_view_more : 'Xem thêm' }}</button>
                </div>
            </div>
        </div>
        <div v-if="showFilterDialog" class="box-filters">
            <div class="box-filters__header pl-3 pr-3 d-flex justify-content-end">
                <span @click="showFilterDialog = false"><i class="fas fa-times fa-2x"></i></span>
            </div>
            <div class="pl-3 pr-3">
              <h6 class="text-center box-filters__title">{{ trans ? trans.places_service_type_filter : 'Loại dịch vụ' }}</h6>
              <ul class="list-group">
                <li v-for="(item, index) in serviceGroups" :key="index" @click="toggleServiceGroupFilter(item.id)" :class="'list-group-item ' + (filters.service_group.includes(item.id) ? 'active' : '')">
                  <span :class="{'brand-color': filters.service_group.includes(item.id)}">{{ item.name }}</span>
                  <span class="badge badge-light badge-pill float-right">{{ item.total }}</span>
                  <div v-if="filters.service_group.includes(item.id)" class="mb_box-service-type">
                    <div v-for="(type, index) in serviceTypes" class="custom-control custom-checkbox"  @click="toggleServiceTypeFilter(type.id)">
                      <input type="checkbox" class="custom-control-input" :id="'mbtype' + type.name" :value="type.id" v-model="filters.service_type">
                      <label class="custom-control-label" :for="'mbtype' + type.name">{{ type.name }}</label>
                    </div>
                  </div>
                </li>
              </ul>
              <h6 class="text-center box-filters__title">{{ trans ? trans.places_price_filter : 'Giá' }}</h6>
              <div class="card" style="width: 100%; padding: 5px 15px 5px 15px;">
                  <div v-for="(price, index) in pricePeriods" :key="index" class="custom-control custom-checkbox">
                      <input class="custom-control-input" type="checkbox" :id="'price' + price.value" v-model="filters.price" :value="price.value">
                      <label class="custom-control-label" :for="'price' + price.value">
                          {{ price.text }}
                      </label>
                  </div>
              </div>
              <div class="apply-wrap-btn d-flex justify-content-around">
                <button @click="clearFilters()" type="button" class="btn btn-sm btn-outline-secondary">{{ trans ? trans.places_filters_clear_all : 'Xóa tất cả' }}</button>
                <button @click="showFilterDialog = false" type="button" class="btn btn-sm btn-outline-primary">{{ trans ? trans.places_filters_apply : 'Xong' }}</button>
              </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import { forEach, findIndex, debounce } from 'lodash'
    import { swiper, swiperSlide } from 'vue-awesome-swiper'
    import 'swiper/dist/css/swiper.css'
    export default {
        name: 'PlaceInfo',
        components: {
            swiper,
            swiperSlide
        },
        props: {
            place_name: {
                type: String,
                default: ''
            },
            place_id: {
                type: Number,
                default: 0
            },
            resort_id: {
                type: Number,
                default: 0
            },
            language: {
                type: String,
                default: 'vi'
            }
        },
        computed: {
            ...mapGetters(['trans'])
        },
        data () {
            return {
                serviceGroups: [],
                serviceTypes: [],
                timePeriods: [
                    { value: 2, text: '1 đến 2 ngày' },
                    { value: 5, text: '3 đến 5 ngày' },
                    { value: 6, text: 'Hơn 5 ngày' }
                ],
                pricePeriods: [
                    { value: 1, text: 'Dưới 1 triệu' },
                    { value: 5, text: '1 đến 5 triệu' },
                    { value: 10, text: '5 đến 10 triệu' },
                    { value: 11, text: 'Trên 10 triệu' }
                ],
                services: [],
                pagination: {
                    total: 0,
                    count: 0,
                    per_page: 0,
                    current_page: 0,
                    total_pages: 0
                },
                filters: {
                    place_id: 0,
                    resort_id: 0,
                    q: '',
                    page: 0,
                    limit: 10,
                    locale: 'vi',
                    include: 'service_types',
                    price: [],
                    time: [],
                    service_group: [],
                    service_type: [],
                    sort: 'hot:-1'
                },
                timer: {},
                loading: false,
                swiperOption: {
                    slidesPerView: 5,
                    spaceBetween: 20,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev'
                    }
                },
                serviceTypeList: [],
                sortList: [
                    { value: 'price:1', text: 'Giá tăng dần' },
                    { value: 'price:-1', text: 'Giá giảm dần' },
                    { value: 'hot:-1', text: 'Hot nhất' }
                ],
                sortCurrent: 'Hot nhất',
                showFilterDialog: false
            }
        },
        mounted () {
            if (this.trans === null) {
                this.fetchTranslations()
            }
            this.filters.place_id = this.place_id
            this.filters.resort_id = this.resort_id
            this.filters.locale = this.language
            this.fetchServices()
            this.fetchServiceGroups()
            this.fetchServiceTypes()
        },
        methods: {
            ...mapActions(['fetchTranslations']),
            fetchServices: debounce( function () {
                this.filters.page = 1
                this.loading = true
                this.services = []
                axios.get('services', {params: this.filters}).then(response => {
                    this.loading = false
                    switch (response.code) {
                        case 200:
                            this.services = response.data
                            this.pagination = response.meta.pagination
                            break;
                        case 404:
                            break;
                        default:
                            break;
                    }
                })
            }, 500),
            fetchMoreServices () {
                this.filters.page++
                this.loading = true
                axios.get('services', {params: this.filters}).then(response => {
                    this.loading = false
                    switch (response.code) {
                        case 200:
                            forEach(response.data, item => {
                                this.services.push(item)
                            })
                            this.pagination = response.meta.pagination
                            break;
                        case 404:
                            break;
                        default:
                            break;
                    }
                })
            },
            fetchServiceGroups () {
                axios.get('service-groups', {params: {limit: -1, locale: this.language, place_id: this.place_id, resort_id: this.resort_id}}).then(response => {
                    switch (response.code) {
                        case 200:
                            this.serviceGroups = response.data;
                            break;
                        case 404:
                            break;
                        default:
                            break;
                    }
                })
            },
            fetchServiceTypes () {
                axios.get('service-types', {params: {limit: -1, locale: this.language, place_id: this.place_id, resort_id: this.resort_id}}).then(response => {
                    switch (response.code) {
                        case 200:
                            this.serviceTypeList = response.data
                            this.parseUrlParams()
                            break;
                        case 404:
                            break;
                        default:
                            break;
                    }
                })
            },
            toggleServiceGroupFilter (serviceGroupId) {
              this.filters.service_group = [serviceGroupId]
              // let index = this.filters.service_group.indexOf(serviceGroupId)
              // if (index === -1) {
              //     this.filters.service_group.push(serviceGroupId)
              // } else {
              //     this.filters.service_group.splice(index, 1)
              // }
            },
            toggleServiceTypeFilter (serviceTypeId) {
                let index = this.filters.service_type.indexOf(serviceTypeId)
                if (index === -1) {
                    this.filters.service_type.push(serviceTypeId)
                } else {
                    this.filters.service_type.splice(index, 1)
                }
            },
            updateUrlParams () {
                var params = ''
                if (this.filters.service_group.length) {
                    params = '?service_group=' + encodeURIComponent(this.filters.service_group)
                }
                if (this.filters.service_type.length) {
                    if (params !== '') {
                        params += '&service_type=' + encodeURIComponent(this.filters.service_type)
                    } else {
                        params = '?service_type=' + encodeURIComponent(this.filters.service_type)
                    }
                }
                if (this.filters.price.length) {
                    if (params !== '') {
                        params += '&price=' + encodeURIComponent(this.filters.price)
                    } else {
                        params = '?price=' + encodeURIComponent(this.filters.price)
                    }
                }
                if (this.filters.q.length) {
                    if (params !== '') {
                        params += '&q=' + encodeURIComponent(this.filters.price)
                    } else {
                        params = '?q=' + encodeURIComponent(this.filters.price)
                    }
                }
                if (this.filters.sort.length) {
                    if (params !== '') {
                        params += '&sort=' + encodeURIComponent(this.filters.sort)
                    } else {
                        params = '?sort=' + encodeURIComponent(this.filters.sort)
                    }
                }
                history.pushState(null, null, location.origin + location.pathname + params)
            },
            parseUrlParams () {
                var queryParameters = {}, queryString = location.search.substring(1),
                    re = /([^&=]+)=([^&]*)/g, m;
                while (m = re.exec(queryString)) {
                    queryParameters[decodeURIComponent(m[1])] = decodeURIComponent(m[2]);
                }
                if (queryParameters.hasOwnProperty('service_group')) {
                    forEach(queryParameters['service_group'].split(','), number => {
                        this.filters.service_group.push(parseInt(number))
                    })
                }
                if (queryParameters.hasOwnProperty('service_type')) {
                    forEach(queryParameters['service_type'].split(','), number => {
                        this.filters.service_type.push(parseInt(number))
                    })
                }
                if (queryParameters.hasOwnProperty('price')) {
                    forEach(queryParameters['price'].split(','), number => {
                        this.filters.price.push(parseInt(number))
                    })
                }
                if (queryParameters.hasOwnProperty('q')) {
                    this.filters.q = queryParameters['q']
                }
            },
            changeSort (sortObject) {
                this.filters.sort = sortObject.value
                this.sortCurrent = sortObject.text
            },
            clearFilters () {
              this.filters.service_group = []
              this.filters.service_type = []
              this.filters.price = []
            }
        },
        watch: {
            'filters.q': function () {
              this.searching = true
              this.pagination.current_page = 1
              clearTimeout(this.timer)
              let _this = this
              this.timer = setTimeout(function () {
                _this.searching = false
                _this.fetchServices()
              }, 900)
            },
            'filters.service_group': function () {
                this.serviceTypes = []
                forEach(this.serviceTypeList, type => {
                  if (this.filters.service_group.includes(type.service_group_id)) {
                      if (findIndex(this.serviceTypes, ['id', type.id]) === -1) {
                        this.serviceTypes.push(type)
                      }
                  } else {
                    if (this.filters.service_type.indexOf(type.id) !== -1) {
                        this.filters.service_type.splice(this.filters.service_type.indexOf(type.id))
                    }
                  }
                })
                this.fetchServices()
                this.updateUrlParams()
            },
            'filters.service_type': debounce(function () {
                this.fetchServices()
                this.updateUrlParams()
            }, 800),
            'filters.price': debounce(function () {
                this.fetchServices()
                this.updateUrlParams()
            }, 800),
            'filters.sort': debounce(function () {
                this.fetchServices()
                this.updateUrlParams()
            }, 800)
        }
    }
</script>

<style type="scoped">
    .rate {
      width: 80px;

    }
    #input-search::placeholder {
        font-size: 12px;
    }
    .list-group-item.active {
      color: black;
      background-color: #f8f9fa;
      border-color: #ddd;
    }
    .brand-color {
      color: #02a676;
    }
    .box-filters {
        padding-top: 55px;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: #fff;
        z-index: 2;
        overflow: auto;
    }
    .box-filters__header {
        padding: 10px 0px 10px 0px;
        color: #9e9e9e;
    }
    .box-filters__title {
        text-transform: uppercase;
        margin-top: 10px;
    }
    .selected-btn {
      color: #212529;
      background-color: #dae0e5;
      border-color: #d3d9df;
    }
    .apply-wrap-btn {
      margin-top: 20px;
      margin-bottom: 20px;
    }
    .list-enter-active, .list-leave-active {
      transition: all 1s;
    }
    .list-enter, .list-leave-to {
      opacity: 0;
      transform: translateX(30px);
    }
    .card-body a:hover {
        text-decoration: none;
    }
    .load-more {
        padding-bottom: 40px;
    }
    .service-loading {
        padding-top: 20px;
        padding-bottom: 20px;
        color: #02a676;
    }
    .service-group-box {
        cursor: pointer;
        width: 100%;
        height: 140px;
        background-color: #00000073;
        background-position: center;
        background-size: cover;
        background-blend-mode: darken;
        border-radius: 3px;
    }
    .service-group-box-disabled {
        background-blend-mode: soft-light;
        background-color: #ddd;
    }
    .service-group-box .caption {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 5px;
        color: #fff;
    }
    .caption .total-number {
        margin-bottom: 0px;
        font-weight: bold;
    }
    .service-group-box .caption h6 {
        font-weight: bold;
    }
    .swiper-button-disabled {
        display: none;
    }
    .swiper-button-next {
        background-image: none;
        color: #fff;
        height: 28px;
        top: 52%;
        right: -2px;
    }
    .swiper-button-prev {
        background-image: none;
        color: #fff;
        height: 28px;
        top: 52%;
        left: 2px;
    }
    .caption .close-button {
        position: absolute;
        top: 2px;
        right: 5px;
    }
    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
        background-color: #02a676;
    }
    .custom-control-input:checked~.custom-control-label::before {
        background-color: #02a676;
    }
    .has-search-key {
        border-right: 0px;
    }
    .box-search {
        margin-bottom: 20px;
    }
    .box-sort .dropdown {
        background: #fff;
        color: #54575a;
    }
    .box-sort .dropdown .dropdown-toggle {
        background: #fff;
        color: #54575a;
    }
    .box-sort .dropdown button {
        width: 220px;
        background: #fff;
        color: #54575a;
    }
    .box-sort .dropdown button:focus,
    .box-sort .dropdown button:active {
        outline: none;
    }
    .box-sort .dropdown .dropdown-menu {
        cursor: pointer;
    }
    @media only screen and (min-width: 768px) {
      #input-search::placeholder {
          font-size: 16px;
      }
    }
</style>
