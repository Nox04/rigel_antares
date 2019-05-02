import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import store from './store/index';
import routes from './routes';

const router = new VueRouter({
	mode: 'history',
	routes
});

router.beforeEach(async (to, from, next) => {
	// just logged in: localStorage has token, but state does not have auth user
	if (window.localStorage.getItem('laravel-jwt-auth') && !store.getters.isLoggedIn) {
    const {data: authUser} = await axios.get('auth/user');
		await store.dispatch('setAuthUser', authUser.data);
	}

	if (to.meta.requiresAuth) {
		if (store.getters.isLoggedIn)
			return next();
		else
			return next({name: 'index'});
	}

	if (to.meta.requiresGuest) {
		if (store.getters.isLoggedIn)
			return next({name: 'map'});
		else
			return next();
	}
	next();
});

export default router;
