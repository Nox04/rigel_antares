import Vue from 'vue';
import Vuex from 'vuex';
import auth from './modules/auth';
import form from './modules/form';

Vue.use(Vuex);

export default new Vuex.Store({
	modules: {
    auth,
    form
	},
	strict: true
});
