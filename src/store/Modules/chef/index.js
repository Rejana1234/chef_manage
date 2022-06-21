import state from './state';
import * as getters from '../chef/getters';
import * as mutations from './mutations';
import * as actions from './actions';

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}