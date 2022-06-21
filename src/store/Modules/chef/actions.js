import {http} from "../../../service/http_service";

export const get_all_chef = ({commit}) => {
    return http().get('chef').then(res => {
        commit('GET_ALL_CHEF', res.data);
    })
};

export const get_chef = ({commit}, data) => {
    return http().get('chef/getData?'+data).then(res => {
        commit('GET_CHEF', res.data);
    })
};

export const add_chef = ({commit}, data) => {
    return http().post('chef/store', data).then(res => {
        commit('CHEF_STORE', res.data);
    })
};


export const update_chef = ({commit}, {id, data}) => {
    return http().post(`chef/update/${id}`, data).then(res => {
        commit('CHEF_UPDATE', res.data);
    })
};

export const delete_chef = ({commit}, id) => {
    return http().delete(`chef/destroy/${id}`).then(res => {
        commit('DELETE_CHEF',  {id:id,data:res.data});
    })
};