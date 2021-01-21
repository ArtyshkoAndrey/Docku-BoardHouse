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
      this.data.phone = $('#phone').val()
      this.data.email = $('#email').val()
      this.data.name = $('#name').val()
      this.data.address = $('#address').val()
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
    }
  },
  computed: {
    price () {
      return this.$store.getters.priceAmount + (-this.price_with_sale + this.transfer.price) * this.$store.state.currency.ratio
    }
  }
}
</script>

<style scoped>
  /* Анимации появления и исчезновения могут иметь */
  /* различные продолжительности и динамику.       */
  .slide-fade-enter-active {
    transition: all .1s ease;
  }
  .slide-fade-leave-active {
    transition: all .3s cubic-bezier(1.0, 0.5, 0.8, 1.0);
  }
  .slide-fade-enter, .slide-fade-leave-to
    /* .slide-fade-leave-active до версии 2.1.8 */ {
    transform: translateX(10px);
    opacity: 0;
  }
</style>
