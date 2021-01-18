import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    cart: {
      items: [],
      products: []
    },
    currency: {},
    currency_id: 1,
    auth: false,
    user: null,
  },
  mutations: {
    addItem: (state, {id, amount}) => {
      let item = state.cart.items.find(el => el.id === id )
      if (item) {
        item.amount += amount
      } else {
        state.cart.items.push({id: id, amount: amount})
      }
    },
    setProducts: (state, products) => {
      state.cart.products = products
    },
    removeItem: (state, id) => { state.cart.items = state.cart.items.filter( e => e.id !== id ) },
    clearCart: (state) => {state.cart.items = []},
    currency: (state, item) => {
      state.currency = item
      state.currency_id = item.id
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
  actions: {
    set_currency: ({commit, state}, data) => {
      window.axios.post('/api/set-currency', {
        user_id: state.user ? state.user.id : null,
        currency_id: data.currency.id
      })
        .then (response => {
          commit('currency', response.data)
        })
        .catch(error => {
          alert(error.response.data)
        })
    }
  },
  plugins: [createPersistedState()],
});

export default store
