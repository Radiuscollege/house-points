<template>
  <div class="root">
    <ons-list>
     <ons-list-header>Leaderboard</ons-list-header>
    <ons-list-item v-for="house in houses" :key="house.name">
      <div class="left">
        <img class="list-item__thumbnail" src="https://placekitten.com/g/40/40">
      </div>
      <div class="center">
        {{house.name}}
      </div>
      <div class="right">
        <b> {{ house.totalPoints }} </b>
      </div>
    </ons-list-item>

    </ons-list>
  </div>
</template>


<script>
export default {

  mounted() {
    axios.get('api/houses')
    .then((data) => {
      this.houses = data.data;
    })
  },

  data() {
    return {
      houses: []
    }
  }
}
</script>


<style lang="scss" scoped>

</style>
