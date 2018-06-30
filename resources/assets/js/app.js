
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
        profile: ""
    },
    mutations: {
        setItem(state, obj) {
            console.log(obj)
            state.profile = obj;
        }
    }
});

Vue.component('example', require('./components/ExampleComponent.vue'));
Vue.component('tml-header', require('./components/TmlHeader.vue'));
Vue.component('tml-register', require('./components/TmlRegister.vue'));
Vue.component('tml-title-reset-pass', require('./components/TmlTitleResetPass.vue'));
Vue.component('tml-input-register', require('./components/TmlInputRegister.vue'));
Vue.component('tml-select-profile', require('./components/TmlSelectProfile.vue'));

const app = new Vue({
    el: '#app',
    store
});
