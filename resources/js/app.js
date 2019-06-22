/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

// require('./bootstrap');

import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import '@/sass/app.scss';

//Route information for Vue Router
import Routes from '@/js/routes.js';

//components file
import App from '@/js/views/App';

Vue.use(BootstrapVue);

const app = new Vue({
    el: '#app',
    router: Routes,
    render: s => s(App)
});

export default app;
