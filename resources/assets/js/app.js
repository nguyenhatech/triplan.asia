
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import indexStore from './store/index'
import VCalendar from 'v-calendar';
import 'v-calendar/lib/v-calendar.min.css';

window.Vue = require('vue');

Vue.use(VCalendar, {
  firstDayOfWeek: 2
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Trang chi tiết dịch vụ
Vue.component('list-service-package', require('./components/service-detail/ListServicePackage.vue'));
Vue.component('oder-box', require('./components/service-detail/OderBox.vue'));

// Trang Booking bước 1
Vue.component('booking-step1', require('./components/booking/Step1.vue'));


const app = new Vue({
    el: '#td-outer-wrap',
    store: indexStore
});
