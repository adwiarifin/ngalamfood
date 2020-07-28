require('./bootstrap');

// import dependecies tambahan
import Vue from 'vue';
import Vuetify from '@/plugins/vuetify.js';

// Route information for vue Router
import Routes from '@/js/routes.js';

// component File
import App from '@/js/components/app';

const app = new Vue({
    el: '#app',
    router: Routes,
    vuetify: Vuetify,
    render: h => h(App),
})
