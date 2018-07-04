<template>
  <div class="root">
 <ons-splitter>
  <ons-splitter-side id="menu" width="220px" collapse swipeable>
    <ons-page>

      <ons-card class="banner">
        {{user.profile.house.name}}
        <img width="100%" src="img/houses/s_serpents.png" alt="">
        {{user.name}}
      </ons-card>
      <ons-list>
        <ons-list-item @click="changePage(page)" :key="page" v-for="page in pages" :class="{'page-active': page == activePage}"  tappable>
          {{ page }}
        </ons-list-item>
      </ons-list>
    </ons-page>
  </ons-splitter-side>
  <ons-splitter-content id="content">
    <ons-page>
        <ons-toolbar>
        <div class="left">
            <ons-toolbar-button onclick="fn.open()">
            <ons-icon icon="md-menu"></ons-icon>
            </ons-toolbar-button>
        </div>
        <div class="center">
            {{ activePage }}
        </div>
        </ons-toolbar>

        <div v-show="pageActive('Home')">
          <leader-board></leader-board>
          <personal-stats :user="user"></personal-stats>
          <latest-badges :badges="user.profile.latest_badges"> </latest-badges>
        </div>

        <div v-show="pageActive('Badges')">
          <badge-collection :user="user" :badges="user.profile.badges"></badge-collection>
        </div>


    </ons-page>
  </ons-splitter-content>

</ons-splitter>
</div>
</template>


<script>

export default {

  mounted() {

  },

  props: ['user'],

  data() {
    return {
      pages: ['Home','Badges', 'Statistics', 'Profile', 'About'],
      activePage: 'Home'
    }
  },

  computed: {

  },

  methods: {
    changePage(page) {
      this.activePage = page;
      fn.close();
    },
    pageActive(page) {
      return page === this.activePage;
    }
  }
}
</script>


<style lang="scss" scoped>
  $fuschia: #ff0081;
  $button-bg: $fuschia;
  $button-text-color: #fff;
  $baby-blue: #f8faff;

  .banner {
    text-align: center;
  }

  .page-active {
    background: $fuschia;
  }

  .slide-fade-enter-active {
  transition: all .3s ease;
}
.slide-fade-leave-active {
  transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to
/* .slide-fade-leave-active below version 2.1.8 */ {
  transform: translateX(10px);
  opacity: 0;
}

</style>
