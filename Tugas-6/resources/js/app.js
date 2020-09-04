import axios from "axios";
import Vue from "vue";
import VueRouter from "vue-router";
import routes from "./router";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

try {
    window.Popper = require("popper.js").default;
    window.$ = window.jQuery = require("jquery");

    require("bootstrap");
} catch (e) {}

Vue.use(VueRouter);
Vue.component("navigation", require("./components/Navigation.vue").default);
Vue.productionTips = false;

const app = new Vue({
    el: "#app",
    router: new VueRouter(routes)
});
