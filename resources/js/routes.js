import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/components/Home';
import Auth from '@/js/components/Auth';

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/auth',
            name: 'Authenticate',
            component: Auth
        }        
    ]
});

export default router;