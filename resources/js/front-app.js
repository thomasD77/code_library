// Frontend JS
import TestimonialComponent from "./components/TestimonialComponent";

require('../../resources/assets/frontend_assets/js/jquery.min');
require('../../resources/assets/frontend_assets/js/bootstrap.bundle.min');
require('../../resources/assets/frontend_assets/js/all');

// Frontend Reviews JS
require('../../resources/assets/frontend_assets/js/reviews/js/jquery-2.2.4.min');
require('../../resources/assets/frontend_assets/js/reviews/js/bootstrap.min');

// Disqus
require('../../resources/assets/frontend_assets/blog/js/disqus/disqus');

// AOS
window.AOS = require('AOS');
AOS.init();





window.Vue = require('vue').default;

import VueAxios from 'vue-axios';
window.axios = require('axios');

Vue.component('testimonial-component', require('./components/TestimonialComponent').default);
Vue.component('newsletter-component', require('./components/NewsletterComponent').default);
Vue.component('modal-testimonial-component', require('./components/ModalTestimonialComponent').default);


Vue.use(VueAxios, axios);


const app = new Vue({
    el: '#app',
});

