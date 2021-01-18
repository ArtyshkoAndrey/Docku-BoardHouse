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
        if (item.amount + amount === 0) {
          store.commit('removeItem', item.id)
        } else {
          item.amount += amount
        }
      } else {
        state.cart.items.push({id: id, amount: amount})
        window.axios.post('/api/products', {
          products_skuses_ids: state.cart.items.map(el => el.id)
        })
          .then(response => {
            store.commit('setProducts', response.data)
          })
          .catch(error => {
            alert(error.response.data)
          })
      }
    },
    setProducts: (state, products) => {
      state.cart.products = products
    },
    removeItem: (state, id) => {
      state.cart.items = state.cart.items.filter( e => e.id !== id )
      state.cart.products = state.cart.products.filter( e => {
        return !e.product_skuses.some(sk => sk.id === id)
      })
    },
    clearCart: (state) => {
      state.cart.items = []
      state.cart.products = []
    },
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
      return state.cart.products.reduce((sum, item) => {
        return sum + (item.on_sale ? Number(item.price_sale) : Number(item.price)) * store.getters.itemByProduct(item).amount
      }, 0) * state.currency.ratio;
    },
    auth: state => {
      return state.auth;
    },
    itemByProduct: state => product => {
      return state.cart.items.find(el => product.product_skuses.some(sk => sk.id === el.id) )
    }
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
