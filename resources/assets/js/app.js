
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('sniddl-ajax');
require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('editable-list', require('./components/Editable-List.vue'));
Vue.component('modal', require('./components/Modal.vue'));
Vue.component('player', require('./components/Player.vue'));
Vue.component('picker', require('./components/Picker.vue'));
Vue.component('toggle', require('./components/Toggle.vue'));
Vue.component('discord-roles', require('./components/Discord-Roles.vue'));
Vue.component('discord-register', require('./components/Discord-Register.vue'));
Vue.component('pulse-loader', require('vue-spinner/src/PulseLoader.vue'));
// Vue.component('Photoshop', require('vue-color'));


const vm = new Vue({
    el: '#app',
    data: {
      games: {},
      consoles: {},
      players: {},
      socials: {},
      filtered: {
        games: {},
        consoles: {},
        players: {}
      },
      sortType: 'Player',
      loading: true
    },
    methods: {
      sniddl: function (e) {
        e.preventDefault()
      },

      search: function (e) {
        var match = e.target.value.toLowerCase();
        switch (this.sortType) {
          case "Player":
            this.filtered.players = this.players.filter(function (item) {
              return item.name.toLowerCase().includes(match)
            })
          break;

          case "Console":
            this.filtered.players = this.players.filter(function (item) {
              var result = false
              for (var i in item.consoles) {
                if (item.consoles[i].name.toLowerCase().includes(match)){
                  result = true
                }
              }
              return result
            })
          break;

          case "Game":
            this.filtered.players = this.players.filter(function (item) {
              var result = false
              for (var i in item.games) {
                if (item.games[i].name.toLowerCase().includes(match)){
                  result = true
                }
              }
              return result
            })
          break;
        }
      }

    },
    mounted() {
      axios.get('/json/app').then(response => {
        this.games = response.data['games']
        this.consoles = response.data['consoles']
        this.players = response.data['players']
        this.socials = response.data['socials']
        this.filtered.players = this.players
        this.loading = false
      })

      $('input').attr('autocomplete','off')
    }
});
