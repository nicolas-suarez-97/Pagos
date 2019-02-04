'use strict'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// index.js or main.js
import 'vuetify/dist/vuetify.min.css' // Ensure you are using css-loader

import 'material-design-icons-iconfont/dist/material-design-icons.css'

window.Vue = require('vue');
import Vuex from 'vuex'
import Vuetify from 'vuetify'
import VueRouter from 'vue-router'
import WebFontLoader from 'webfontloader'


Vue.use(Vuex)

Vue.use(VueRouter)

Vue.use(Vuetify)



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('recibir-tansfer', {
  template: `
    <div>
      <v-card>
        <v-card-title>Transferir a {{aliado.name}}</v-card-title>
        <v-card-text>
          <canvas id="canvasQR" width="200" height="200" class="img-responsive center-block img-thumbnail text-center"></canvas>
        </v-card-text>
      </v-card>
    </div>
  `,
  mounted: function (){
    this.printQr()
  },
  data: () => {
    return {
      aliado: {
        name: 'Ejemplo',
        publicKey: '',
        wallet: ''
      }
    }
  },
  methods: {
    printQr: function (){
      alert('ok')
    }
  }
})

const app = new Vue({
    el: '#app',
    data: {
      drawer: null,
      source: null,
      wallet: 'cris'
    }
});
