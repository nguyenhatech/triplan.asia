<template>
    <div class="row">
        <div class="col-12">
            <h5>Bạn dự định đi cùng ai?</h5>
        </div>

        <div class="col-12">
            <div v-for="(type, index) in typeList" :key="index" class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="exampleRadios" :id="'typeRadio' + index" value="option1" checked>
              <label class="form-check-label" for="typeRadio">{{ type.text }}</label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'ResortBooking',
        data () {
            return {
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
                    { value: 1, text: 'Một mình' },
                    { value: 1, text: 'Cặp đôi' },
                    { value: 1, text: 'Gia đình' },
                    { value: 1, text: 'Nhóm bạn' },
                    { value: 1, text: 'Hội họp' }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
