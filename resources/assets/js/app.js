
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueTouch from 'vue-touch';

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// base templates
Vue.component('vue-main',   require('./components/VueMain.vue'));
Vue.component('vue-admin',  require('./components/VueAdmin.vue'));

// components
Vue.component('leader-board',       require('./components/main/home/LeaderBoard.vue'));
Vue.component('personal-stats',     require('./components/main/home/PersonalStats.vue'));
Vue.component('latest-badges',      require('./components/main/home/LatestBadges.vue'));

Vue.component('badge-collection',   require('./components/main/badges/BadgesCollection.vue'));

Vue.component('vue-search-student', require('./components/admin/SearchStudent.vue'));
Vue.component('points-modifier',    require('./components/admin/PointsModifier.vue'));
Vue.use(VueTouch);
const app = new Vue({
    el: '#app'
});


var animateButton = function(e) {

    e.preventDefault;
    //reset animation
    e.target.classList.remove('animate');
  console.log('test');
    e.target.classList.add('animate');
    setTimeout(function(){
      e.target.classList.remove('animate');
    },700);
  };

  var bubblyButtons = document.getElementsByClassName("bubbly-button");

  for (var i = 0; i < bubblyButtons.length; i++) {
    bubblyButtons[i].addEventListener('click', animateButton, false);
  }

