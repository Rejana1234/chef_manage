<template>
    <div id="login">
        <form action="" class="login-form">
            <img src="../../assets/My project.png" alt="Logo" width="100" height="100"><br><br>
            <!-- <h1 class="login_heading">Login now</h1> -->

            <input type="email" name="email" id="" placeholder="Enter email" class="box">
            <input type="password" name="password" id="" placeholder="Enter password" class="box">
            <p>Forget password ? <a href="/forget-password">Click here</a></p>
            <p>Don't have an account <a href="#">Create new</a></p>
            <input type="submit" value="login now" class="btn">
        </form>
    </div>
</template>

<script>
export default{
    name : 'BarcLogin'
}
</script>

<style scoped>
#login{
    display: flex;
    justify-content: center;
}
.login_heading{
    text-align: center;
    font-size: 2rem;
}
.login-form{
    width: 40rem;
    position: absolute;
    text-align: center;
    top: 10%;
    padding: 2rem;
    border-radius: .5rem;
    background: rgb(164, 232, 171);
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