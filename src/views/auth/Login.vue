<template>
    <div id="login">
        <form action="" class="login-form" v-on:submit.prevent="login">
            <img src="../../assets/chef_logo.jpg" alt="Logo" width="100" height="200"><br><br>

            <input type="text" v-model="loginData.email" name="email" id="email"
                placeholder="Enter user email" class="box">
            <input type="password" v-model="loginData.password" name="password" id="password"
                placeholder="Enter password" class="box">
            <p>Forget password ? <a href="/forget-password">Click here</a></p>
            <p>Don't have an account <a href="#">Create new</a></p>
            <input type="submit" value="login now" class="btn">
        </form>
    </div>
</template>

<script>
export default{
    name : 'CMSLogin',
    data(){
        return{
            loginData: {
                email: '',
                password: ''
            }
        }
    },

    methods: {
        login: async function()
        {
            try{
                let formData = new FormData();

                formData.append('email', this.loginData.email);
                formData.append('password', this.loginData.password);

                await this.$store.dispatch('login', formData).then(() => {
                    this.$router.push({path: '/dashboard'});
                    this.loginData = {};
                });

            }catch(e){
                console.log(e);
            }
        }
    }


}
</script>

<style scoped>

#login{
    display: flex;
    justify-content: center;
    background-image: url(../../assets/chef_bg.jpg);
}
.login_heading{
    text-align: center;
    font-size: 2rem;
}
.login-form{
    width: 40rem;
    position: absolute;
    text-align: center;
    top: 20%;
    padding: 2rem;
    border-radius: .5rem;
    background: rgb(218, 164, 232);
    box-shadow: var(--box-shadow);
}

.login-form .box{
    width: 100%;
    margin: .7rem 0;
    background: #eee;
    border-radius: .5rem;
    padding: 1rem;
    font-size: 1rem;
    color: var(--black);
    text-transform: none;
}

.login-form p{
    font-size: 1.4rem;
    padding: .5rem 0;
    color: var(--light-color);
}

.login-form p a{
    color: var(--orange);
    text-decoration: underline;
}

.btn{
    margin-top: 1rem;
    display: inline-block;
    padding: .8rem 3rem;
    font-size: 1.4rem;
    border-radius: .5rem;
    border: .2rem solid var(--black);
    color: var(--black);
    cursor: pointer;
    background: none;
}

.btn:hover{
    background: var(--orange);
    color: #fff;
}
</style>