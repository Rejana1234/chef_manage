<template>
     <section id="sidebar" v-bind:class="{hide: this.isActive}">
		<a  class="brand"><i class='bx bxs-smile icon'></i> CMS </a>
		<div class="sidebar-avartar">
                          <div>
                               <img src="../../assets/chef_logo.jpg" width="70px" height="70px" alt=""  >
                          </div>
                          <div class="avartar-info">
                              <div class="avartar-text">
                                 <h4>alpha ron</h4>
                                <small>123-456-909</small>
                             </div>
                           <span class="bx bx-chevron-down icon"></span>
                         </div>
                    </div>
		<ul class="side-menu">
			<li>
				<router-link active-class="active" to="/dashboard" exact><i class='bx bxs-chart icon' ></i> Home </router-link>
			</li>
			<li class="divider" data-text="location">Quick Menu</li>
			<li>
				<ul>
					<li>
						<router-link active-class="active" to="/dashboard/user" ><i class='bx bxs-chart icon' ></i> Users</router-link>
					</li>

					<li>
						<router-link active-class="active" to="/dashboard/chef"><i class='bx bxs-chart icon' ></i> Chefs</router-link></li>
					<li>
						<router-link active-class="active" to="/dashboard/product"><i class='bx bxs-chart icon' ></i>Products</router-link>
					</li>
					<li>
					<router-link active-class="active" to="/dashboard/coupon"><i class='bx bxs-chart icon' ></i>Coupons</router-link>
					</li>

					<li>
						<router-link active-class="active" to="/dashboard/package"><i class='bx bxs-chart icon' ></i> Packages </router-link>
					</li>


					

				</ul>
			</li>
			
			<li class="divider" data-text="location"> Notifications </li>
			<li>
			<ul >
					<li>
						<router-link active-class="active" to="/dashboard/season"><i class='bx bxs-chart icon' ></i> Mail </router-link>
					</li> 
					<li>
						<router-link active-class="active" to="/dashboard/land_preperation"><i class='bx bxs-chart icon' ></i> Message </router-link>
					</li>
			</ul>
			</li>
			
			<li class="divider" data-text="location">Setting </li>
			<li>
				<ul>
					<li>
						<router-link active-class="active" to="/dashboard/department"><i class='bx bxs-chart icon' ></i> Department</router-link>
					</li>
				</ul>
			</li>
			<li class="divider" data-text="location">User Management </li>
			<li>
				<ul>
					<li><a href="#"><i class='bx bxs-chart icon' ></i> User List</a></li>
					<li><a href="#"><i class='bx bxs-chart icon' ></i> Role</a></li>
					<li><a href="#"><i class='bx bxs-chart icon' ></i> Permissions</a></li>
				</ul>
			</li>
			
		</ul>
	</section>
   
</template>

<script>
export default {
   name: 'MySidebar',
   props: ['isActive']
};
</script>
<style lang='' scoped>
</style>