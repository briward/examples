<template>
  <div id="latest">
    <div class="wrap">
      <ul class="pure-g">
        <li class="pure-u-1">
          <div class="post teaser" v-repeat="articles">
            <h2><a class="post-link" href="#{{ path }}" v-html="title"></a></h2>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  module.exports = {
    data: function () {
      return {
        articles: {}
      }
    },
    ready: function() {
      this.fetchArticles()
    },
    methods: {
      fetchArticles: function() {
        this.$http.get('http://api.briward.site/articles', function (articles) {
          this.$set('articles', articles)
        })
      }
    }
  }
</script>
