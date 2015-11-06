<template>
    <div class="post full">
      <article class="post-content">
        <div class="wrap">
          <h1 v-text="article.title"></h1>
        </div>
        <span v-html="article.body"></span>
      </article>
    </div>
</template>

<script>
  module.exports = {
    props: ['params'],
    data: function () {
      return {
        article: {
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
        console.log('fetching')
        this.$http.get('/api/v1.0/articles/' + uuid + '?_format=json', function (article) {
          this.$set('article', article)
        })
      }
    }
  }
</script>
