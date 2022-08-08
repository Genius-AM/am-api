import './bootstrap';
window.Vue = require('vue').default;

import Vue from 'vue'
import VueRouter from 'vue-router'
import {Vuelidate} from "vuelidate";

Vue.use(VueRouter)
Vue.use(Vuelidate)

import App from "./components/App";
import Desks from "./components/Desk/Desks";
import ShowDesk from "./components/Desk/ShowDesk";
import Information from "./components/Information";



const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/desks',
            name: 'desks',
            component: Desks
        },
        {
            path: '/info',
            name: 'info',
            component: Information
        },
        {
            path: '/desks/:deskId',
            name: 'showDesk',
            component: ShowDesk,
            props: true
        },
    ]
})

const app = new Vue({
    el: '#app',
    components: {App},
    router
})
