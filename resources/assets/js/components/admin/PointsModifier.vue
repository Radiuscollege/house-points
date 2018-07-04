<template>
  <div class="root">
    <div class="point-buttons">
      <div class="row flex">
        <button @click="pointSelected(5)" class="point-btn bubbly-button" :disabled="!isStudentSelected">5</button>
        <button @click="pointSelected(10)" class="point-btn bubbly-button" :disabled="!isStudentSelected">10</button>
      </div>
      <div class="row flex">
        <button @click="pointSelected(25)" class="point-btn bubbly-button" :disabled="!isStudentSelected">25</button>
        <button @click="pointSelected(50)" class="point-btn bubbly-button" :disabled="!isStudentSelected">50</button>
      </div>
    </div>
    <div class="point-finish" v-if="isStudentSelected">
      <p>Add {{selectedPoints}} points to {{selectedStudent.name}} for:</p>
      <select v-model="selected" style="width: 100%">
        <option disabled modifier="material"></option>
        <option :key="reason.id" v-for="reason, key in reasons" :value="key+1" modifier="material">
          {{reason.name}}
        </option>

      </select>

      <button @click="send" class="send-btn bubbly-button" v-show="selected > 0">Send Points</button>
    </div>

  </div>
</template>


<script>

export default {

  mounted() {
    this.$root.$on('student-selected', (student) => {
      this.selectedStudent = student;
    })

    this.$root.$on('student-deselected', () => {
      this.selectedStudent = false;
    })

    axios.get('/api/reasons')
      .then((data) => {
        this.reasons = data.data;
      })
  },

  data() {
    return {
      selectedStudent: false,
      selectedPoints: 0,
      selected: 0,
      reasons: []
    }
  },

  methods: {
    pointSelected(points) {
      this.selectedPoints = points
    },

    send() {
      axios.post('/admin', {
        id: this.selectedStudent.id,
        log: this.selected,
        points: this.selectedPoints,
        name: this.selectedStudent.name
      }).then( () => {
        this.selectedStudent = false;
        this.$root.$emit('points-given');
        this.showToast('You sent points, you are one awesome headmaster!!');
      })
    },

    showToast(message) {
      ons.notification.toast(message, {
        timeout: 2000
      });
    }
  },

  computed: {
    isStudentSelected() {
      return typeof this.selectedStudent == 'object';
    }
  }

}
</script>



<style lang="scss" scoped>
  $fuschia: #ff0081;
  $button-bg: $fuschia;
  $button-text-color: #fff;
  $baby-blue: #f8faff;

  .send-btn {
    display: block;
    margin: 15px auto;
    width: 60%;
  }

  select {
    padding: 10px;
  }

  .flex {
    display: flex;
    justify-content: space-around;
  }

  button[disabled] {
    background: #ccc;
  }

  .point-buttons {
    margin-top: 10px;
  }

  .point-btn {
    width: 150px;
    height: 150px;
    margin: 5px;
    font-size: 3em;
    box-shadow: 0px 0px 8px #ccc;
  }

  button{
  font-family: 'Helvetica', 'Arial', sans-serif;
  display: inline-block;
  font-size: 1em;
  padding: 1em 1em;
  -webkit-appearance: none;
  appearance: none;
  background-color: $button-bg;
  color: $button-text-color;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  position: relative;
  transition: transform ease-in 0.1s, box-shadow ease-in 0.25s;
  box-shadow: 0 2px 25px rgba(255, 0, 130, 0.5);

  &:focus {
    outline: 0;
  }

  &:before, &:after{
    position: absolute;
    content: '';
    display: block;
    width: 140%;
    height: 100%;
    left: -20%;
    z-index: -1000;
    transition: all ease-in-out 0.5s;
    background-repeat: no-repeat;
  }

  &:before{
    display: none;
    top: -75%;
    background-image:
      radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle,  transparent 20%, $button-bg 20%, transparent 30%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle,  transparent 10%, $button-bg 15%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%);
  background-size: 10% 10%, 20% 20%, 15% 15%, 20% 20%, 18% 18%, 10% 10%, 15% 15%, 10% 10%, 18% 18%;
  //background-position: 0% 80%, -5% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 85% 30%;
  }

  &:after{
    display: none;
    bottom: -75%;
    background-image:
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle,  transparent 10%, $button-bg 15%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%),
    radial-gradient(circle, $button-bg 20%, transparent 20%);
  background-size: 15% 15%, 20% 20%, 18% 18%, 20% 20%, 15% 15%, 10% 10%, 20% 20%;
  //background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
  }

  &:active{
    transform: scale(0.9);
    background-color: darken($button-bg, 5%);
    box-shadow: 0 2px 25px rgba(255, 0, 130, 0.2);
  }

  &.animate{
    &:before{
      display: block;
      animation: topBubbles ease-in-out 0.75s forwards;
    }
    &:after{
      display: block;
      animation: bottomBubbles ease-in-out 0.75s forwards;
    }
  }
}


@keyframes topBubbles {
  0%{
    background-position: 5% 90%, 10% 90%, 10% 90%, 15% 90%, 25% 90%, 25% 90%, 40% 90%, 55% 90%, 70% 90%;
  }
    50% {
      background-position: 0% 80%, 0% 20%, 10% 40%, 20% 0%, 30% 30%, 22% 50%, 50% 50%, 65% 20%, 90% 30%;}
 100% {
    background-position: 0% 70%, 0% 10%, 10% 30%, 20% -10%, 30% 20%, 22% 40%, 50% 40%, 65% 10%, 90% 20%;
  background-size: 0% 0%, 0% 0%,  0% 0%,  0% 0%,  0% 0%,  0% 0%;
  }
}

@keyframes bottomBubbles {
  0%{
    background-position: 10% -10%, 30% 10%, 55% -10%, 70% -10%, 85% -10%, 70% -10%, 70% 0%;
  }
  50% {
    background-position: 0% 80%, 20% 80%, 45% 60%, 60% 100%, 75% 70%, 95% 60%, 105% 0%;}
 100% {
    background-position: 0% 90%, 20% 90%, 45% 70%, 60% 110%, 75% 80%, 95% 70%, 110% 10%;
  background-size: 0% 0%, 0% 0%,  0% 0%,  0% 0%,  0% 0%,  0% 0%;
  }
}

</style>
