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
import VueQrcodeReader from 'vue-qrcode-reader'


Vue.use(Vuex)

Vue.use(VueRouter)

Vue.use(Vuetify)

Vue.use(VueQrcodeReader)


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

//*****************************
//* Recibir                  **
//* Tranferencias componente **
//*****************************

Vue.component('recibir-tansfer', {
  template: `
    <div>
      <v-card>
        <v-card-text>
          <canvas id="canvasQR" width="200" height="200" class="img-responsive center-block img-thumbnail text-center"></canvas>
          <h6>{{ infoUser.wallet }}</h6>
        </v-card-text>
      </v-card>
    </div>
  `,
  mounted: function (){
    this.printQr()
  },
  props: ['info-user'],
  data: () => {
    return {
      url: 'http://localhost:8000/'
    }
  },
  methods: {
    printQr: function (){
      try {
        const qrcode = require('./libs/QRJquery.js');
        $('#canvasQR').qrcode({'text':this.infoUser.wallet});
      } catch (e) {
          console.log('Error incluyendo y pintando el código qr :'+e);
      }

    }
  }
})

Vue.component('enviar-tansfer', {
  template: `
    <div>
    <v-card>
      <v-card-title>Transferir</v-card-title>
      <v-card-text
      v-if="!camera.active"
      justify-center
      align-center
      >
      <img v-if="coin.url" :src="coin.url" />
      <p class="headline text-capitalize">{{coin.name}}</p>
      <p class="subheading text-danger .font-weight-regular.font-italic ">{{ error }}</p>
      <v-tooltip left>
      <v-btn slot="activator" icon large @click="scannerQrSwitch(true)">
        <v-icon large >camera</v-icon>
      </v-btn>
      <span>Leer número de cuenta</span>
    </v-tooltip>
        <v-text-field prepend-icon="person" name="wallet" label="Wallet" type="text" v-model="result"></v-text-field>
        <v-tooltip left>
          <v-btn slot="activator" icon large>
            <v-icon large class="text-info">send</v-icon>
          </v-btn>
          <span>Transferir</span>
        </v-tooltip>
      </v-card-text>
      <v-card-text v-else>
      <qrcode-stream @decode="onDecode" @init="onInit" v-if="!camera.destroyed">
        <div class="loading-indicator" v-if="camera.loading">
          Loading...
        </div>
      </qrcode-stream>
        <p>{{result}}</p>
        <v-tooltip left>
          <v-btn slot="activator" icon large>
            <v-icon large class="text-info" @click="scannerQrSwitch(false)">cancel</v-icon>
          </v-btn>
          <span>Cancelar</span>
        </v-tooltip>
      </v-card-text>
    </v-card>
    </div>
  `,
  mounted: function (){
  },
  props: ['info-user'],
  data: () => {
    return {
      result: '',
      error: '',
      camera: {
        active: false,
        loading: false,
        destroyed: false
      },
      coin: {
        name: '',
        url: ''
      }
    }
  },
  methods: {
    onDecode (result) {
      this.result = result
    },

    async onInit (promise) {
      this.loading = true
      try {
        await promise
      } catch (error) {
        if (error.name === 'NotAllowedError') {
          this.error = "ERROR: you need to grant camera access permisson"
        } else if (error.name === 'NotFoundError') {
          this.error = "ERROR: no camera on this device"
        } else if (error.name === 'NotSupportedError') {
          this.error = "ERROR: secure context required (HTTPS, localhost)"
        } else if (error.name === 'NotReadableError') {
          this.error = "ERROR: is the camera already in use?"
        } else if (error.name === 'OverconstrainedError') {
          this.error = "ERROR: installed cameras are not suitable"
        } else if (error.name === 'StreamApiNotSupportedError') {
          this.error = "ERROR: Stream API is not supported in this browser"
        }
      } finally {
        this.camera.loading = false
      }
    },
    async reload () {
      this.destroyed = true

      await this.$nextTick()

      this.destroyed = false
    },
    scannerQrSwitch: function (status) {
      if (status) {
        this.camera.active = true
        return this.reload()
      }
      return this.camera.active = false
    }
  }
})



const app = new Vue({
    el: '#app',
    components: {
      'qrcode-stream': VueQrcodeReader.QrcodeStream,
      'qrcode-drop-zone': VueQrcodeReader.QrcodeDropZone,
      'qrcode-capture': VueQrcodeReader.QrcodeCapture
    },
    data: {
      drawer: null,
      source: null,
      user: {
        name: 'Ejemplo',
        publicKey: '',
        wallet: '1MoFKJj8DuPuf4HRKzP6UXEtTQA162LgHh'
      }
    }
});
