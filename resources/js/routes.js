import Vue from 'vue';
import VueRouter from 'vue-router';

import Read from './components/Read'
import Test from './components/Test'
import Create from './components/Create'
import Update from './components/Update'

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'read',
            component: Read
        },
        {
            path: '/create',
            name: 'create',
            component: Create
        },
        {
            path: '/detail/:id',
            name: 'update',
            component: Update
        },
    ]
})

export default router;
