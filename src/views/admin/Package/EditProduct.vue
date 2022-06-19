<template>
    <div id="EditProduct">
        <form class="EditProduct-form" v-on:submit.prevent="editProduct">
            <h2>Edit Product</h2>
            <div class="form-group">
                <input type="name" v-model="editProductList.product_name" name="product_name" id="product_name" placeholder="Enter Product Name" class="box">

            </div>
            <div class="form-group">
                <input type="name" v-model="editProductList.stoke" name="stoke" id="stoke" placeholder="Enter Product Stok details" class="box">
            </div>

            <div class="form-group">
                <input type="name" v-model="editProductList.details" name="details" id="details" placeholder="Enter Product Details" class="box">

            </div>
            <div class="form-group">
                <input type="name" v-model="editProduct.time_date" name="time_date" id="time_date" placeholder="Enter Product Duration" class="box">
            </div>
            <div class="form-group">
                <input type="name" v-model="editProduct.price" name="price" id="price" placeholder="Enter Product Price" class="box">
            </div>

            <div class="button">
                <level>
                    <router-link to="/dashboard/product">
                        <button type="button"> Back </button>
                    </router-link>
                </level>

                <level>
                    <button type="submit"> Edit </button>
                </level>
            </div>

        </form>
    </div>
</template>

<script>
    import {mapState, mapActions} from 'vuex';

    export default {
        name: 'MyEditProduct',

        data(){
            return{
                errors: {}
            }
        },

        computed: {
            ...mapState({
                editProductList: state => state.product.product,
                message: state => state.product.success_message
            })
        },

        mounted(){
            this.getEditProduct(this.$route.params.id);
        },

        methods: {
            ...mapActions({
                getEditProduct: 'product/edit_product'
            }),

            editCountry: async function(){
                try {
                    let id = this.$route.params.id;
                    let formData = new FormData();

                    formData.append('product_name', this.editProductList.product_name);
                    formData.append('stoke', this.editProductList.stoke);
                    formData.append('details', this.editProductList.details);
                    formData.append('time_date', this.editProductList.time_date);
                    formData.append('price', this.editProductList.price);

                    formData.append('_method', 'PUT');

                    await this.$store.dispatch('product/update_product', {id:id, data:formData}).then(() => {
                        this.$swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: this.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.getEditProduct(this.$route.params.id);
                    })

                }catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>

<style scoped>
    .AddProduct-form{
        width: 96rem;
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

#EditProduct{
    display: flex;
    justify-content: center;
    margin-top: 100rem;
}

.EditProduct-form{
    width: 95%;
    position: absolute;
    text-align: center;
    top: 20%;
    padding: 2rem;
    border-radius: .5rem;
    background:#eee;
    box-shadow: var(--box-shadow);
}
.EditProduct-form h2{
    display: flex;
    justify-content: left;
}
 .EditProduct-form .box{
    width: 100%;
    margin: .7rem 0;
    background: rgb(252, 250, 252);
    border-radius: .5rem;
    padding: 1rem;
    font-size: 1rem;
    color: var(--black);
    text-transform: none;
}

.EditProduct-form p{
    font-size: 1.4rem;
    padding: .5rem 0;
    color: var(--light-color);
}

.EditProduct-form p a{
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