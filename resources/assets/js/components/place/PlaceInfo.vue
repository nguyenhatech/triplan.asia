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
            <div class="box-list-result">
                <div class="row">
                    <div v-for="(service, index) in services" :key="index" class="col-12 animated animatedFadeInUp fadeInUp">
                        <div class="card">
                            <div class="row">
                                <div class="col-12 col-md-5">
                                    <a :href="service.link">
                                        <img class="card-img-top" :src="service.thumb_path">
                                    </a>
                                </div>
                                <div class="col-12 col-md-7">
                                    <div class="card-body">
                                        <a :href="service.link">
                                            <h3 class="card-title">{{ service.name }}</h3>
                                            <p class="card-text">{{ trimText(service.description, 200) }}</p>
                                            <div class="card-bottom d-flex justify-content-between">
                                                <div class="rate">
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
                    q: '',
                    page: 0,
                    limit: 10,
                    locale: 'vi',
                    include: 'service_types',
                    price: [],
                    time: [],
                    service_group: [],
                    service_type: []
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
                serviceTypeList: []
            }
        },
        mounted () {
            if (this.trans === null) {
                this.fetchTranslations()
            }
            this.filters.place_id = this.place_id
            this.filters.locale = this.language
            this.fetchServices()
            this.fetchServiceGroups()
            this.fetchServiceTypes()
        },
        methods: {
            ...mapActions(['fetchTranslations']),
            fetchServices () {
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
            },
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
                axios.get('service-groups', {params: {limit: -1, locale: this.language, place_id: this.place_id}}).then(response => {
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
                axios.get('service-types', {params: {limit: -1, locale: this.language, place_id: this.place_id}}).then(response => {
                    switch (response.code) {
                        case 200:
                            this.serviceTypeList = response.data;
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
                let index = this.filters.service_group.indexOf(serviceGroupId)
                if (index === -1) {
                    this.filters.service_group.push(serviceGroupId)
                } else {
                    this.filters.service_group.splice(index, 1)
                }
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
            'filters.service_group': debounce(function () {
                this.serviceTypes = []
                forEach(this.serviceTypeList, type => {
                  if (this.filters.service_group.includes(type.service_group_id)) {
                      this.serviceTypes.push(type)
                  } else {
                    if (this.filters.service_type.indexOf(type.id) !== -1) {
                        this.filters.service_type.splice(this.filters.service_type.indexOf(type.id), 1)
                    }
                  }
                })
            }, 500),
            'filters.service_type': debounce(function () {
                this.fetchServices()
                this.updateUrlParams()
            }, 800),
            'filters.price': debounce(function () {
                this.fetchServices()
                this.updateUrlParams()
            }, 800)
        }
    }
</script>

<style type="scoped">
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
    @keyframes fadeInUp {
        from {
            transform: translate3d(0,40px,0)
        }

        to {
            transform: translate3d(0,0,0);
            opacity: 1
        }
    }
    @-webkit-keyframes fadeInUp {
        from {
            transform: translate3d(0,40px,0)
        }

        to {
            transform: translate3d(0,0,0);
            opacity: 1
        }
    }

    .animated {
        animation-duration: 1s;
        animation-fill-mode: both;
        -webkit-animation-duration: 1s;
        -webkit-animation-fill-mode: both
    }
    .animatedFadeInUp {
        opacity: 0
    }
    .fadeInUp {
        opacity: 0;
        animation-name: fadeInUp;
        -webkit-animation-name: fadeInUp;
    }
</style>
