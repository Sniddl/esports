<template>
      <li class="list-group-item clearfix color-foreground nocolor">
        {{obj.name}}
        <span class="pull-right">

          <button type="button" class="btn btn-success btn-xs "
                  v-on:click="edit">
            <span class="glyphicon glyphicon-edit"></span> Edit
          </button>

          <button type="button" class="btn btn-danger btn-xs "
                  v-on:click="remove">
            <span class="glyphicon glyphicon-remove"></span> Delete
          </button>
        </span>
      </li>
</template>

<script>
    export default {
        props: ['obj'],
        // data() {
        //   return {
        //     showEdit: false
        //   }
        // },
        mounted() {
            // console.log(typeof this.object)
        },
        methods: {
          remove: function (e) {
            e.preventDefault()
            this.$emit('remove')
            axios.post('/delete', this.obj)
          },
          edit: function(e) {
            this.$parent.showEdit = true
            this.$parent.currentPlayerBeingEdited = this.obj
            console.log(this.obj);
          }
        }
    }
</script>
