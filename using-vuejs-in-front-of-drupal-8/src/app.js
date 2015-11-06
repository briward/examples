/**
 * Boot up the Vue instance and wire up the router.
 */
var Vue = require('vue')
Vue.use(require('vue-resource'))
var Router = require('director').Router
var app = new Vue(require('./app.vue'))
var router = new Router()

/**
 * Router.
 */
router.on('/articles/:uuid', function (uuid) {
	app.view = 'article-view'
	app.params.uuid = uuid
})

router.init('/')
