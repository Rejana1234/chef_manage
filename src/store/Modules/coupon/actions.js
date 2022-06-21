import {http} from "../../../service/http_service";

export const get_all_coupon = ({commit}) => {
    return http().get('coupon').then(res => {
        commit('GET_ALL_COUPON', res.data);
    })
};

export const get_coupon = ({commit}, data) => {
    return http().get('coupon/getData?'+data).then(res => {
        commit('GET_COUPON', res.data);
    })
};

export const add_coupon = ({commit}, data) => {
    return http().post('coupon/store', data).then(res => {
        commit('COUPON_STORE', res.data);
    })
};

export const edit_coupon = ({commit}, id) => {
    return http().get(`coupon/edit/${id}`).then(res => {
        commit('GET_EDIT_COUPON', res.data.coupon);
    })
};

export const update_coupon = ({commit}, {id, data}) => {
    return http().post(`coupon/update/${id}`, data).then(res => {
        commit('COUPON_UPDATE', res.data);
    })
};

export const delete_coupon = ({commit}, id) => {
    return http().delete(`coupon/destroy/${id}`).then(res => {
        commit('DELETE_COUPON',  {id:id,data:res.data});
    })
};