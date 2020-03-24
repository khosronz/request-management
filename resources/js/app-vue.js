// app.js
import Vue from 'vue'
import enums from 'vue-enums'
import axios from "axios";
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// use enums directly in template
Vue.use(enums)
// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

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
Vue.component('main-order-table-filtered-without-user-id-component', require('./components/MainOrderTableFilteredWithoutUserIdComponent.vue').default);
Vue.component('create-order-table-filtered-component', require('./components/CreateOrderTableFilteredComponent.vue').default);
Vue.component('main-ticket-table-filtered-component', require('./components/MainTicketTableFilteredComponent.vue').default);
Vue.component('main-logger-table-filtered-component', require('./components/MainLoggerTableFilteredComponent.vue').default);
Vue.component('main-logger-user-table-filtered-component', require('./components/MainLoggerUserTableFilteredComponent.vue').default);

window.Vue = Vue;
axios.defaults.headers.common = {
    'X-CSRF-TOKEN': Laravel.csrfToken,
    'XSRF-TOKEN': Laravel.csrfToken,
    'X-Requested-With': 'XMLHttpRequest',
    'Authorization': 'Bearer ' + Laravel.apiToken,
};

window.Vue.prototype.$http = axios;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


const app = new window.Vue({
    el: '#app',
});
