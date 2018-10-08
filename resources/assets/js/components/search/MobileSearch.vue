<template>
    <div class="row">
        <div class="input-group">
          <input type="text" id="searchInput" class="form-control" v-model="search" :placeholder="trans ? trans.search_place_holder : 'Nhập từ khóa để tìm kiếm...'">
          <div class="input-group-append">
            <span class="input-group-text" id="basic-addon2"><i v-if="loading" class="fas fa-spinner fa-spin"></i></span>
          </div>
        </div>

        <div v-if="search" class="search-result-box">
            <ul>
                <li v-if="places.length" class="place-header">{{ trans ? trans.place : 'Địa điểm' }}</li>
                <li class="place-item" v-for="(place, index) in places" :key="place.id">
                    <a :href="place.link">
                        <p><i class="fas fa-map-marker-alt"></i> {{ place.name }}</p>
                    </a>
                </li>

                <li v-if="services.length" class="service-header">{{ trans ? trans.service : 'Dịch vụ' }}</li>
                <li class="service-item" v-for="(service, indexService) in services" :key="service.id">
                    <a :href="service.link">
                        <div class="row">
                            <div class="col-3">
                                <div class="service-item__image" :style="{ backgroundImage: 'url(' + service.tiny_path + ')' }"></div>
                            </div>
                            <div class="col-9 d-flex align-items-center pl-0">
                                <p>{{ trimText(service.name, 62) }}</p>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapGetters } from 'vuex'
    import { debounce } from 'lodash'
    export default {
        name: 'MobileSearch',
        data () {
            return {
                search: '',
                places: [],
                services: [],
                loading: false
            }
        },
        mounted () {
            if (this.trans === null) {
                this.fetchTranslations()
            }
        },
        computed: {
            ...mapGetters(['trans'])
        },
        methods: {
            ...mapActions(['fetchTranslations']),
            fetchServices: debounce(function () {
                this.loading = true
                axios.get('services', {params: {q: this.search, limit: 5}}).then(response => {
                    this.loading = false
                    switch (response.code) {
                        case 200:
                            this.services = response.data
                            break;
                        case 404:
                            break;
                        default:
                            break;
                    }
                })
            }, 1000),
            fetchPlaces: debounce(function () {
                this.loading = true
                axios.get('places', {params: {q: this.search, limit: 2}}).then(response => {
                    this.loading = false
                    switch (response.code) {
                        case 200:
                            this.places = response.data
                            break;
                        case 404:
                            break;
                        default:
                            break;
                    }
                })
            }, 1000)
        },
        watch: {
            search (value) {
                if (value === '') {
                    this.places = []
                    this.services = []
                } else {
                    this.fetchPlaces()
                    this.fetchServices()
                }
            }
        }
    }
</script>

<style scoped>
    .search-result-box {
        padding-top: 20px;
        padding-bottom: 20px;
        font-size: 14px;
        width: 100%;
    }
    .search-result-box ul {
        list-style: none;
        padding-left: 0px;
    }
    .search-result-box ul li {
        margin-bottom: 10px;
    }
    .search-result-box p {
        margin-bottom: 0px;
    }
    .search-result-box a {
        color: #fff;
    }
    .search-result-box img {
        width: 100%;
        height: 45px;
        border-radius: 3px;
        object-fit: cover;
        object-position: center center;
    }
    .service-item__image {
        width: 100%;
        height: 45px;
        border-radius: 3px;
        background-color: #019066;
        background-size: cover;
        background-position: center center;
    }
    .service-item p {
        font-size: 12px;
    }
    .place-header {
        font-size: 12px;
        font-weight: 400;
        color: #ddddddb3;
    }
    .service-header {
        font-size: 12px;
        font-weight: 400;
        color: #ddddddb3;
    }
    #basic-addon2 {
        background: #019066;
        border: #019066;
    }
</style>
