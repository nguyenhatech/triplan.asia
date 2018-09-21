
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue');

import indexStore from './store/index'

import * as filters from './filters'
import * as mixins from './mixins'

// custom filters
Object.keys(filters).forEach(key => {
  Vue.filter(key, filters[key])
})

Object.keys(mixins).forEach(key => {
  Vue.mixin(mixins[key])
})

import messages from 'vee-validate/dist/locale/vi';
import VeeValidate from 'vee-validate';
import Notifications from 'vue-notification'

Vue.use(VeeValidate, {
    locale: 'vi',
    dictionary: {
        vi: { messages: messages.messages }
    }
});

Vue.use(Notifications)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Trang chi tiết dịch vụ
Vue.component('list-service-package', require('./components/service-detail/ListServicePackage.vue'));
Vue.component('oder-box', require('./components/service-detail/OderBox.vue'));

// Trang Booking
Vue.component('booking-step1', require('./components/booking/Step1.vue'));
Vue.component('thank-you', require('./components/booking/Thankyou.vue'));
Vue.component('place-info', require('./components/place/PlaceInfo.vue'));


const app = new Vue({
    el: '#td-outer-wrap',
    store: indexStore
});
