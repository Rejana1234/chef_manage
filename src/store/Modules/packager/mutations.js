export const GET_ALL_PACKAGER = (state, data) => {
    state.packagers = data.packagers;
};

export const GET_PACKAGER = (state, data) => {
    state.packagers = data.data;
    state.pagination = data.data;
};

export const PACKAGER_STORE = (state, data) => {
    if(state.packagers.push(data)){
        state.success_message = data.message;
    }else {
        state.success_message = '';
    }
};

export const GET_EDIT_PACKAGER = (state, data) => {
    state.packager = data;
};

export const PACKAGER_UPDATE = (state, data) => {
    if (state.packagers.push(data.packager)){
        state.success_message = data.message;
    }else {
        state.success_message = '';
    }
};

export const DELETE_PACKAGER = (state, {id,data}) => {
    if (id){
        state.packagers = state.packagers.filter(item => {
            return item.id !== id;
        });

        state.success_message = data.message
    }else {
        state.success_message = '';
    }
};