import { http } from "@/service/http_service";

export const login = ({dispatch}, data) => {
    return http().post('admin_login', data).then(res => {
        dispatch('attempt', res.data.access_token);
        dispatch('setToken', res.data.access_token);
    })
};

export const attempt = ({ commit }, access_token) => {
    if (access_token){
        commit('SET_TOKEN', access_token);
    }else{
        return;
    }
};

// export const access_user = ({commit}, data) => {
//     commit('SET_USER', data);
//     localStorage.setItem('user', data);
// }; 

export const setToken = (_, access_token) => {
    localStorage.setItem('token', access_token);
};

export const logout = ({commit}) => {
    return http().post('logout').then(() => {
        localStorage.removeItem('token');
        commit('SET_TOKEN', null);
    })
};