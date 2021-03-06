/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue';
import Toaster from 'v-toaster';
import 'v-toaster/dist/v-toaster.css';
import Vuelidate from 'vuelidate';


Vue.use(Vuelidate);

// import fontawesome from '@fortawesome/fontawesome';
// import faSolid from '@fortawesome/fontawesome-free-solid';

Vue.use(Toaster, {timeout: 5000});

require('./bootstrap');

window.Vue = require('vue');

// Vue.toasted.show(`${fontawesome.icon(faSolid.faCoffee).html} Hello`, {
//   type: 'success',
//   duration: 3000
// });

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
Vue.component('product-component', require('./components/Product.vue').default);
Vue.component('category-component', require('./components/Category.vue').default);
Vue.component('display-product', require('./components/DisplayProducts.vue').default);
Vue.component('edit-product', require('./components/EditProduct.vue').default);
Vue.component('order-component', require('./components/Order.vue').default);
Vue.component('order-display', require('./components/Order_display.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    // router: router,
});
