import axios from 'axios';

window.axios = axios;
// window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

// require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './router';
import Toasted from 'vue-toasted';
import VueFriendlyIframe from 'vue-friendly-iframe';

Vue.use(VueFriendlyIframe);

Vue.use(Toasted);
Vue.use(VueRouter);

Vue.component('navigation', require('./components/Navigation.vue').default);

const app = new Vue({
    el: '#mainApp',
    router: new VueRouter(routes),
    // midtransClient: midtransClient
});
