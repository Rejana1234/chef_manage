<template>
    <div id="EditUser">
        <form class="EditUser-form" v-on:submit.prevent="editUser">
            <h2>Edit User</h2>
            <div class="form-group">
                <input type="name" v-model="editUserList.name" name="name" id="name" placeholder="Enter User Name" class="box">

            </div>
            <div class="form-group">
                <input type="name" v-model="editUserList.email" name="email" id="email" placeholder="Enter Your Email" class="box">
            </div>

            <div class="form-group">
                <input type="name" v-model="editUserList.dob" name="dob" id="dob" placeholder="Enter Your DOB" class="box">

            </div>
            <div class="form-group">
                <input type="name" v-model="editUserList.p_no" name="p_no" id="p_no" placeholder="Enter Your Phone number" class="box">
            </div>
            <div class="form-group">
                <input type="name" v-model="editUserList.address" name="address" id="address" placeholder="Enter your Address" class="box">
            </div>

            <div class="form-group">
                <input type="name" v-model="editUserList.password" name="password" id="password" placeholder="Enter The Password" class="box">

            </div>
            <div class="form-group">
                <input type="name" v-model="editUserList.con_password" name="con_password" id="con_password" placeholder="Enter Con_Password Name(BN)" class="box">
            </div>

            <div class="button">
                <level>
                    <router-link to="/dashboard/user">
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
        name: 'MyEditUser',

        data(){
            return{
                errors: {}
            }
        },

        computed: {
            ...mapState({
                editUserList: state => state.user.user,
                message: state => state.user.success_message
            })
        },

        mounted(){
            this.getEditUser(this.$route.params.id);
        },

        methods: {
            ...mapActions({
                getEditUser: 'user/edit_user'
            }),

            editUser: async function(){
                try {
                    let id = this.$route.params.id;
                    let formData = new FormData();

                    formData.append('name', this.editUserList.name);
                    formData.append('email', this.editUserList.email);
                    formData.append('dob', this.editUserList.dob);
                    formData.append('p_no', this.editUserList.p_no);
                    formData.append('address', this.editUserList.address);
                    formData.append('password', this.editUserList.password);
                    formData.append('con_password', this.editUserList.con_password);
                    formData.append('_method', 'PUT');

                    await this.$store.dispatch('user/update_user', {id:id, data:formData}).then(() => {
                        this.$swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: this.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        this.getEditUser(this.$route.params.id);
                    })

                }catch (e) {
                    console.log(e);
                }
            }
        }
    }
</script>

<style scoped>
    .AddUser-form{
        width: 96rem;
        position: absolute;
        text-align: center;
        top: 20%;
        padding: 2rem;
        border-radius: .5rem;
        background:#eee;
        box-shadow: var(--box-shadow);
    }
    .AddUser-form h2{
        display: flex;
        justify-content: left;
    }
    .AddUser-form .box{
        width: 100%;
        margin: .7rem 0;
        background: rgb(252, 250, 252);
        border-radius: .5rem;
        padding: 1rem;
        font-size: 1rem;
        color: var(--black);
        text-transform: none;
    }

    .AddUser-form p{
        font-size: 1.4rem;
        padding: .5rem 0;
        color: var(--light-color);
    }

    .AddUser-form p a{
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

#EditUser{
    display: flex;
    justify-content: center;
    margin-top: 100rem;
}

.EditUser-form{
    width: 95%;
    position: absolute;
    text-align: center;
    top: 20%;
    padding: 2rem;
    border-radius: .5rem;
    background:#eee;
    box-shadow: var(--box-shadow);
}
.EditUser-form h2{
    display: flex;
    justify-content: left;
}
 .EditUser-form .box{
    width: 100%;
    margin: .7rem 0;
    background: rgb(252, 250, 252);
    border-radius: .5rem;
    padding: 1rem;
    font-size: 1rem;
    color: var(--black);
    text-transform: none;
}

.EditUser-form p{
    font-size: 1.4rem;
    padding: .5rem 0;
    color: var(--light-color);
}

.EditUser-form p a{
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