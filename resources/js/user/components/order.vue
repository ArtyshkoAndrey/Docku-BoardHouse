<template>

</template>

<script>
export default {
  name: "order",
  data () {
    return {
      data: {
        country: {
          id: null,
          name: null
        },
        city: {
          id: null,
          name: null,
          pickup: null
        },
        phone: null,
        name: null,
        email: null,
        address: null,
        post_code: null,
      },
      code: null,         // Промокод
      sale: false,        // Былали скидка
      price_with_sale: 0, // Скидка в тенге
      transfer: {
        price: 0,
        name: null
      }
    }
  },
  mounted () {
    this.$nextTick(() => {
      this.data.phone     = $('#phone').val()
      this.data.email     = $('#email').val()
      this.data.name      = $('#name').val()
      this.data.address   = $('#address').val()
      this.data.post_code = $('#post_code').val()
    })
  },
  methods: {
    setCountry (country) {
      this.data.country = country
    },

    setCity (city) {
      this.data.city = city
    },

    setName (event) {
      this.data.name = event.target.value
    },

    setEmail (event) {
      this.data.email = event.target.value
    },
    setPhone (event) {
      this.data.phone = event.target.value
    },

    setAddress (event) {
      this.data.address = event.target.value
    },

    setPostCode(event) {
      this.data.post_code = event.target.value
    },

    setPickupTransfer () {
      this.transfer = {
        price: 0,
        name: 'pickup'
      }
    },

    resetTransfer () {
      this.transfer = {
        price: 0,
        name: null
      }
    }
  },
  computed: {
    price () {
      return this.$store.getters.priceAmount + (-this.price_with_sale + this.transfer.price) * this.$store.state.currency.ratio
    }
  },
  watch: {
    'data.country': {
      handler: function (after, before) {
        this.resetTransfer()
      },
      deep: true
    }
  }
}
</script>

<style scoped>

</style>
