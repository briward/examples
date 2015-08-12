<template>
    <div class="post full">
      <article class="post-content">
        <div class="wrap">
          <h1 v-text="page.title"></h1>
          <div class="date" v-text="page.created"></div>
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
          body: '',
          created: ''
        }
      }
    },
    ready: function() {
      this.fetchPage(this.params.url)
    },
    methods: {
      fetchPage: function(url) {
        this.$http.get('http://api.briward.site/' + url + '?_format=json', function (page) {
          this.$set('page', {
            title: page.title[0].value,
            body: page.body[0].value,
            created: page.created[0].value
          })
        })
      }
    }
  }
</script>