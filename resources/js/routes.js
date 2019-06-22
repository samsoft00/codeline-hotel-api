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

router.beforeEach((to, from, next) => {
    if(to.meta.requiresAuth){
        const authUser = JSON.parse(window.localStorage.getItem('authUser'));
        if(authUser && authUser.access_token){
            next();
        }else{
            next({name: 'home'})
        }
    }

    next();
});

export default router;