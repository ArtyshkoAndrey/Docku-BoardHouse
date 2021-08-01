<template>
  <button class="btn btn-outline-dark btn-to-cart w-100 mt-2 mt-md-0" style="transition: .2s;"
          :style="check ? 'background-color: #2D89DE!important; border-color: #2D89DE!important; color: white!important;' : null"
          @click="addItem">
    <i class="bx bx-cart"></i>
    <span>{{ label }}</span>
  </button>
</template>

<script>
export default {
  name: "btn-product",
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
