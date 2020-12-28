<template>
  <div class="form-group">
    <label :for="id" class="required">Категория</label>
    <div :class="'dropdown w-full ' + (this.show ? 'show' : '')">
      <input type="hidden" :value="selected_category.id" :name="name" :id="id">
      <input autocomplete="off" @blur="closedMenu()" type="text" placeholder="Категория" class="form-control w-full" :name="'search-' + name" v-model="search">
      <div class="dropdown-menu mt-20">
        <h6 class="dropdown-header">Выберите категория</h6>
        <a v-if="categories.length > 0" @click="setCountry(category)" v-for="category in categories" class="dropdown-item pointer-events-auto">{{ category.name }}</a>
        <h5 v-if="categories.length === 0" class="dropdown-header">Нет категорий</h5>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "category",
  data() {
    return {
      show: false,
      search: '',
      categories: [],
      selected_category: {
        id: null,
        name: null
      },
      watcher: null
    }
  },
  props: {
    id: {
      type: String,
    },
    name: {
      type: String,
    },

  },
  created: function () {
    this.watcher = this.$watch('search', function (n, o) {
      this.watcherSearch(n, o)
    })
  },
  methods: {
    closedMenu () {
      if (this.categories.length === 0) {
        this.watcher()
        this.show = false
        this.selected_category = {
          id: null
        }
        this.categories = []
        this.search = ''
        this.watcher = this.$watch('search', function (n, o) {
          this.watcherSearch(n, o)
        })
      }
    },
    setCountry (category) {
      this.watcher()
      this.selected_category = category
      this.show = false
      this.search = category.name
      this.watcher = this.$watch('search', function (n, o) {
        this.watcherSearch(n, o)
      })
    },
    watcherSearch: function(n, o) {
      this.show = true
      axios.post('/api/categories', {
        name: n
      })
        .then(response => {
          this.categories = response.data.categories
        })
    }
  }
}
</script>

<style scoped>

</style>
