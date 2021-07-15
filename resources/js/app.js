/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('home-component', require('./components/HomeComponent.vue').default);
// Vue.component('task-component', require('./components/TaskComponent.vue').default);

// import Vue from 'vue';

Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('add-pokemon', require('./components/AddPokemonComponent.vue').default);
Vue.component('edit-pokemon', require('./components/EditPokemonComponent.vue').default);
Vue.component('show-pokemon', require('./components/ShowPokemonComponent.vue').default);

import Home from './components/HomeComponent.vue';
import Pokemon from './components/PokemonComponent.vue';

const routes = [
  {
    path: '/', 
    component: Home
  },
  {
    path: '/pokemons', 
    component: Pokemon 
  }

];

const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    router: router
    
});
