require('./bootstrap');

const Vue = require('vue').default;
window.Vue = Vue;

/**
 * Components
 */
Vue.component('app', require('./components/App.vue').default);

/**
 * Directives
 */
Vue.directive('loading', require('./directives/loader').default)

const app = new Vue({
    el: '#app',
});
