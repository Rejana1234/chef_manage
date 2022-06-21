<template>
    <div id="EditCoupon">
        <form class="EditCoupon-form" v-on:submit.prevent="editCoupon">
            <h2>Edit Coupon</h2>
            <div class="form-group">
                <input type="name" v-model="editCouponList.title" name="title" id="title"
                    placeholder="Enter Coupon Title" class="box">

            </div>
            <div class="form-group">
                <input type="name" v-model="editCouponList.code" name="code" id="code" placeholder="Enter Coupon Code"
                    class="box">
            </div>

            <div class="form-group">
                <input type="name" v-model="editCouponList.price" name="price" id="price"
                    placeholder="Enter Coupon Price" class="box">

            </div>
            <div class="form-group">
                <input type="name" v-model="editCouponList.status" name="status" id="status"
                    placeholder="Enter Coupon Status" class="box">

            </div>


            <div class="button">
                <div>
                    <router-link to="/dashboard/coupon">
                        <button type="button"> Back </button>
                    </router-link>
                    <button type="submit"> Edit </button>
                </div>

            </div>

        </form>
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'MyEditCoupon',

        data(){
            return{
                errors: {}
            }
        },

        computed: {
            ...mapState({
                editCouponList: state => state.coupons.coupon,
                message: state => state.coupon.success_message
            })
        },

        mounted(){
            this.getEditCoupon(this.$route.params.id);
        },

        methods: {
            ...mapActions({
                getEditCoupon: 'coupons/edit_coupon'
            }),

            editCoupon: async function(){
                try {
                    let id = this.$route.params.id;
                    let formData = new FormData();

                    formData.append('title', this.editCouponList.title);
                    formData.append('code', this.editCouponList.code);
                    formData.append('price', this.editCouponList.price);
                    formData.append('status', this.editCouponList.status);
                    formData.append('_method', 'PUT');

                    await this.$store.dispatch('coupons/update_coupon', {id:id, data:formData}).then(() => {
                        this.$swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: this.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.getEditCoupon(this.$route.params.id);
                    })

                }catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>

<style scoped>
    .AddCoupon-form{
        width: 96rem;
        position: absolute;
        text-align: center;
        top: 20%;
        padding: 2rem;
        border-radius: .5rem;
        background:#eee;
        box-shadow: var(--box-shadow);
    }
    .AddCoupon-form h2{
        display: flex;
        justify-content: left;
    }
    .AddCoupon-form .box{
        width: 100%;
        margin: .7rem 0;
        background: rgb(252, 250, 252);
        border-radius: .5rem;
        padding: 1rem;
        font-size: 1rem;
        color: var(--black);
        text-transform: none;
    }

    .AddCoupon-form p{
        font-size: 1.4rem;
        padding: .5rem 0;
        color: var(--light-color);
    }

    .AddCoupon-form p a{
        color: var(--orange);
        text-decoration: underline;
    }


    button {
        padding: 7px 7px;
        background-color: rgb(59, 155, 59);
        margin-right: 2%;

    }

    button:hover{
        background: var(--orange);
        color: #fff;
    }
    .button{
        margin-left: 89%;
    }
    ::placeholder{
        font-size: 12px;
    }

#EditCoupon{
    display: flex;
    justify-content: center;
    margin-top: 100rem;
}

.EditCoupon-form{
    width: 95%;
    position: absolute;
    text-align: center;
    top: 20%;
    padding: 2rem;
    border-radius: .5rem;
    background:#eee;
    box-shadow: var(--box-shadow);
}
.EditCoupon-form h2{
    display: flex;
    justify-content: left;
}
 .EditCoupon-form .box{
    width: 100%;
    margin: .7rem 0;
    background: rgb(252, 250, 252);
    border-radius: .5rem;
    padding: 1rem;
    font-size: 1rem;
    color: var(--black);
    text-transform: none;
}

.EditCoupon-form p{
    font-size: 1.4rem;
    padding: .5rem 0;
    color: var(--light-color);
}

.EditCoupon-form p a{
    color: var(--orange);
    text-decoration: underline;
}

button {
  padding: 7px 7px;
  background-color: rgb(59, 155, 59);
  margin-right: 2%;
  
}

button:hover{
    background: var(--orange);
    color: #fff;
}
.button{
    margin-left: 89%;
}
::placeholder{
    font-size: 12px;
}

</style>