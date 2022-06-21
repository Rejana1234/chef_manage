import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

//import root-vuex
import state from './state'
import * as getters from './getters'
import * as mutations from './mutations'
import * as actions from './actions'

//import modules

import coupons from './Modules/coupon';
import packagers from './Modules/packager';
import chefs from './Modules/chef';

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions,

    modules: {
        coupons,
        packagers,
        chefs,
    }
})