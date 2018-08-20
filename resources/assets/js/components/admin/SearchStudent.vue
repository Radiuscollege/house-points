<template>
  <div class="root">
    <input v-if="!Object.keys(selectedStudent).length" v-model="searchQuery" type="search" value="" placeholder="Search Student" class="search-input search-input--material" style="width: 100%">
    <div v-else class="toolbar">
      <div class="toolbar__left"></div>
      <div class="toolbar__center">
        {{selectedStudent.name}}
      </div>
       <div class="toolbar__right">
          <span class="toolbar-button" @click="deselectStudent">back</span>
       </div>
    </div>
    <ul class="list" v-if="searchQuery.length">
      <li v-for="student in queryResult" class="list-item list-item--tappable">
        <div @click="studentSelected(student)" class="list-item__center"> {{student.name}} </div>
      </li>
    </ul>
  </div>
</template>


<script>
export default {
  props: ['users'],
  data() {
    return {
      searchQuery: "",
      queryResult : [],
      selectedStudent: {},
    }
  },

  mounted() {
    this.$root.$on('points-given', () => {
      this.deselectStudent();
    })
  },

  watch: {
    searchQuery: function() {
      window.alert('tets');
      this.search();
    }
  },

  methods: {

    filterByQuery(user) {
      if ( user.name.toLowerCase().includes(this.searchQuery) || user.id.toLowerCase().includes(this.searchQuery))
      {
        return true;
      }
    },

    search() {
      this.queryResult = this.users.filter(this.filterByQuery);
      if (this.searchQuery == ''){
        this.queryResult = [];
      }
    },

    studentSelected(student) {
      this.selectedStudent = student;
      this.queryResult = [];
      this.$root.$emit('student-selected', student);
    },

    deselectStudent() {
      this.searchQuery = "";
      this.selectedStudent = {};
      this.$root.$emit('student-deselected');
    }
  }
}
</script>

<style lang="scss" scoped>
  .list {
    position: absolute;
    width: 100%;
    z-index: 5;
  }
</style>
