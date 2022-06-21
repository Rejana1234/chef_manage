export const GET_ALL_CHEF = (state, data) => {
    state.chefs = data.chefs;
};

export const GET_CHEF = (state, data) => {
    state.chefs = data.data;
    state.pagination = data.data;
};

export const CHEF_STORE = (state, data) => {
    if(state.chefs.push(data)){
        state.success_message = data.message;
    }else {
        state.success_message = '';
    }
};


export const DELETE_CHEF = (state, {id,data}) => {
    if (id){
        state.chefs = state.chefs.filter(item => {
            return item.id !== id;
        });

        state.success_message = data.message
    }else {
        state.success_message = '';
    }
};