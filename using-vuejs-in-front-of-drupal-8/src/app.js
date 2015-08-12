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
router.on('/', function () {
	app.view = 'home-view'
})

router.on('/:page', function (url) {
	app.view = 'page-view'
	app.params.url = url
})

router.init('/')
