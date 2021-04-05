/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';
import routeadmin from './routeadmin';
import common from './common';
import admin from './admin/admin.vue';

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css'


Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.mixin(common);



const app = new Vue({
    el: '#app',
    components: {
       admin
    },
    vuetify: new Vuetify(),
    router:new VueRouter(routeadmin)
});


