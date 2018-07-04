<template>
  <div class="root">
    <div class="content badge-container">
      <h2 class="title">AMO Badge Collection</h2>
      <div class="badge-collection">
        <div class="badge" v-for="badge in allBadges" :key="badge.id">
          <img v-if="badge.active" src="http://placehold.it/50x50" alt="">
          <img v-else src="http://lorempixel.com/50/50" alt="">
        </div>
      </div>
    </div>
  </div>
</template>


<script>

export default {
  props: ['user', 'badges'],

  data() {
    return {
      allBadges: []
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
    height: 300px;
    box-shadow: 0px 0px 15px black;
  }

  .badge-collection {
    display: flex;
    align-items: center;
    justify-content: space-around;
    flex-wrap: wrap;
  }

  .badge {
    margin: 5px;
    padding: 5px;
    border: inset 2px solid black;
    box-shadow: 0px 3px 8px black;
    width: 50px;
    height: 50px;
  }

  .badge img {
    width: 100%;
    height: auto;
    box-shadow: 0px 0px 5px black;
  }
</style>
