<template>
  <div class="root" style="margin-top: 20px">
      <div class="content">
        <ons-list>
          <ons-list-header>Personal Stats</ons-list-header>
          <ons-row class="stat-row">
            <ons-col class="stat-block stat-total-points">
              <div class="points">{{user.profile.points}}</div>
              points
            </ons-col>
            <ons-col class="stat-block stat-points-week"> +{{user.pointsThisWeek}} points this week! </ons-col>
          </ons-row>

        </ons-list>
      </div>
  </div>
</template>


<script>
export default {

  mounted() {

  },

  props: ['user'],

  data() {
    return {}
  }
}
</script>


<style lang="scss" scoped>

  .stat-block:last-child {
    padding: 10px;
    background: #eeffcc;
  }

  .stat-row {
    align-items: center;
    text-align: center;
    padding: 10px;

  }

</style>
