<template>
  <div class="root">
 <ons-splitter>
  <ons-splitter-side id="menu" width="220px" collapse swipeable>
    <ons-page>

      <ons-card>
        <img width="100%" src="img/houses/s_serpents.png" alt="">
      </ons-card>
      <ons-list>
        <ons-list-item :key="page" v-for="page in pages" tappable>
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

        <leader-board></leader-board>
        <personal-stats :user="user"></personal-stats>


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
      pages: ['Points','Badges', 'Statistics', 'Profile', 'About'],
      activePage: 'Points',
      img: 'http://lorempixel.com/200/200'
    }
  }
}
</script>


<style lang="scss" scoped>

</style>
