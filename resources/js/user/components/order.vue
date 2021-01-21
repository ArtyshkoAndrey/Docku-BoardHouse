<template>

</template>

<script>
export default {
  name: "order",
  data () {
    return {
      info: {
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
      },
      company: null
    }
  },
  mounted () {
    this.$nextTick(() => {
      this.info.phone     = $('#phone').val()
      this.info.email     = $('#email').val()
      this.info.name      = $('#name').val()
      this.info.address   = $('#address').val()
      this.info.post_code = $('#post_code').val()
    })
  },
  methods: {
    setCountry (country) {
      this.info.country = country
    },

    setCity (city) {
      this.info.city = city
    },

    setName (event) {
      this.info.name = event.target.value
    },

    setEmail (event) {
      this.info.email = event.target.value
    },
    setPhone (event) {
      this.info.phone = event.target.value
    },

    setAddress (event) {
      this.info.address = event.target.value
    },

    setPostCode(event) {
      this.info.post_code = event.target.value
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
    },
    disabledButton () {
      let disabled = false
      for (let key in this.info) {
        console.log(!this.info[key] || this.info[key] === '')
        if (!this.info[key] || this.info[key] === '')
          disabled = true
      }

      if(!this.transfer.name || !this.company || !this.info.country.id || !this.info.city.id)
        disabled = true

      return disabled
    }
  },
  watch: {
    'info.country': {
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
