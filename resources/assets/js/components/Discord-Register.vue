<template>
  <div>
    <div class="panel panel-default">
      <div class="panel-heading color-panel-headers" >Discord
          <button class="btn btn-sm btn-primary pull-right"
                  type="submit"
                  v-if="disReg == 0"
                  @click="submit"
                  >
                  Save Credentials
          </button>

          <a  class="btn btn-sm btn-success pull-right"
                  :href="`https://discordapp.com/oauth2/authorize?permissions=268435472&scope=bot&client_id=${env.client}`"
                  v-if="disReg == 1"
                  target="_blank"
                  >
                  Invite Bot
          </a>
      </div>

        <ul class="list-group" >
          <li class="list-group-item" v-if="disReg == 1">
              Toggle Discord Server
              <toggle :val="disOn" callback="discordToggle" result="disResult"></toggle>
          </li>
          <li class="list-group-item" v-else>
            <div class="form-group">
              <label for="">Client ID</label>
              <input type="text" class="form-control" name="discord-client" v-model="clientID" >
              <span class="help-block">Your client ID</span>
            </div>
            <div class="form-group">
              <label for="">Token</label>
              <input type="text" class="form-control" name="discord-token" v-model="token">
              <span class="help-block">Not to be confused with Client Secret</span>
            </div>
          </li>
        </ul>
    </div>

    <div v-if="discordOn == 1">
        <discord-roles></discord-roles>
    </div>
  </div>
</template>

<script>
    export default {
        props: ['discordRegister', 'discordOn'],
        data () {
          return {
            disResult: '',
            disReg: '',
            disOn: '',
            clientID: '',
            token: ''
          }
        },
        mounted () {
          this.env = require('../../../../discord.json');
          this.disReg = this.discordRegister
          this.disOn = this.discordOn
          socket.on('success:discord-keys', () => {
            axios.post('/discordInit')
                .then( response => {
                  console.log('axios complete');
                  this.disReg = 1
                })
          })
        },
        methods: {
          discordToggle: function (val) {
              socket.emit('discordToggle', val);
              axios.post('/discordToggle', {toggle: val})
                    .then(response => {
                      console.log(response.data);
                    })
          },
          submit: function () {
            console.log('submitted');
            socket.emit('save:discord-keys', this.$data)
          }
        }
    }
</script>
