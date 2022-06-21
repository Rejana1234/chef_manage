<template>
    <div id="AddChef">
        <form class="AddChef-form" v-on:submit.prevent="addChef">

            <h2>Add Chef</h2>

            <div class="form-group">
                <input type="file" class="box" name="image" v-on:change="attachImage" ref="chefImage">
                <span v-if="errors.image" class="danger_text">{{ errors.image[0] }}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="chefData.name" name="name" id="name" placeholder="Enter chef name"
                    class="box">
                <span v-if="errors.name" class="danger_text">{{ errors.name[0] }}</span>
            </div>

            <div class="form-group">
                <input type="name" v-model="chefData.experience" name="experience" id="experience"
                    placeholder="Enter Experience" class="box">
                <span v-if="errors.experience" class="danger_text">{{ errors.experience[0] }}</span>
            </div>
           

            <div class="button">
                <div>
                    <router-link to="/dashboard/chef">
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
    name: 'AddChef',

    data() {
        return {
            chefData: {
                image: '',
                name: '',
                experience: '',
            },

            errors: {}
        }
    },

    computed: {
        ...mapState({
            message: state => state.chefs.success_message
        })
    },

    watch: {

    },

    mounted() {

    },

    methods: {

        attachImage: function () {
            //to use some file todo
            this.chefData.image = this.$refs.chefImage.files[0];
            let reader = new FileReader();
            reader.addEventListener('load', function () {
                this.$refs.newCategoryImageDisplay.src = reader.result;
            }.bind(this), false);
            reader.readAsDataURL(this.file);
        },
        addChef: async function () {
            try {
                let formData = new FormData();
                formData.append('image', this.chefData.image);
                formData.append('name', this.chefData.name);
                formData.append('experience', this.chefData.experience);
                

                await this.$store.dispatch('chefs/add_chef', formData).then(() => {
                    this.$swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: this.message,
                        showConfirmButton: false,
                        timer: 1500
                    });

                    console.log('add chefs');

                    this.chefData = {};
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
#AddChef {
    display: flex;
    justify-content: center;
    margin-top: 100rem;
}

.AddChef-form {
    width: 95%;
    position: absolute;
    text-align: center;
    top: 20%;
    padding: 2rem;
    border-radius: .5rem;
    background: #eee;
    box-shadow: var(--box-shadow);
}

.AddChef-form h2 {
    display: flex;
    justify-content: left;
}

.AddChef-form .box {
    width: 100%;
    margin: .7rem 0;
    background: rgb(252, 250, 252);
    border-radius: .5rem;
    padding: 1rem;
    font-size: 1rem;
    color: var(--black);
    text-transform: none;
}

.AddChef-form p {
    font-size: 1.4rem;
    padding: .5rem 0;
    color: var(--light-color);
}

.AddChef-form p a {
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

