/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./contact');
require('./swiper');

window.Vue = require('vue');

import VueAwesomeSwiper from 'vue-awesome-swiper'
Vue.use(VueAwesomeSwiper);
Vue.use(require('vue-moment'));

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('like-component', require('./components/LikeComponent.vue').default);
Vue.component('dislike-component', require('./components/DislikeComponent.vue').default);
Vue.component('swiper-component', require('./components/SwiperComponent.vue').default);
Vue.component('firstcareitem-component', require('./components/FirstcareitemComponent.vue').default);
Vue.component('secondcareitem-component', require('./components/SecondcareitemComponent.vue').default);
Vue.component('thirdcareitem-component', require('./components/ThirdcareitemComponent.vue').default);
Vue.component('forthcareitem-component', require('./components/ForthcareitemComponent.vue').default);
Vue.component('calendar-component', require('./components/CalendarComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
