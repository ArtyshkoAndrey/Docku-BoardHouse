<template>
  <button class="btn btn-dark btn-to-cart mt-2 mt-md-0" style="transition: .2s;"
          :style="check ? 'background-color: #27c300!important; border-color: #27c300!important; color: white!important;' : null"
          @click="addItem">
    <span>{{ label }}</span>
    <i class="bx bx-cart-alt"></i>
  </button>
</template>

<script>
export default {
  name: "btn-product-show",
  data: () => {
    return {
      check: false
    }
  },
  props: {
    id: Number,
    label: String
  },
  methods: {
    addItem () {
      this.$store.commit('addItem', {id: this.id, amount: 1});
      this.check = true;
      setTimeout(()=> {
        this.check = false
      }, 500)
    }
  }
}
</script>

<style scoped>
</style>
