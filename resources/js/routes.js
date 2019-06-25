import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '@/js/components/Home';
import Auth from '@/js/components/Auth';
import Search from '@/js/components/Search';
import Hotel from '@/js/components/Hotel';
import Room from '@/js/components/Room';
import Booking from '@/js/components/Booking';
import Register from '@/js/components/Register';

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
            name: 'auth',
            component: Auth
        },
        {
            path: '/register',
            name: 'register',
            component: Register            
        },
        {
            path: '/room/search',
            name: 'search',
            component: Search
        },
        {
            path: '/hotel/:hotelId',
            name: 'hotel',
            component: Hotel
        },
        {
            path: '/room/:roomId',
            name: 'room',
            component: Room
        },
        {
            path: '/room/:roomId/booking',
            name: 'booking',
            component: Booking,
            meta: { requiresAuth: true }
        }
    ]
});

router.beforeEach((to, from, next) => {
    if(to.meta.requiresAuth){
        const user = JSON.parse(window.localStorage.getItem('user'));
        console.log(user);
        if(user && user.access_token){
            next();
        }else{
            next({name: 'auth', query: {roomId: to.params.roomId}});
        }
    }

    next();
});

export default router;