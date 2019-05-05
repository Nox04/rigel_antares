/*
|--------------------------------------------------------------------------
| Mutation Types
|--------------------------------------------------------------------------
*/
export const SET_DATA = 'SET_DATA';
export const UNSET_DATA = 'UNSET_DATA';
export const ADD_ERROR = 'ADD_ERROR';
export const REMOVE_ERROR = 'REMOVE_ERROR';
export const SET_UPDATING = 'SET_UPDATING';
export const RESET_ERRORS = 'RESET_ERRORS';

/*
|--------------------------------------------------------------------------
| Initial State
|--------------------------------------------------------------------------
*/
const initialState = {
  data: {},
  errors: null,
  updating: false
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
		state.data = {};
  },
  [ADD_ERROR](state, payload) {
    state.errors = {...state.errors, [payload.error]: true};
  },
  [REMOVE_ERROR](state, payload) {
    if(state.errors)
      Vue.delete(state.errors, payload.error);
  },
  [SET_UPDATING](state, payload) {
    state.updating = payload.updating;
  },
  [RESET_ERRORS](state, payload) {
    state.errors = null;
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
  },
  setUpdating: (context, updating) => {
    context.commit(SET_UPDATING, {updating});
  },
  resetErrors: context => {
    context.commit(RESET_ERRORS);
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
  },
  fieldsCount: state => {
    if(state.data)
      return Object.keys(state.data).length;
    else
      return 0;
  },
  updating: state => {
		return state.updating;
  },
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
