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
        uuid: ''
      }
    },
    components: {
      'article-view': require('./views/article-view.vue')
    }
  }
</script>
