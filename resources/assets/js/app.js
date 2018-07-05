
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'Vuex';
Vue.use(Vuex);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vuex

const store = new Vuex.Store({
    state: {
        item: {}
    },
    mutations: {
        setItem(state, obj) {
            state.item = obj;
        }
    }
});

Vue.component('example', require('./components/ExampleComponent.vue'));
Vue.component('tml-header', require('./components/TmlHeader.vue'));
Vue.component('tml-register', require('./components/TmlRegister.vue'));
Vue.component('tml-title-reset-pass', require('./components/TmlTitleResetPass.vue'));
Vue.component('tml-input', require('./components/TmlInput.vue'));
Vue.component('tml-select-profile', require('./components/TmlSelectProfile.vue'));
Vue.component('tml-unauthorized', require('./components/TmlUnauthorized.vue'));
Vue.component('tml-page', require('./components/TmlPage.vue'));
Vue.component('tml-panel', require('./components/TmlPanel.vue'));
Vue.component("tml-box", require("./components/TmlBox.vue"));
Vue.component('tml-table-place', require('./components/TmlTablePlace.vue'));
Vue.component('tml-modallink', require('./components/modal/ModalLink.vue'));
Vue.component('tml-modal', require('./components/modal/Modal.vue'));
Vue.component("tml-form", require("./components/TmlForm.vue"));
Vue.component('tml-local-desc', require('./components/TmlLocalDescription.vue'));
Vue.component('tml-image', require('./components/TmlImage.vue'));

const app = new Vue({
    el: '#app',
    store,
    mounted: function () {
        document.getElementById("app").style.display = "block";
    }
});
