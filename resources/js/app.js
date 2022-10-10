/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//import router from './routes'
window.VueRouter = require('vue-router').default;

window.VueAxios = require('vue-axios').default;

window.Axios = require('axios').default;

//let AppLayout = require('./components/App.vue');

const listPost = Vue.component('list-post', require('./components/ListPost.vue').default);
const viewPost = Vue.component('view-post', require('./components/ViewPost.vue').default);
const editPost = Vue.component('edit-post', require('./components/EditPost.vue').default);
const deletePost = Vue.component('delete-post', require('./components/DeletePost.vue').default);
const addPost = Vue.component('add-post', require('./components/AddPost.vue').default);

//define the vue route
const routes = [
{
    name: "listPost",
    path: "/",
    component: listPost
},{
    name: "viewPost",
    path: "/view-post/:id",
    component: viewPost
},{
    name: "editPost",
    path: "/edit-post/:id",
    component: editPost
},{
    name: "deletePost",
    path: "/post-delete",
    component: deletePost
},{
    name: "addPost",
    path: "/add-post",
    component: addPost
},]

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//register modules
Vue.use(VueRouter,VueAxios,axios);
const router = new VueRouter({ mode: 'history', routes: routes});

new Vue(
    Vue.util.extend(
        { router }
        )
    ).$mount('#app')