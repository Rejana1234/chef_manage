<template>
    <div id="AddProduct">
        <form class="AddProduct-form" v-on:submit.prevent="addProduct">

             <h2>Add Product</h2>

            <div class="form-group">
                <input type="name" v-model="productData.product_name" name="product_name" id="product_name" placeholder="Enter Product Name" class="box">
                <span v-if="errors.product_name" class="danger_text">{{errors.product_name[0]}}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="productData.stoke" name="stoke" id="stoke" placeholder="Enter Stoke Details" class="box">
                <span v-if="errors.stoke" class="danger_text">{{errors.stoke[0]}}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="productData.details" name="details" id="details" placeholder="Enter Product Details" class="box">
                <span v-if="errors.details" class="danger_text">{{errors.details[0]}}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="productData.time_date" name="time_date" id="time_date" placeholder="Enter Time_date Status" class="box">
                <span v-if="errors.time_date" class="danger_text">{{errors.time_date[0]}}</span>
            </div>
            <div class="form-group">
                <input type="name" v-model="productData.price" name="price" id="price" placeholder="Enter Product Price" class="box">
                <span v-if="errors.price" class="danger_text">{{errors.price[0]}}</span>
            </div>

            <div class="button">
                <div>
                    <router-link to="/dashboard/product">
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
    name: 'AddProduct',

   components: {
     
   },

   data() {
     return {
       productData:{
           product_name: '',
           stoke: '',
           details: '',
           time_date: '',
           price:''
       },

        errors: {}
     }
   },

   computed: {
       ...mapState({
           message: state => state.product.success_message
       })
   },

   watch: {
     
   },

   mounted() {
     
   },

   methods: {
       addProduct: async function(){
           try {
               let formData = new FormData();
               formData.append('product_name', this.productData.product_name);
               formData.append('stoke', this.productData.stoke);
               formData.append('details', this.productData.details);
               formData.append('time_date', this.productData.time_date);
               formData.append('price', this.productData.price);

               await this.$store.dispatch('product/add_product', formData).then(() => {
                   this.$swal.fire({
                       toast: true,
                       position: 'top-end',
                       icon: 'success',
                       title: this.message,
                       showConfirmButton: false,
                       timer: 1500
                   });

                   this.productData = {};
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
           }
       }
   }
};
</script>

<style scoped>

#AddProduct{
    display: flex;
    justify-content: center;
    margin-top: 100rem;
}

.AddProduct-form{
    width: 95%;
    position: absolute;
    text-align: center;
    top: 20%;
    padding: 2rem;
    border-radius: .5rem;
    background:#eee;
    box-shadow: var(--box-shadow);
}
.AddProduct-form h2{
    display: flex;
    justify-content: left;
}
 .AddProduct-form .box{
    width: 100%;
    margin: .7rem 0;
    background: rgb(252, 250, 252);
    border-radius: .5rem;
    padding: 1rem;
    font-size: 1rem;
    color: var(--black);
    text-transform: none;
}

.AddProduct-form p{
    font-size: 1.4rem;
    padding: .5rem 0;
    color: var(--light-color);
}

.AddProduct-form p a{
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