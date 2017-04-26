<template>
  <div class="panel panel-default">
    <div class="panel-heading color-panel-headers " >Roles
      <button class="btn btn-sm btn-primary pull-right"
              type="submit"
              >
              Refresh
      </button>
    </div>
    <ul class="list-group">
      <li v-for="role in roles" class="list-group-item">
          {{role.name}}
      </li>
    </ul>
  </div>
</template>

<script>
    export default {
        props: [],
        data () {
          return {
            roles: ''
          }
        },
        mounted () {
          axios.get('/json/discord-roles').then( response => {
            this.roles = response.data;
          });
        },
        watch: {

        }
    }
</script>
