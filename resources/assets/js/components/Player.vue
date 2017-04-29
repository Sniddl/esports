<template>
  <div class="col-sm-4" style="text-align: left">
    <div class="panel panel-default color-foreground">
      <div class="panel-heading color-panel-headers">
        <h3 class="panel-title">{{name}}</h3>
      </div>

      <div class="panel-body" style="padding-bottom: 0;">
        <div class="row">
          <div class="col-xs-8 col-xs-offset-2">
            <img class="panel-image" :src="image">
          </div>
        </div>
        <br>

        <div class="row">
          <div class="list-group">
            <a class="list-group-item no-border color-foreground" data-toggle="collapse" :data-target="'#consoles' + num">Consoles
              <i class="fa fa-ellipsis-h pull-right" style="font-size:22px" aria-hidden="true"></i>
            </a>
            <ul class="list-group collapse" :id="'consoles' + num">
              <li class="list-group-item no-border color-foreground" v-for="console in consoles">
                <strong>{{console.name}}: </strong>{{console.pivot.username}}
              </li>
            </ul>
          </div>
        </div>

        <div class="row">
          <div class="list-group">
            <a class="list-group-item no-border color-foreground" data-toggle="collapse" :data-target="'#games' + num">Games
              <i class="fa fa-ellipsis-h pull-right" style="font-size:22px" aria-hidden="true"></i>
            </a>
            <ul class="list-group collapse" :id="'games' + num">
              <li class="list-group-item no-border color-foreground" v-for="game in games">{{game.name}}</li>
            </ul>
          </div>
        </div>

      </div>

      <div class="panel-footer color-panel-headers">
        <a v-for="social in socials" class="social-media color-panel-headers" :href="social.base_url + social.pivot.username">
          <i :class="'fa fa-' + social.name.toLowerCase()" aria-hidden="true"></i>
        </a>
      </div>

    </div>
  </div>
</template>

<script>
    export default {
      props: ['name', 'consoles', 'games', 'socials', 'num', 'image'],
      data() {
        return {
          input: '',
          output: 'cows'
        }
      },
      mounted() {
          // console.log(typeof this.object)
      },
    }
</script>
