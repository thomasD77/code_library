/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import VueAxios from 'vue-axios';
window.axios = require('axios');

Vue.component('testimonial-component', require('./components/TestimonialComponent').default);


Vue.use(VueAxios);
Vue.use(axios)

const app = new Vue({
    components: TestimonialComponent,
    el: '#app',
});
