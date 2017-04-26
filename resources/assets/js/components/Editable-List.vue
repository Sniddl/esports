<template>
      <li class="list-group-item clearfix color-foreground nocolor">
        {{obj.name}}
        <span class="pull-right">
          <button type="button" class="btn btn-danger btn-xs "
                  v-on:click="remove"
                  >
                  <!-- :data-action="'/delete/' + obj.id"
                  data-method="post"
                  :data-json="obj" -->
            <span class="glyphicon glyphicon-remove"></span> Delete
          </button>
        </span>
      </li>
</template>

<script>
    export default {
        props: ['obj'],
        mounted() {
            // console.log(typeof this.object)
        },
        methods: {
          remove: function (e) {
            e.preventDefault()
            this.$emit('remove')
            axios.post('/delete', this.obj)
          }
        }
    }
</script>
