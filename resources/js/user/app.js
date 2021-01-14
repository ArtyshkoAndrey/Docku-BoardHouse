/*
 * Copyright (c) 2020. Данный файл является интелектуальной собственостью Fulliton.
 * Я буду рад если вы будите вносить улучшения, всегда жду ваших пул реквестов
 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import * as mdb from 'mdb-ui-kit'
require('./bootstrap.js')

window.Vue = require('vue');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./components', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import store from "./store";
Vue.config.productionTip = false

Vue.config.devtools = true;
Vue.config.performance = true;

const app = new Vue({
  el: '#app',
  store: store,
  // delimiters: ['<%', '%>'],
  data() {
    return {
      test: !process.env.NODE_ENV || process.env.NODE_ENV === 'development'
    }
  },
  async created () {
    await axios.post('auth/check')
      .then(response => {

        this.$store.commit('auth', response.data)

        this.test ? console.log('Auth bool server', response.data) : null
      })
      .catch(response => {
        console.error(response)
      })

    await axios.post('api/currency/' + this.$store.state.currency_id)
      .then(response => {
        this.$store.commit('currency', response.data)

        this.test ? console.log('Server return currency', response.data) : null
      })
      .catch(error => {
        alert(error.response.data.error)
      })
  }
});
