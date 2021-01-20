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
        store.dispatch('getProducts')
      }
      store.dispatch('updateAuthCart')
    },
    setProducts: (state, products) => {
      state.cart.products = products
    },
    removeItem: (state, id) => {
      state.cart.items = state.cart.items.filter( e => e.id !== id )
      state.cart.products = state.cart.products.filter( e => {
        return !e.product_skuses.some(sk => sk.id === id)
      })
      store.dispatch('updateAuthCart')
      store.dispatch('getProducts')
    },
    clearCart: (state) => {
      state.cart.items = []
      state.cart.products = []
      store.dispatch('updateAuthCart')
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
      store.dispatch('getCartItems')
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
    },
    updateAuthCart: ({commit, state}) => {
      if (state.auth) {
        window.axios.post('/api/update-cart', {
          auth: state.auth,
          user_id: state.user.id,
          products_skuses: state.cart.items
        })
          .then(response => {
            console.log(response.data)
          })
          .catch(error => {
            alert(error.response.data)
          })
      }
    },
    getCartItems: ({commit, state}) => {
      window.axios.post('/api/cart-items-auth', {
        user_id: state.user.id
      })
        .then(response => {
          state.cart.items = []
          state.cart.products = []
          response.data.forEach(item => {
            state.cart.items.push({id: item.product_sku_id, amount: item.amount})
          })
          store.dispatch('getProducts')
        })
    },
    getProducts: ({commit, state}) => {
      console.log(state.cart.items.map(el => el.id))
      window.axios.post('/api/products', {
        products_skuses_ids: state.cart.items.map(el => el.id)
      })
        .then(response => {
          commit('setProducts', response.data)
        })
        .catch(error => {
          alert(error.response.data)
        })
    }
  },
  plugins: [createPersistedState()],
});

export default store
