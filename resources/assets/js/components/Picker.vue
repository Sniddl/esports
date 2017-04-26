<template>
  <!-- <div class="picker">
    <input type="text" name="" value="">
    <swatches-picker v-model="colors" @change-color="onChange"></swatches-picker>
  </div> -->
  <div class="col-sm-6">
    <label>{{label}}</label>
    <div class="input-group">
      <div class="input-group-btn">
        <button v-on:click="toggle" type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" v-bind:style="{ backgroundColor: colors.hex, color: eyedropper }">
          <i class="fa fa-eyedropper" aria-hidden="true"></i>
        </button>
      </div><!-- /btn-group -->
      <input type="text" class="form-control" :value="colors.hex" disabled>
      <input type="hidden" :name="label" :value="JSON.stringify(colors)">
    </div><!-- /input-group -->
    <chrome-picker v-model="colors" @change-color="onChange" v-show="open"></chrome-picker>
    <br>
  </div>

</template>

<script>
    import { Chrome } from 'vue-color'
    export default {
        props: ['label', 'color'],
        data () {
          return {
            eyedropper: '',
            open: false,
            colors: {
              hex: '#194d33',
              hsl: {
                h: 150,
                s: 0.5,
                l: 0.2,
                a: 1
              },
              hsv: {
                h: 150,
                s: 0.66,
                v: 0.30,
                a: 1
              },
              rgba: {
                r: 25,
                g: 77,
                b: 51,
                a: 1
              },
              a: 1
            }
          }
        },
        mounted() {
            this.colors = JSON.parse(this.color)
            this.eyedropper = this.getContrast(this.colors)
        },
        components: {
          'chrome-picker': Chrome
        },
        methods: {
          onChange: function (val) {
            this.colors = val
            this.eyedropper = this.getContrast(this.colors)
            console.log(this.eyedropper);
          },
          onFocus: function () {
            alert()
          },
          getContrast: function (colors){
          	return (colors.hsl.l > .6) ? 'black':'white';
          },
          toggle: function () {
            this.open = !this.open
          }
        }
    }
</script>
