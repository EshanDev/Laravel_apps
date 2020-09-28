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

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});







/* Sidebar */
let sidebar_btn = document.getElementById('toggleBTN'),
    body = document.getElementById('body'),
    sidebar_content = document.getElementById('Sidebar');

sidebar_btn.addEventListener('click', function(e) {
    body.classList.toggle('position-left');
    sidebar_content.classList.toggle('isClose');
    e.target.classList.toggle('change');
    e.stopPropagation();
});

sidebar_content.addEventListener('click', function(e) {
    e.stopPropagation();
});

document.addEventListener('click', function(e) {
    sidebar_content.classList.add('isClose');
    body.classList.remove('position-left');
});