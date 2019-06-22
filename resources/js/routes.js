import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/components/Home';
import Auth from '@/js/components/Auth';

Vue.use(VueRouter);
//meta: { requiresAuth: true }

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

router.beforeEach((to, from, next) => {
    if(to.meta.requiresAuth){
        const user = JSON.parse(window.localStorage.getItem('user'));
        if(user && user.access_token){
            next();
        }else{
            next({name: 'home'})
        }
    }

    next();
});

export default router;