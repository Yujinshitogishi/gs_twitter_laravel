
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('header-component', require('./components/HeaderComponent.vue'));
// Vue.component('signin-component', require('./components/SigninComponent.vue').default);

import VueRouter from 'vue-router'
Vue.use(VueRouter)

var Signin = {
    template: '#signin'
}

var Signup = {
    template: '#signup'
}

var Email = {
    template: '#email'
}

const router = new VueRouter({
    mode:'history',
    routes:[
        {
            path:'/login',
            component: Signin
        },
        {
            path:'/register',
            component: Signup
        },
        {
            path:'/reset',
            component: Email
        },
        ]
})       

const app = new Vue({
    router: router,
}).$mount('#app');
    

