<template>

    <div class="panel panel-default" >
      <form class="dropzone" action="/edit/Player" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" :value="$parent.csrf">
        <input type="hidden" name="id" :value="$parent.currentPlayerBeingEdited.id">
        <div class="panel-heading color-panel-headers" >Edit Player
          <button class="btn btn-sm btn-primary pull-right"
                  type="submit">
                  Save Player
          </button>
        </div>


        <ul class="list-group" style="padding:10px">
          <div class="form-group">
            <label for="">name</label>
            <input type="text" class="form-control" name="Player-input" :value="$parent.currentPlayerBeingEdited.name" required="required">
          </div>

          <div class="form-group">
            <label for="">Game</label>
            <select multiple class="form-control" name="games[]" v-model="selectedGames" required>
              <option v-for="game in this.$parent.games" :value="game.id">{{game.name}}</option>
            </select>
          </div>

          <div class="form-group">
            <label for="">Console</label>
            <select multiple class="form-control" name="consoles[]" v-model="selectedConsoles" required>
              <option v-for="con in this.$parent.consoles" :value="con.id">{{con.name}}</option>
            </select>
          </div>
          <div class="form-group" v-for="selected in selectedConsoles" :key="selected.id">
            <label for="">{{selectedConsole(selected).name}} Username</label>
            <input type="text" class="form-control" :name="'console-'+ selectedConsole(selected).id" :value="selectedConsole(selected).pivot.username" required="required">
          </div>

          <div class="form-group">
            <label for="">Social Media</label>
            <select multiple class="form-control" name="socials[]" v-model="selectedSocials" required>
              <option v-for="social in this.$parent.socials" :value="social.id">{{social.name}}</option>
            </select>
          </div>
          <div class="form-group" v-for="selected in selectedSocials" :key="selected.id">
            <label for="">{{selectedSocial(selected).name}} Username</label>
            <input type="text" class="form-control" :name="'social-'+ selectedSocial(selected).id" :value="selectedSocial(selected).pivot.username" required="required">
          </div>

        </ul>
      </form>
    </div>

</template>

<script>
    export default {
        props: [],
        data () {
          return {
            player: {},
            selectedConsoles: [],
            selectedGames: [],
            selectedSocials: []
          }
        },
        methods: {
          hideEdit: function (e) {
            this.$parent.showEdit = false
          },
          selectedConsole: function (id) {
            var p = this.$parent.currentPlayerBeingEdited.consoles
            if (p.length > 0) {
              var c = p.filter(function(obj) {
                return obj.id == id
              })
            }
            if (p.length == 0 || c.length == 0) {
              var c = this.$parent.consoles.filter(function(obj) {
                return obj.id == id
              })
            }

            if (c[0].pivot == undefined) {
              c[0].pivot = {}
            }
            return c[0]
          },
          selectedSocial: function (id) {
            var p = this.$parent.currentPlayerBeingEdited.socials
            if (p.length > 0) {
              var s = p.filter(function(obj) {
                return obj.id == id
              })
            }
            if (p.length == 0 || s.length == 0) {
              var s = this.$parent.socials.filter(function(obj) {
                return obj.id == id
              })
            }

            if (s[0].pivot == undefined) {
              s[0].pivot = {}
            }

            return s[0]
          }
        },
        mounted () {

          this.player = this.$parent.currentPlayerBeingEdited
          var p = this.$parent.currentPlayerBeingEdited
          p.consoles.forEach(c => {
            this.selectedConsoles.push(c.id)
          })
          p.games.forEach(g => {
            this.selectedGames.push(g.id)
          })
          p.socials.forEach(s => {
            this.selectedSocials.push(s.id)
          })

        }
    }
</script>
