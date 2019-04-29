import Vue from 'vue';
import VueToastr from '@deveodk/vue-toastr'
import axios from 'axios';
import * as VueGoogleMaps from 'vue2-google-maps';
import router from './router';
import store from './store/index';
import App from './components/App.vue';
import jwtToken from './helpers/jwt-token';

window.axios = axios;

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

axios.interceptors.request.use(config => {
	config.headers['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
	config.headers['X-Requested-With'] = 'XMLHttpRequest';

	if (jwtToken.getToken()) {
		config.headers['Authorization'] = 'Bearer ' + jwtToken.getToken();
	}

	return config;
}, error => {
	return Promise.reject(error);
});

axios.interceptors.response.use(response => {
	return response;
}, error => {
	let errorResponseData = error.response.data;

	const errors = ["token_invalid", "token_expired", "token_not_provided"];

	if (errorResponseData.error && errors.includes(errorResponseData.error)) {
		store.dispatch('unsetAuthUser')
			.then(() => {
				jwtToken.removeToken();
				router.push({name: 'login'});
			});
	}

	return Promise.reject(error);
});

Vue.component('app', App);

const app = new Vue({
	router,
	store
}).$mount('#app');
