import {http} from "../../../service/http_service";

export const get_all_packager = ({commit}) => {
    return http().get('packager').then(res => {
        commit('GET_ALL_PACKAGER', res.data);
    })
};

export const get_packager = ({commit}, data) => {
    return http().get('packager/getData?'+data).then(res => {
        commit('GET_PACKAGER', res.data);
    })
};

export const add_packager = ({commit}, data) => {
    return http().post('packager/store', data).then(res => {
        commit('PACKAGER_STORE', res.data);
    })
};

export const edit_packager = ({commit}, id) => {
    return http().get(`packager/edit/${id}`).then(res => {
        commit('GET_EDIT_PACKAGER', res.data.packager);
    })
};

export const update_packager = ({commit}, {id, data}) => {
    return http().post(`packager/update/${id}`, data).then(res => {
        commit('PACKAGER_UPDATE', res.data);
    })
};

export const delete_packager = ({commit}, id) => {
    return http().delete(`packager/destroy/${id}`).then(res => {
        commit('DELETE_PACKAGER',  {id:id,data:res.data});
    })
};