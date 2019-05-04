/*
|--------------------------------------------------------------------------
| Mutation Types
|--------------------------------------------------------------------------
*/
export const SET_DATA = 'SET_DATA';
export const UNSET_DATA = 'UNSET_DATA';
export const ADD_ERROR = 'ADD_ERROR';
export const REMOVE_ERROR = 'REMOVE_ERROR';

/*
|--------------------------------------------------------------------------
| Initial State
|--------------------------------------------------------------------------
*/
const initialState = {
  data: null,
  errors: null
};

/*
|--------------------------------------------------------------------------
| Mutations
|--------------------------------------------------------------------------
*/
const mutations = {
	[SET_DATA](state, payload) {
		state.data = payload.data;
  },
  [UNSET_DATA](state) {
		state.data = null;
  },
  [ADD_ERROR](state, payload) {
    state.errors = {...state.errors, [payload.error]: true};
  },
  [REMOVE_ERROR](state, payload) {
    Vue.delete(state.errors, payload.error);
  }
};

/*
|--------------------------------------------------------------------------
| Actions
|--------------------------------------------------------------------------
*/
const actions = {
	setData: (context, data) => {
		context.commit(SET_DATA, {data});
  },
  unsetData: context => {
		context.commit(UNSET_DATA);
  },
  addError: (context, error) => {
		context.commit(ADD_ERROR, {error});
  },
  removeError: (context, error) => {
		context.commit(REMOVE_ERROR, {error});
	}
};

/*
|--------------------------------------------------------------------------
| Getters
|--------------------------------------------------------------------------
*/
const getters = {
	formData: state => {
		return state.data;
  },
  errorsCount: state => {
    if(state.errors)
      return Object.keys(state.errors).length;
    else
      return 0;
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
