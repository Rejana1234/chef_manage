
<template>
    <div id="ResetPassword">
        <form action="" class="ResetPassword-form">
            
            <img src="../../assets/chef_logo.jpg" alt="Logo" width="100" height="100"><br><br>
            <!-- <h1>Reset Password</h1> -->
 
            <div class="form-group">
                <input type="password" name="password" id="" placeholder="New password" class="box">
                <input type="password" name="password" id="" placeholder="Confirm password" class="box">
                <button type="button" name="Submit" value="Save" class="btn btn-danger" ><i class="livicon" data-n="pen" data-s="16" data-c="#fff" data-hc="0" ></i> Save</button>
                <button type="reset" name="Reset" value="Clear" class="btn btn-primary"><i class="livicon" data-n="trash" data-s="16" data-c="#fff" data-hc="0"></i> Clear</button>
            </div>
 
        </form>
    </div>
</template>

<script>
export default {
    name: 'ResetPassword'
   ,
   components: {
     
   },
   data() {
     return {
       
     }
   },
   computed: {
     
   },
   watch: {
     
   },
   mounted() {
     
   },
   methods: {
     
   }
};
</script>

<style scoped>
#ResetPassword{
    display: flex;
    justify-content: center;
}
.login_heading{
    text-align: center;
    font-size: 2rem;
}
.ResetPassword-form{
    width: 40rem;
    position: absolute;
    text-align: center;
    top: 15%;
    padding: 2rem;
    border-radius: .5rem;
    background: rgb(207, 164, 232);
    box-shadow: var(--box-shadow);
}

 .ResetPassword-form .box{
    width: 100%;
    margin: .7rem 0;
    background: rgb(252, 250, 252);
    border-radius: .5rem;
    padding: 1rem;
    font-size: 1rem;
    color: var(--black);
    text-transform: none;
}

.ResetPassword-form p{
    font-size: 1rem;
    padding: .5rem 0;
    color: var(--light-color);
}

.ResetPassword-form p a{
    color: var(--orange);
    text-decoration: underline;
}

.btn{
    margin-top: 1rem;
    margin-left: 1rem;
    display: inline-block;
    padding: .5rem 2rem;
    font-size: 1rem;
    border-radius: .5rem;
    border: .2rem solid var(--black);
    color: var(--black);
    cursor: pointer;
    background: rgb(242, 242, 248);
}

.btn:hover{
    background: var(--orange);
    color: #fff;
}
</style>

