
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//Vue.component('index-component', require('./components/IndexComponent.vue'));

/*const app = new Vue({
    el: '#app'
});*/
import IndexComponent from './components/IndexComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import EditComponent from './components/EditComponent.vue';
import DeleteComponent from './components/DeleteComponent.vue';
import ShowComponent from './components/ShowComponent.vue';


const routes = [
    {path: '/', components: {IndexComponent: IndexComponent}},
    {path: '/create', component: CreateComponent, name: 'createPaper'},
    {path: '/edit/:id', component: EditComponent, name: 'editPaper'},
    {path: '/delete/:id', component: DeleteComponent, name: 'deletePaper'},
    {path: '/show/:id', component: ShowComponent, name: 'showPaper'},
   
]

const router = new VueRouter({ routes })

const app = new Vue({ router }).$mount('#app')
 