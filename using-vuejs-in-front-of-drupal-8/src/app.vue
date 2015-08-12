<template>
    <component is="{{ view }}"
               class="view"
               params="{{ params }}"
               v-transition
               transition-mode="out-in">
    </component>
</template>

<script>
  module.exports = {
    el: '#app',
    data: {
      view: '',
      params: {
        url: ''
      }
    },
    components: {
      'home-view': require('./views/home-view.vue'),
      'page-view': require('./views/page-view.vue')
    }
  }
</script>
