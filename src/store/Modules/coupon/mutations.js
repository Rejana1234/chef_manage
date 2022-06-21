export const GET_ALL_COUPON = (state, data) => {
    state.coupons = data.coupons;
};

export const GET_COUPON = (state, data) => {
    state.couponss = data.data.data;
    state.pagination = data.data;
};

export const COUPON_STORE = (state, data) => {
    if(state.coupons.push(data)){
        state.success_message = data.message;
    }else {
        state.success_message = '';
    }
};

export const GET_EDIT_COUPON = (state, data) => {
    state.coupon = data;
};

export const COUPON_UPDATE = (state, data) => {
    if (state.coupons.push(data.coupon)){
        state.success_message = data.message;
    }else {
        state.success_message = '';
    }
};

export const DELETE_COUPON = (state, {id,data}) => {
    if (id){
        state.coupons = state.coupons.filter(item => {
            return item.id !== id;
        });

        state.success_message = data.message
    }else {
        state.success_message = '';
    }
};