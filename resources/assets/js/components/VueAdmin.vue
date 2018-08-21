<template>
  <div class="root">
 <ons-splitter>
  <ons-splitter-side id="menu" width="220px" collapse swipeable>
    <ons-page>
      <ons-card class="banner">
        {{user.profile.house.name}}
        <img width="100%" :src="houseIconUrl" alt="">
        {{user.name}}
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
        <div class="right">
          <ons-toolbar-button id="btnHomeScreen">add to home</ons-toolbar-button>
        </div>
        </ons-toolbar>
        <vue-search-student :users="users"> </vue-search-student>
        <points-modifier> </points-modifier>

    </ons-page>
  </ons-splitter-content>

</ons-splitter>
</div>
</template>


<script>

export default {

  mounted() {

  },
  props: ['user', 'badges', 'users'],
  data() {
    return {
      pages: ['Points','Badges', 'Statistics', 'Profile', 'About'],
      activePage: 'Points',

    }
  },

  computed: {
      houseIconUrl: function() {
        return "img/houses/" + this.user.profile.house.name.split(" ")[1].toLowerCase() + '.png';
      }
    },

  methods: {
    userchange() {

    }
  }
}
</script>


<style lang="scss" scoped>
  .banner {
    text-align: center;
  }
</style>

