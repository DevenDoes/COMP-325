
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('papers', require('./components/Paper/Papers.vue').default);
Vue.component('paper', require('./components/Paper/Paper.vue').default);
Vue.component('newpaper', require('./components/Paper/NewPaper.vue').default);
Vue.component('paperdetails', require('./components/Paper/PaperDetails.vue').default);
Vue.component('papercontent', require('./components/Paper/PaperContent.vue').default);
Vue.component('papernav', require('./components/Paper/PaperNav.vue').default);
Vue.component('paperelements', require('./components/Paper/PaperElements.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.prototype.$eventBus = new Vue()
const app = new Vue({
    el: '#app'
});
