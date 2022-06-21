<template>
    <div id="AddPackage">
        <form class="AddPackage-form" v-on:submit.prevent="addPackager">

            <h2>Add Packager</h2>

            <div class="form-group">
                <input type="file" class="box" name="image" v-on:change="attachImage" ref="packagerImage">
                <span v-if="errors.image" class="danger_text">{{errors.image[0]}}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="packagerData.food" name="food" id="food" placeholder="Enter Package Food"
                    class="box">
                <span v-if="errors.food" class="danger_text">{{ errors.food[0] }}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="packagerData.chef_name" name="chef_name" id="chef_name"
                    placeholder="Enter Package chef_name" class="box">
                <span v-if="errors.chef_name" class="danger_text">{{ errors.chef_name[0] }}</span>
            </div>
            <div class="form-group">
                <input type="name" v-model="packagerData.time" name="time" id="time" placeholder="Enter Package time"
                    class="box">
                <span v-if="errors.time" class="danger_text">{{ errors.time[0] }}</span>
            </div>
            <div class="form-group">
                <input type="name" v-model="packagerData.program_name" name="program_name" id="program_name"
                    placeholder="Enter Package program_name" class="box">
                <span v-if="errors.program_name" class="danger_text">{{ errors.program_name[0] }}</span>
            </div>
            <div class="form-group">
                <input type="name" v-model="packagerData.decoration" name="decoration" id="decoration"
                    placeholder="Enter Package decoration" class="box">
                <span v-if="errors.decoration" class="danger_text">{{ errors.decoration[0] }}</span>
            </div>
            <div class="form-group">
                <input type="name" v-model="packagerData.price" name="price" id="price"
                    placeholder="Enter Package Price" class="box">
                <span v-if="errors.price" class="danger_text">{{ errors.price[0] }}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="packagerData.status" name="status" id="status"
                    placeholder="Enter Package Status" class="box">
                <span v-if="errors.status" class="danger_text">{{ errors.status[0] }}</span>
            </div>

            <div class="button">
                <div>
                    <router-link to="/dashboard/package">
                        <button type="button"> Back </button>
                    </router-link>
                    <button type="submit"> Save </button>
                </div>
            </div>

        </form>
    </div>
</template>

<script>

import { mapState } from 'vuex';

export default {
    name: 'AddPackage',

    data() {
        return {
            packagerData: {
                image:'',
                food: '',
                chef_name: '',
                time: '',
                program_name: '',
                decoration: '',
                price: '',
                status: '',
            },
            
            errors: {}
        }
    },

    computed: {
        ...mapState({
            message: state => state.packagers.success_message
        })
    },

    watch: {

    },

    mounted() {

    },
    
    methods: {

            attachImage: function () {
                //to use some file todo
                this.packagerData.image = this.$refs.packagerImage.files[0];
                let reader = new FileReader();
                reader.addEventListener('load', function () {
                    this.$refs.newCategoryImageDisplay.src = reader.result;
                }.bind(this), false);
                reader.readAsDataURL(this.file);
            },
        addPackager: async function () {
            try {
                let formData = new FormData();
                formData.append('image', this.packagerData.image);
                formData.append('food', this.packagerData.food);
                formData.append('chef_name', this.packagerData.chef_name);
                formData.append('time', this.packagerData.time);
                formData.append('program_name', this.packagerData.program_name);
                formData.append('decoration', this.packagerData.decoration);
                formData.append('price', this.packagerData.price);
                formData.append('status', this.packagerData.status);
                

                await this.$store.dispatch('packagers/add_packager', formData).then(() => {
                    this.$swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: this.message,
                        showConfirmButton: false,
                        timer: 1500
                    });

                    console.log('add packagers');

                    this.packagerData = {};
                })
            } catch (e) {
                switch (e.response.status) {
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
#AddPackager {
    display: flex;
    justify-content: center;
    margin-top: 100rem;
}

.AddPackager-form {
    width: 95%;
    position: absolute;
    text-align: center;
    top: 20%;
    padding: 2rem;
    border-radius: .5rem;
    background: #eee;
    box-shadow: var(--box-shadow);
}

.AddPackager-form h2 {
    display: flex;
    justify-content: left;
}

.AddPackager-form .box {
    width: 100%;
    margin: .7rem 0;
    background: rgb(252, 250, 252);
    border-radius: .5rem;
    padding: 1rem;
    font-size: 1rem;
    color: var(--black);
    text-transform: none;
}

.AddPackager-form p {
    font-size: 1.4rem;
    padding: .5rem 0;
    color: var(--light-color);
}

.AddPackager-form p a {
    color: var(--orange);
    text-decoration: underline;
}

button {
    padding: 7px 7px;
    background-color: rgb(59, 155, 59);
    margin-right: 2%;

}

button:hover {
    background: var(--orange);
    color: #fff;
}

.button {
    margin-left: 89%;
}

::placeholder {
    font-size: 12px;
}
</style>

