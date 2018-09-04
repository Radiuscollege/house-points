<template>
  <div class="root">
    <div class="content badge-container">
      <h2 class="title">AMO Badge Collection</h2>
      <div class="badge-collection">
        <div @click="showInfo(badge)" :class="{'activebadge' : badge.active}" class="badge" v-for="badge in allBadges" :key="badge.id">
          <img :class="{'grayscale': !badge.active}" :src="'img/badges/' + badge.img_path" alt="">
        </div>
      </div>
    </div>

    <ons-modal @click="close"  direction="up">
      <div class="modall">
        <h1 class="title">{{activeBadge.name}}</h1>
        <img :class="{'grayscale': !activeBadge.active}" :src="'img/badges/' + activeBadge.img_path" alt="">
        <p>{{activeBadge.description}}</p>
      </div>
    </ons-modal>
  </div>
</template>


<script>

export default {
  props: ['user', 'badges'],

  data() {
    return {
      allBadges: [],
      activeBadge: {
        "name" : 'undefined',
        "description": 'undefined',
        "img_path": "undefined"
      }
    }
  },

  computed: {

  },

  methods: {
    showInfo(badge) {
      this.activeBadge = badge;
      let modal = document.querySelector('ons-modal');
      modal.show();
    },

    close() {
      let modal = document.querySelector('ons-modal');
      modal.hide();
    }
  },

  mounted() {
    axios.get('/api/badges')
      .then( (data) => {
        this.allBadges = data.data
        for (let i = 0; i < this.allBadges.length; i++) {
          for (let j = 0; j < this.badges.length; j++) {
            if(this.allBadges[i].id == this.badges[j].id) {
              this.allBadges[i].active = true;
            }
          }
        }
      });
  }
}
</script>


<style lang="scss" scoped>

  .modall {
    text-align: center;
    margin: 0 auto;
  }

  .modall img {
    width: 50%;
    height: auto;
  }

  .title {
    text-align: center;
  }

  .badge-container {
    margin: 20px;
    padding: 20px;
    background: #fff;
    max-width: 320px;
    margin: 10px auto;
    background: -webkit-linear-gradient(to left, #fefefe, #ddd);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to left, #fefefe, #ddd); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    // box-shadow: 0px 0px 15px black;
  }

  .badge-collection {
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-wrap: wrap;
  }

  .badge {
    margin: 15.5px 8px;
    padding: 6px;
    border: 2px solid #ccc;
    transform: rotate(45deg);
    width: 60px;
    height: 60px;
  }

  .badge img {
    width: 100%;
    transform: rotate(-45deg);
    height: auto;
  }

  .grayscale {
    filter: grayscale(150%);
  }

  .activebadge {
    border:1px solid gold;
    box-shadow: 0px 0px 15px gold;
  }

</style>
