<template>
  <div class="modal fade" :id="id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <form class="dropzone" :action="'/add/' + name" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_token" :value="$parent.csrf">
          <div class="modal-header" style="padding-bottom: 0;">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul class="nav nav-tabs" v-if="name === 'Player'" style="margin-bottom: -1px;">
              <li v-on:click="toggle" class="active"><a data-target="#player-tab">Player</a></li>
              <li v-on:click="toggle"><a data-target="#game-tab">Games</a></li>
              <li v-on:click="toggle"><a data-target="#console-tab">Consoles</a></li>
              <li v-on:click="toggle"><a data-target="#social-tab">Social Media</a></li>
            </ul>
          </div>
          <div class="modal-body">

            <div v-show="page == '#player-tab'" >
              <div class="form-group">
                <label for="">{{name}}</label>
                <input type="text" class="form-control" :name="name + '-input'" :placeholder="name" required="required">
              </div>
              <div v-if="name === 'Player'" class="form-group">
                <label for="">Player Avatar</label>
                <div id="dropzone">
                  <div class="h1" style="margin-top: 11px"><i class="fa fa-cloud-upload" aria-hidden="true"></i></div>
                  <input type="file" accept="image/png, image/jpg, image/jpeg, image/gif" required='required' name="avatar"/>
                </div>
              </div>

              <!-- <div class="dz-message panel panel-default" data-dz-message>
                <div class="panel-body" style="text-align: center">
                  <h1><i class="fa fa-cloud-upload" aria-hidden="true"></i></h1>
                  Upload Avatar
                </div>
              </div> -->
            </div>

            <div  v-show="page == '#game-tab'" >
              <div v-if="name === 'Player'" class="form-group">
                <label for="">Game</label>
                <select multiple class="form-control" name="games[]"  required>
                  <option v-for="game in this.$parent.games" :value="game.id">{{game.name}}</option>
                </select>
              </div>
            </div>


            <div v-show="page == '#console-tab'" >
              <div v-if="name === 'Player'" class="form-group">
                <label for="">Console</label>
                <select multiple class="form-control" name="consoles[]" v-model="selectedConsoles" required>
                  <option v-for="console in this.$parent.consoles" :value="console.id">{{console.name}}</option>
                </select>
              </div>
              <div class="form-group" v-for="selected in selectedConsoles" :key="selected.id">
                <label for="">{{selectedConsole(selected).name}} Username</label>
                <input type="text" class="form-control" :name="'console-'+selectedConsole(selected).id " placeholder="username" required="required">
              </div>
            </div>


            <div v-show="page == '#social-tab'">
              <div v-if="name === 'Player'" class="form-group">
                <label for="">Social Media</label>
                <select multiple class="form-control" name="socials[]" v-model="selectedSocials" required>
                  <option v-for="social in this.$parent.socials" :value="social.id">{{social.name}}</option>
                </select>
              </div>
              <div class="form-group" v-for="selected in selectedSocials" :key="selected.id">
                <label for="">{{selectedSocial(selected).name}} Username</label>
                <input type="text" class="form-control" :name="'social-'+selectedSocial(selected).id " placeholder="username" required="required">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
    import { Multiselect } from 'vue-multiselect'
    // Vue.component(Multiselect)
    export default {
        props: ['id', 'action', 'title', 'name' ],
        data: function() {
          return {
            selectedConsoles: [],
            selectedSocials: [],
            page: '#player-tab'
          }
        },
        methods: {
          sniddl: function (e) {
            e.preventDefault()
          },
          selectedConsole: function (id) {
            var c = this.$parent.consoles.filter(function(obj) {
              return obj.id == id
            })
            return c[0]
          },
          selectedSocial: function (id) {
            var s = this.$parent.socials.filter(function(obj) {
              return obj.id == id
            })
            return s[0]
          },
          toggle: function (e) {
            $('li').removeClass('active')
            $(e.target).parent().addClass('active')
            this.page = e.target.dataset.target
          }
        },
        mounted () {
          console.log(this.$parent.consoles);
        }
    }
</script>
