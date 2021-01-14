/*
 * Copyright (c) 2020. Данный файл является интелектуальной собственостью Fulliton.
 * Я буду рад если вы будите вносить улучшения, всегда жду ваших пул реквестов
 */

import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    cart: {
      items: []
    },
    currency: {},
    currency_id: 1,
    auth: false,
    user: null,
  },
  mutations: {
    addItem: (state, ProductSkus) => {state.cart.items.push(ProductSkus)},
    removeItem: (state, id) => { state.cart.items = state.cart.items.filter( e => e.id !== id ) },
    clearCart: (state) => {state.cart.items = []},
    currency: (state, item) => {
      state.currency = item
      state.currency_id = item.id
    },
    set_currency: (state, item) => {
      if (state.auth) {
        axios.post('api/set-currency', {
          user_id: state.user.id,
          currency_id: item.id
        })
          .then (response => {
            state.currency = response.data
            state.currency_id = item.id
          })
          .catch(error => {
            alert(error.response.data)
          })
      } else {
        state.currency_id = item.id
      }
    },
    auth: (state, {auth, user}) => {
      state.auth = auth
      state.user = user
      if (state.currency_id === null)
        state.currency_id = 1
      state.currency_id = user ? user.currency_id ?? state.currency_id : state.currency_id
    },
  },
  getters: {
    items: state => {
      return state.cart.items;
    },
    priceAmount: state => {
      return state.cart.items.reduce((sum, item) => {
        return sum + (item.on_sale ? Number(item.price_sale) : Number(item.price))
      }, 0) * state.currency.ratio;
    },
    auth: state => {
      return state.auth;
    },
  },
  plugins: [createPersistedState()],
});

export default store
