<template>
    <div id="AddCoupon">
        <form class="AddCoupon-form" v-on:submit.prevent="addCoupon">

            <h2>Add Coupon</h2>

            <div class="form-group">
                <input type="name" v-model="couponData.title" name="title" id="title" placeholder="Enter Coupon Title"
                    class="box">
                <span v-if="errors.title" class="danger_text">{{errors.title[0]}}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="couponData.code" name="code" id="code" placeholder="Enter Coupon Code"
                    class="box">
                <span v-if="errors.code" class="danger_text">{{errors.code[0]}}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="couponData.price" name="price" id="price" placeholder="Enter Coupon Price"
                    class="box">
                <span v-if="errors.price" class="danger_text">{{errors.price[0]}}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="couponData.status" name="status" id="status"
                    placeholder="Enter Coupon Status" class="box">
                <span v-if="errors.status" class="danger_text">{{errors.status[0]}}</span>
            </div>

            <div class="button">
                <div>
                    <router-link to="/dashboard/coupon">
                        <button type="button"> Back </button>
                    </router-link>
                    <button type="submit"> Save </button>
                </div>
            </div>

        </form>
    </div>
</template>

<script>

import {mapState} from 'vuex';

export default {
    name: 'AddCoupon',

   data() {
     return {
       couponData:{
           title: '',
           code: '',
           price: '',
           status: ''
       },

        errors: {}
     }
   },

   computed: {
       ...mapState({
           message: state => state.coupons.success_message
       })
   },

   watch: {
     
   },

   mounted() {
     
   },

   methods: {
       addCoupon: async function(){
           try {
               let formData = new FormData();
               formData.append('title', this.couponData.title);
               formData.append('code', this.couponData.code);
               formData.append('price', this.couponData.price);
               formData.append('status', this.couponData.status);

               await this.$store.dispatch('coupons/add_coupon', formData).then(() => {
                   this.$swal.fire({
                       toast: true,
                       position: 'top-end',
                       icon: 'success',
                       title: this.message,
                       showConfirmButton: false,
                       timer: 1500
                   });

                console.log('add coupons');

                   this.couponData = {};
               })
           }catch (e) {
               switch (e.response.status)
               {
                   case 422:
                       this.errors = e.response.data.errors;
                       break;
                   default:
                       this.$swal.fire({
                           icon: 'error',
                           text: 'Oops',
                           title: e.response.data.error,
                       });
                       break;
               }

            console.log(e);
           }
       }
   }
};
</script>

<style scoped>

#AddCoupon{
    display: flex;
    justify-content: center;
    margin-top: 100rem;
}

.AddCoupon-form{
    width: 95%;
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

</style>