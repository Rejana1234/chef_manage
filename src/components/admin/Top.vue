<template>
   <div id="top_bar">
     <nav>
			<i class='bx bx-menu toggle-sidebar'  @click="$emit('Toggle')"></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<a href="#" class="nav-link">
				<i class='bx bxs-bell icon' ></i>
				<span class="badge">5</span>
			</a>
			<a href="#" class="nav-link">
				<i class='bx bxs-message-square-dots icon' ></i>
				<span class="badge">8</span>
			</a>
			<span class="divider"></span>
			<div class="profile" >
				<img src="../../assets/chef_logo.jpg" alt="" @click="profileDropdown()">
				<ul class="profile-link"  v-bind:class="{show: isshow}">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="#"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li><a href="#" v-on:click="logout"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
    </nav>
   </div>
</template>
<script>
export default {
   name: 'MyTop',
   props: ['isShow'],

   data() {
        return {
            isshow: this.isShow
        };
   },

   methods: {
        profileDropdown() {
            this.isshow = !this.isshow;
        },

		logout: async function(){
			try{
				await this.$store.dispatch('logout').then(() => {
					this.$router.push({ name: 'Login'});
				})
			}catch(e){
				console.log(e);
			}
		}
    },
   
};
</script>
<style lang='' scoped>
</style>