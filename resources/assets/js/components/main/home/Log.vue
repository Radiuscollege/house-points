<template>
  <div class="root" style="margin-top: 20px">
      <div class="content">
        <ons-list>
          <ons-list-header>Log</ons-list-header>
          <ons-list-item v-for="log in user.profile.logs" :key="log.id">
            <p><i>{{log.created_at }}</i> <br>
            You earned {{log.points}} points for {{ log.body }}
            </p>
          </ons-list-item>
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
    return {

    }
  }
}
</script>


<style lang="scss" scoped>



</style>
