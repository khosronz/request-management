/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import "jquery/dist/jquery.min";
import "popper.js/dist/popper.min";
import "bootstrap/dist/js/bootstrap.min";
import "moment/moment";
import "./bootstrap-datetimepicker.min";
import "@coreui/coreui/dist/js/coreui.min";

// app.js
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

window.Vue = require('vue');
// Vue.use(require('vue-jalali-moment'));
Vue.use(BootstrapVue);


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('multiple-select-component', require('./components/MultipleSelectComponent.vue').default);
// Vue.component('order-table-component', require('./components/OrderTableComponent.vue').default);
Vue.component('order-table-filtered-component', require('./components/OrderTableFilteredComponent.vue').default);
Vue.component('main-order-table-filtered-component', require('./components/MainOrderTableFilteredComponent.vue').default);
Vue.component('main-ticket-table-filtered-component', require('./components/MainTicketTableFilteredComponent.vue').default);
Vue.component('create-order-table-filtered-component', require('./components/CreateOrderTableFilteredComponent.vue').default);
Vue.component('main-logger-table-filtered-component', require('./components/MainLoggerTableFilteredComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
