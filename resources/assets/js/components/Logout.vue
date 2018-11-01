<template>
  <div class="root">
    <ons-list-item @click="logout">
      Logoutsd
    </ons-list-item>
  </div>
</template>


<script>
export default {
  methods: {
    logout() {
      let confirmation = confirm('Are you sure you want to logout?');
      if (confirmation) {

      }
    }
  }
}
</script>

<style lang="scss" scoped>

</style>
