/*
|--------------------------------------------------------------------------
| Mutation Types
|--------------------------------------------------------------------------
*/
export const SET_USER = 'SET_USER';
export const UNSET_USER = 'UNSET_USER';

/*
|--------------------------------------------------------------------------
| Initial State
|--------------------------------------------------------------------------
*/
const initialState = {
	name: 'Invitado',
	email: null
};

/*
|--------------------------------------------------------------------------
| Mutations
|--------------------------------------------------------------------------
*/
const mutations = {
	[SET_USER](state, payload) {
		state.name = payload.user.name;
		state.email = payload.user.email;
	},
	[UNSET_USER](state, payload) {
		state.name = '';
		state.email = null;
	}
};

/*
|--------------------------------------------------------------------------
| Actions
|--------------------------------------------------------------------------
*/
const actions = {
	setAuthUser: (context, user) => {
		context.commit(SET_USER, {user});
	},
	unsetAuthUser: context => {
		context.commit(UNSET_USER);
	}
};

/*
|--------------------------------------------------------------------------
| Getters
|--------------------------------------------------------------------------
*/
const getters = {
	isLoggedIn: state => {
		return !!(state.name && state.email);
  },
  username: state => {
		return state.name;
	}
};

/*
|--------------------------------------------------------------------------
| Export the module
|--------------------------------------------------------------------------
*/
export default {
	state: initialState,
	mutations,
	actions,
	getters
}
