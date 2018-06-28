
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('vue-main', require('./components/VueMain.vue'));
Vue.component('leader-board', require('./components/LeaderBoard.vue'));
Vue.component('personal-stats', require('./components/PersonalStats.vue'));
Vue.component('latest-badges', require('./components/Badges.vue'));


const app = new Vue({
    el: '#app'
});


