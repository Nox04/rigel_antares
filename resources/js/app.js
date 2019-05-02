/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

import VueToastr from '@deveodk/vue-toastr';
import * as VueGoogleMaps from 'vue2-google-maps';
import router from './router';
import store from './store/index';
import App from './components/App.vue';
import VueAuth from '@websanova/vue-auth';
import VueAxios from 'vue-axios';
import VueRouter from 'vue-router';
import auth from './auth';
import {apiDomain} from './config';


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueToastr, {
  defaultPosition: 'toast-bottom-right',
  defaultType: 'success',
  defaultTimeout: 3000
});

Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyBVzxYskKUvuoV68FulOZBOee2VXnaKgvM',
    libraries: 'places'
  }
});

Vue.router = router;
Vue.use(VueRouter);

Vue.use(VueAxios, axios);
axios.defaults.baseURL = apiDomain;
Vue.use(VueAuth, auth);

axios.interceptors.response.use(response => {
	return response;
}, error => {
	const errorResponseData = error.response.data;
	const errors = ["token_invalid", "token_expired", "token_not_provided", "Unauthorized"];
	if (errorResponseData.error && errors.includes(errorResponseData.error)) {
		store.dispatch('unsetAuthUser')
			.then(() => {
        window.localStorage.removeItem('laravel-jwt-auth');
				router.push({name: 'index'});
			});
	}
	return Promise.reject(error);
});

Vue.component('app', App);

const app = new Vue({
  router,
	store
}).$mount('#app');
