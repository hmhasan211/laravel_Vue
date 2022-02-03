
// const { default: VueRouter } = require('vue-router');

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes}  from "./routes";

Vue.use(VueRouter);


Vue.component(
            "employees", require("./components/employees/index.vue"),
            "employees-create", require("./components/employees/create.vue")
);


const router = new VueRouter({
        mode : 'history',
        routes: routes
});


const app = new Vue({
    el: '#app',
    router: router
});
