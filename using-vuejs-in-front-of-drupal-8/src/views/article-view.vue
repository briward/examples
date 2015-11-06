<template>
    <div class="post full">
      <article class="post-content">
        <div class="wrap">
          <h1 v-text="page.title"></h1>
        </div>
        <span v-html="page.body"></span>
      </article>
    </div>
</template>

<script>
  module.exports = {
    props: ['params'],
    data: function () {
      return {
        page: {
          title: '',
          body: ''
        }
      }
    },
    ready: function() {
      this.fetchPage(this.params.uuid)
    },
    methods: {
      fetchPage: function(uuid) {
        this.$http.get('/api/v1.0/articles/' + uuid + '?_format=hal_json', function (article) {
          this.$set('article', article)
        })
      }
    }
  }
</script>
