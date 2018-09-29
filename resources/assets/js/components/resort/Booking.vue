<template>
    <div class="row">
        <div v-if="stepCurrent === 1" class="progress-box">
            <div class="col-12">
                <h5>Bạn dự định đi cùng ai?</h5>
            </div>
            <div class="row text-center d-flex justify-content-center mr-1 ml-1">
                <div v-for="(item, index) in typeList" :key="index" class="col-12 col-sm-4 pl-1 pr-1">
                    <div @click="changeType(item.value)" class="card" style="margin-bottom: 10px; height: 110px;">
                      <div class="card-body" :style="{backgroundImage: 'url(' + app_url + item.image + ')'}">
                        <h5 class="card-title">{{ item.text }}</h5>
                        <p v-if="type === item.value" class="card-text text-center"><i class="fas fa-check"></i></p>
                      </div>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="stepCurrent === 2" class="progress-box">
            <div class="col-12">
                <h5>Bạn thích ở căn hộ nào?</h5>
            </div>
            <div class="row">
                <div v-for="(item, index) in accommodationList" :key="index" class="col-12">
                    <div @click="selectAccommodation(item.id)" class="card" style="margin-bottom: 10px; height: 150px;">
                      <div class="card-body" :style="{backgroundImage: 'url(' + item.image_path + ')'}">
                        <h5 class="card-title">{{ item.name }}</h5>
                        <p v-if="accommodationSelected === item.id" class="card-text text-center"><i class="fas fa-check"></i></p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="stepCurrent === 3" class="progress-box">
            <div class="col-12">
                <h5>Trải nghiệm ẩm thực</h5>
            </div>
            <div class="row pl-1 pr-1">
                <div v-for="(item, index) in restaurantList" :key="index" class="col-12 col-sm-6 pl-1 pr-1">
                    <div @click="selectRestaurant(item.id)" class="card" style="margin-bottom: 10px; height: 150px;">
                      <div class="card-body" :style="{backgroundImage: 'url(' + item.image_path + ')'}">
                        <h5 class="card-title">{{ item.name }}</h5>
                        <p v-if="restaurantSelected.includes(item.id)" class="card-text text-center"><i class="fas fa-check"></i></p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="stepCurrent === 4" class="progress-box">
            <div class="col-12">
                <h5>Show diễn, tham quan thú vị</h5>
            </div>
            <div class="row pl-1 pr-1">
                <div v-for="(item, index) in attractionList" :key="index" class="col-12 col-sm-6 pl-1 pr-1">
                    <div @click="selectAttaction(item.id)" class="card" style="margin-bottom: 10px; height: 150px;">
                      <div class="card-body" :style="{backgroundImage: 'url(' + item.image_path + ')'}">
                        <h5 class="card-title">{{ item.name }}</h5>
                        <p v-if="attractionSelected.includes(item.id)" class="card-text text-center"><i class="fas fa-check"></i></p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="stepCurrent === 5" class="progress-box">
            <div class="col-12">
                <h5>Còn rất nhiều hoạt động thú vị nữa</h5>
            </div>
            <div class="row pl-1 pr-1">
                <div v-for="(item, index) in activityList" :key="index" class="col-12 col-sm-6 pl-1 pr-1">
                    <div @click="selectActivity(item.id)" class="card" style="margin-bottom: 10px; height: 150px;">
                      <div class="card-body" :style="{backgroundImage: 'url(' + item.image_path + ')'}">
                        <h5 class="card-title">{{ item.name }}</h5>
                        <p v-if="activitySelected.includes(item.id)" class="card-text text-center"><i class="fas fa-check"></i></p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-if="stepCurrent === 6" class="progress-box">
            <div class="col-12">
                <h5>Danh sách dịch vụ bạn đã chọn</h5>
            </div>
            <div class="col-12">
                <p v-if="accommodationSelected"><i class="fas fa-home"></i> {{ accommodationSelectedName }}</p>
                <div v-if="restaurantList.length">
                    <p class="service-group"><i class="fas fa-utensils"></i> Nhà hàng</p>
                    <ul>
                        <li class="service-element" v-for="(item, index) in restaurantList" v-if="restaurantSelected.includes(item.id)" :key="index">{{ item.name }}</li>
                    </ul>
                </div>

                <div v-if="attractionList.length">
                    <p class="service-group"><i class="fas fa-ticket-alt"></i> Vé tham quan, show diễn</p>
                    <ul>
                        <li class="service-element" v-for="(item, index) in attractionList" v-if="attractionSelected.includes(item.id)" :key="index">{{ item.name }}</li>
                    </ul>
                </div>

                <div v-if="activityList.length">
                    <p class="service-group"><i class="far fa-futbol"></i></i> Hoạt động</p>
                    <ul>
                        <li class="service-element" v-for="(item, index) in activityList" v-if="activitySelected.includes(item.id)" :key="index">{{ item.name }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div v-if="stepCurrent === 7" class="progress-box">
            <div class="col-12">
                <h5>Nhập thông tin liên hệ</h5>
            </div>
            <div class="col-12">
                <form>
                    <div class="form-group">
                        <label for="customerName">Họ tên</label>
                        <input type="text" class="form-control" id="customerName" aria-describedby="emailHelp" placeholder="Nhập họ tên của quý khách">
                    </div>
                    <div class="form-group">
                        <label for="customerEmail">Email</label>
                        <input type="email" class="form-control" id="customerEmail" aria-describedby="emailHelp" placeholder="Địa chỉ email">
                    </div>
                    <div class="form-group">
                        <label for="customerPhone">Số điện thoại</label>
                        <input type="text" class="form-control" id="customerPhone" placeholder="Số điện thoại">
                    </div>
                    <div class="form-group">
                        <label for="schedualeDate">Ngày đi</label>
                        <datepicker
                            ref="programaticOpen"
                            :inline="false"
                            placeholder="Chọn ngày"
                            format="yyyy-MM-dd"
                            v-model="formSubmit.date">
                        </datepicker>
                    </div>
                    <div class="form-group">
                        <label for="duration">Quý khách muốn đi mấy ngày?</label>
                        <input type="number" class="form-control" id="duration" placeholder="Số ngày đi">
                    </div>
                </form>
            </div>
        </div>
        <div v-if="stepCurrent === 8" class="progress-box">
            <div class="col-12">
                <h5 class="text-center">Booking thành công!</h5>
                <p class="text-center text-success"><i class="far fa-check-circle fa-2x"></i></p>
                <p>Bộ phận chăm sóc khách hàng sẽ liên hệ với quý khách trong thời gian sớm nhất để xác nhận lịch trình.</p>
            </div>
        </div>
        <div v-if="stepCurrent === 7" class="col-12 text-center">
            <button type="button" class="btn btn-primary btn-sm" @click="previousStep()">Quay lại</button>
            <button type="button" class="btn btn-success btn-sm" @click="submitBooking()"><i class="far fa-thumbs-up"></i> Xong</button>
        </div>
        <div v-if="stepCurrent < 7" class="col-12 text-center">
            <button type="button" class="btn btn-primary btn-sm" @click="previousStep()">Quay lại</button>
            <button type="button" class="btn btn-primary btn-sm" @click="nextStep()">Tiếp tục</button>
        </div>
    </div>
</template>

<script>
    import { findIndex } from 'lodash'
    import Datepicker from 'vuejs-datepicker'
    import {vi} from 'vuejs-datepicker/dist/locale'
    export default {
        name: 'ResortBooking',
        components: {
            Datepicker
        },
        props: {
            language: {
                type: String,
                default: 'vi'
            },
            app_url: {
                type: String,
                default: ''
            }
        },
        data () {
            return {
                stepCurrent: 1,
                type: 1,
                combo: {
                    accommodation_intro: 'Nhà nghỉ',
                    accommodation_list: [1, 2, 3],
                    restaurant_intro: 'Khách sạn',
                    restaurant_list: [1, 2, 3],
                    attraction_intro: 'Trải nghiệm',
                    attraction_list: [1, 2, 3],
                    activity_intro: 'Hoạt động',
                    activity_list: [1, 2, 3],
                    transport_intro: 'Di chuyển',
                    transport_list: [1, 2, 3],
                    tour_intro: 'Tour',
                    tour_list: [1, 2, 3]
                },
                typeList: [
                    { value: 1, text: 'Một mình', image: '/web/images/resorts/solo-travel.jpg' },
                    { value: 2, text: 'Cặp đôi', image: '/web/images/resorts/couple-travel.jpg' },
                    { value: 3, text: 'Gia đình', image: '/web/images/resorts/family-travel.jpg' },
                    { value: 4, text: 'Nhóm bạn', image: '/web/images/resorts/friends-travel.jpg' },
                    { value: 5, text: 'Hội họp', image: '/web/images/resorts/meeting-travel.jpg' }
                ],
                accommodationList: [
                    {
                        id: 1,
                        name: 'Hilltop Deluxe Villa - Trải Nghiệm Khác Biệt Từ Gỗ Và Đá',
                        description: 'Trên đỉnh đồi Thiền tĩnh tại, giữa rừng thông xanh khoáng đạt và tràn ngập gió tự nhiên, Hilltop Deluxe Villa là sự khúc biến tấu tự nhiên của gỗ và đá. Những ngôi nhà gỗ cọ độc đáo hiện diện tự nhiên, hòa hợp với ngoại cảnh như thể đã gắn bó ở nơi này rất lâu. Với những đường nét thiết kế đơn giản nhưng sang trọng, cuốn hút, kết hợp với hiệu ứng ánh sáng nghệ thuật, Hilltop Deluxe Villa mang lại cảm giác thư thái, những khoảnh khắc tĩnh lặng và riêng tư tuyệt đối cho chủ nhân.',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_b607fd7267c86afc1254915b01e763b5.jpg'
                    },
                    {
                        id: 2,
                        name: 'Flamingo Đại Lải Resort - Phòng Hội Thảo Lớn Opera Hall',
                        description: 'Trung tâm Hội nghị Flamingo được thiết kế ẩn mình sau đồi cỏ land-art và tường đá chạy dài. Đây là công trình được tạo nên bởi những vật liệu thân thiện với môi trường là tre và đá, thể hiện bằng những đường nét nhẹ nhàng, mềm mại giữa không gian mở, giao hòa với cảnh quan và thiên nhiên xung quanh. Trung tâm Hội nghị Opera Hall được thiết kế sang trọng, trang nhã, gồm đầy đủ hệ thống thiết bị nghe nhìn, ánh sáng, sân khấu… hiện đại, đáp ứng đầy đủ yêu cầu của các cuộc hội nghị, hội thảo lớn với sức chứa lên đến 250 khách.',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_f2dcb73a74c7c9ffa9dfdac712679f48.jpg'
                    },
                    {
                        id: 3,
                        name: 'Flamingo Villa - Tận Hưởng Không Gian Thiên Nhiên Chan Hòa',
                        description: 'Sở hữu không gian nghỉ dưỡng hoàn toàn riêng tư mà vẫn hết sức tiện nghi với thiết kế hiện đại, bể bơi thông minh ngoài trời, không gian sân vườn thoáng rộng, tràn ngập sắc xanh hoa cỏ, hệ thống biệt thự Flamingo Villa đáp ứng đa dạng nhu cầu nghỉ dưỡng của du khách.',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia-8ee30514f66758a0354702e850045525.jpg'
                    }
                ],
                restaurantList: [
                    {
                        id: 1,
                        name: 'Buffet Trước Tonkin Show',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_20a7acfea05425e7b3d9cbb1a66b8092.jpg'
                    },
                    {
                        id: 2,
                        name: 'Forest Bar Restaurant - Phong Vị Phương Tây Tuyệt Hảo Với Thực Đơn À La Carte',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_424da6dfb523073dadb3d0a1cecd3439.jpg'
                    },
                    {
                        id: 3,
                        name: 'Set Đồ Ăn Âu, Á',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_d6c04df5cf2f75a3613db5f473ed5c51.jpg'
                    },
                    {
                        id: 4,
                        name: 'Mai Chau Hideaway - Lớp Học Nấu Ăn',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_fc6bc35d26fdbcc5642052ff5d1b8a84.png'
                    }
                ],
                attractionList: [
                    {
                        id: 1,
                        name: 'Show Biểu Diễn Cá Heo',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_5b5f066c3010135e7d9673a8d1162b5a.jpg'
                    },
                    {
                        id: 2,
                        name: 'Buổi Biểu Diễn Tinh Hoa Bắc Bộ',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_7a0a7c1cd45380be1073b7efde6e6695.jpeg'
                    }
                ],
                activityList: [
                    {
                        id: 1,
                        name: 'Chèo Mảng Tre Trên Lòng Hồ',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_f715daecc43fee1010e80f98d57181b6.jpg'
                    },
                    {
                        id: 2,
                        name: 'Thăm Rừng Nguyên Sinh Ba Khan',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_9fb14e01b9a994c193e568c65a0011b5.jpg'
                    },
                    {
                        id: 3,
                        name: 'FITS Bar & Nightclub - Tận Hưởng Nhịp Sống Thượng Lưu',
                        image_path: 'https://s3-ap-southeast-1.amazonaws.com/cdn.triplan.asia/small/triplan.asia_c1b87a80e76855bc7f17dca14dbcee20.jpg'
                    }
                ],
                accommodationSelected: 0,
                restaurantSelected: [],
                attractionSelected: [],
                activitySelected: [],
                formSubmit: {
                    name: '',
                    email: '',
                    phone: '',
                    date: ''
                }
            }
        },
        computed: {
            accommodationSelectedName () {
                if (!this.accommodationSelected) {
                    return ''
                } else {
                    return this.accommodationList[findIndex(this.accommodationList, ['id', this.accommodationSelected])].name
                }
            }
        },
        methods: {
            previousStep () {
                if (this.stepCurrent > 1) {
                    this.stepCurrent--
                }
            },
            nextStep () {
                if (this.stepCurrent < 8) {
                    this.stepCurrent++
                }
            },
            changeType (value) {
                this.type = value
            },
            submitBooking () {
                this.stepCurrent = 8
                console.log('submitBooking')
            },
            selectAccommodation (id) {
                if (this.accommodationSelected !== id) {
                    this.accommodationSelected = id
                } else {
                    this.accommodationSelected = 0
                }
            },
            selectRestaurant (id) {
                let index = this.restaurantSelected.indexOf(id)
                if (index === -1) {
                    this.restaurantSelected.push(id)
                } else {
                    this.restaurantSelected.splice(index, 1)
                }
            },
            selectAttaction (id) {
                let index = this.attractionSelected.indexOf(id)
                if (index === -1) {
                    this.attractionSelected.push(id)
                } else {
                    this.attractionSelected.splice(index, 1)
                }
            },
            selectActivity (id) {
                let index = this.activitySelected.indexOf(id)
                if (index === -1) {
                    this.activitySelected.push(id)
                } else {
                    this.activitySelected.splice(index, 1)
                }
            }
        }
    }
</script>
<style>
    .vdp-datepicker input {
        display: block;
        width: 100% !important;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        padding: .375rem .75rem;
    }
</style>
<style scoped>
    .progress-box {
        width: 100%;
    }
    .form-check {
        padding-top: 10px;
        padding-bottom: 10px;
    }
    .card-body {
        color: #fff;
        cursor: pointer;
        background-color: #00000073;
        background-position: center;
        background-size: cover;
        background-blend-mode: darken;
    }
    .card-body-disabled {
        background-blend-mode: soft-light;
        background-color: #ddd;
    }
    .card-title {
        font-weight: bold;
        font-size: 18px;
    }
    .service-group {
        font-weight: bold;
    }
    .service-element {
        font-size: 15px;
    }
    @media only screen and (min-width: 768px) {
        .card-title {
            font-size: 16px;
        }
    }
</style>
