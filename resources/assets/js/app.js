
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./glyphicons');

window.moment = require('moment');
window.Vue = require('vue');
window.VueTimepicker = require('vue2-timepicker');




/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

Vue.component('passport-clients', require('./components/Clients.vue'));

Vue.component('passport-authorized-clients', require('./components/AuthorizedClients.vue'));

Vue.component('passport-personal-access-tokens', require('./components/PersonalAccessTokens.vue'));




