
<template>
  <div>
    <PopupRegisterVue @rigisterForm = "RegisterAcount"></PopupRegisterVue>
    <div style="position: sticky; top: 0; z-index: 10;">
  <div class="content" style="width: 100%;">
  <header class="navbar navbar-expand-lg navbar-light bg-light" style="background: linear-gradient(90deg, #722CB3 30%, #C49BE9);">
  <div class="container-fluid px-5 py-2">
    <img src="../assets/image62.png" alt="" style="padding-right: 100px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 20px; font-weight: bold;">
            All location
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
            <li v-for="location in shopLocation" :key="location.id"><a class="dropdown-item" :href="`/shop/${location.id}`">{{ location.Province }}</a></li>
          </ul>
        </li>
      </ul>
      <div v-if="!AuthUSer.user" class="btn-class" style="width: 200px; display: flex; justify-content: space-between;">
        <a type="button" class="btn btn-lg text-white" data-bs-toggle="modal" data-bs-target="#exampleModal" href="/" style="background: #691BA5; font-weight: bold;">Login</a>
        <a type="button" class="btn btn-lg text-white" data-bs-toggle="modal" data-bs-target="#popupRegister" href="/register" style="background: #FFD800; font-weight: bold;">Register</a>
      </div>
      
      <div class="dropdown ms-1 ms-lg-0 " v-if="AuthUSer.user" >
        <a class="avatar avatar-sm p-0 d-flex  align-items-center" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
          <h4 class="text-warning">Hi_</h4>
          <h4> {{ AuthUSer.user.first_name  }}</h4>
					<img v-if="AuthUSer.user.profile == null" class="avatar-img rounded-circle" src="../assets/3135715.png" alt="avatar" height="60" style="margin: 8px;">
					<img v-else class="avatar-img rounded-circle" :src="AuthUSer.user.profile" alt="avatar" height="60" style="margin: 8px; width: 60px; border-radius: 100%;">
				</a>
				<ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3" aria-labelledby="profileDropdown">
					<!-- Profile info -->
					<li class="px-3">
						<div class="d-flex align-items-center">
							<!-- Avatar -->
							<div class="avatar me-3">
								<img v-if="AuthUSer.user.profile == null" class="avatar-img rounded-circle shadow" src="../assets/3135715.png" alt="avatar" height="40">
								<img v-else class="avatar-img shadow" :src="AuthUSer.user.profile" alt="avatar" height="40" width="40" style="border-radius: 50%;">
							</div>
							<div>
								<a class="h6" href="#">{{ AuthUSer.user.first_name }} {{ AuthUSer.user.last_name }}</a>
								<p class="small m-0">{{ AuthUSer.user.email }}</p>
							</div>
						</div>
						<hr>
					</li>
					<!-- Links -->
					<li><a class="dropdown-item" href="/view/profile/user"><i class="bi bi-person fa-fw me-2"></i>Edit Profile</a></li>
					<li><a class="dropdown-item" href="/history"><i class="bi bi-person fa-fw me-2"></i>My borrow</a></li>
					<li><a class="dropdown-item" href="/view/profile/user"><i class="bi bi-gear fa-fw me-2"></i>Account Settings</a></li>
					<li><a class="dropdown-item" href="/rentDetail"><i class="bi bi-info-circle fa-fw me-2"></i>Help</a></li>
					<li><button class="dropdown-item bg-danger-soft-hover" @click ="LogUot"><i class="bi bi-power fa-fw me-2"></i>Sign Out</button></li>
				</ul>
			</div>
    </div>
  </div>
</header>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 60px;background: white; box-shadow: 4px 16px 17px -19px rgba(0,0,0,0.45);">
  <div class="container-fluid px-5 py-2">
    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="width: 30%; display: flex; justify-content: space-between; align-items: center;">
        <li class="nav-item"><a href="/home">Home</a></li>
        <li class="nav-item"><a href="/service">Products</a></li>
        <li class="nav-item"><a href="/aboutUs">About Us</a></li>
    </ul>
    <li v-if="AuthUSer.user" class="nav-item" style="list-style-type: none; margin-right: 10px;"><a href="/favorite">
      <img src="../assets/image 23.png" alt="" />

    </a></li>
    <li v-if="AuthUSer.user" class="nav-item" style="list-style-type: none;">
      <!-- <a href="/message"><Icon icon="wpf:message-outline" width="52" height="40"  style="color: #940065" /></a> -->
      <a href="/message">
        <img src="../assets/photo_2024-07-15_08-28-51-removebg-preview.png" width="65" alt="">
      </a>
    </li>
    <li v-if="AuthUSer.user" class="nav-item" style="list-style-type: none;">
      <!-- <a href="/message"><Icon icon="wpf:message-outline" width="52" height="40"  style="color: #940065" /></a> -->
      <a href="/message">
        <Icon icon="mingcute:notification-fill" width="40" height="40"  style="color: #a90475"></Icon>
      </a>
    </li>
  </div>
</nav>
</div>
</div>
  </div>
</template>
<script >
import { Icon } from '@iconify/vue'
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'
import {useAuthStore} from '@/stores/auth-store.ts'
import PopupRegisterVue from '@/Components/homepage/PopupRegister.vue'
import { User } from '@element-plus/icons-vue'
export default {
  components : {
      PopupRegisterVue
  },
  data (){
    return {
      AuthUSer: useAuthStore(), 
      router : useRouter(),
      shopLocation: []

    }
  },
  mounted() {
    this.fectShopLocation()
  },
  methods : {
    async RegisterAcount(data) {
      try {
        const  response  = await axiosInstance.post('/register', data);
        localStorage.setItem('access_token', response.data.access_token)
        this.router.push('/')
      } catch (error) {
        alert (error.message)
        console.error("Error creating category:", error);
      }
    },
    async LogUot(){
      try {
        const  response  = await axiosInstance.post('/logout');
        localStorage.setItem('access_token', response.data.access_token)
        location.reload()
      } catch (error) {
        alert (error.message)
        console.error("Error creating category:", error);
      }
    },

    async fectShopLocation(){
      try {
        const response = await axiosInstance.get('/shop');
        this.shopLocation = response.data.data;
      } catch (error) {
        console.error("Error fetching shop location:", error);
      }
    }
  }
}

</script>

<style scoped>
a{
  text-decoration: none;
  color: black;
  font-size: 20px;
  font-weight: bold;
}

.dropdown > ul > li > a,
button {
  font-size: 15px;
  font-weight: 400;
}
</style>
  
