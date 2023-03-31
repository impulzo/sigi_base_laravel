require("./bootstrap");
window.Vue = require("vue");
import Vue from "vue";

Vue.component("dashboard", require("./pages/Dashboard/Index.vue").default);

const app = new Vue({
    el: "#app",
});
