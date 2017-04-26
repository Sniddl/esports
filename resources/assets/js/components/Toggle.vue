<template>
  <div class="material-switch pull-right">
      <input id="someSwitchOptionSuccess" name="someSwitchOption001" type="checkbox" v-model="value"/>
      <label for="someSwitchOptionSuccess" class="label-success"></label>
  </div>
</template>

<script>
    export default {
        props: ['val', 'callback', 'result'],
        data () {
          return {
            value: '',
            timesMounted: 0
          }
        },
        mounted () {
          this.value = this.val == '1'
          this.timesMounted ++
          if (this.result){
            this.$parent[this.result] = this.value
          }
        },
        watch: {
          value: function () {
            if (this.timesMounted > 1 && this.callback) {
              this.$parent[this.callback](this.value)
            }
            if (this.result){
              this.$parent[this.result] = this.value
            }
            this.timesMounted ++
          }
        }
    }
</script>
