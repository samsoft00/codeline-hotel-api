/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

import Vue from 'vue';
import bootstrap from 'bootstrap';
import VueRavePayment from 'vue-ravepayment';
global.$ = global.jQuery = require('jquery');

//import theme
import '@/theme/plugins/scrollmagic/ScrollMagic.min.js';
import '@/theme/plugins/jquery-datepicker/jquery-ui.js';
import '@/theme/plugins/colorbox/jquery.colorbox-min.js';
import ValidationError from '@/js/components/ValidationErrors';
import '@/theme/js/custom.js';

import Toastr from 'vue-toastr';
import '@/sass/app.scss';

//Route information for Vue Router
import Routes from '@/js/routes.js';

//components file
import App from '@/js/views/App';

Vue.use(Toastr, { /* options */ });
Vue.component("ValidationErrors", ValidationError);
Vue.component("Rave", VueRavePayment);

const app = new Vue({
    el: '#app',
    router: Routes,
    render: s => s(App)   
});

export default app;
