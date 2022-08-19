<template>
<!-- Navbar -->
<Navbar :user="user"></Navbar>
<!-- Side Bar -->
<div class="">
    <SideBar :user="user"></SideBar>
    <!-- Contain -->
    <section class="flex justify-center w-full min-h-screen bg-[#ebeef2]">
        <div class="w-full ml-64 px-16 py-14">
            <div class="w-full flex mt-[52px]">
                <!-- <Category v-if = 'page == "Category" '></Category> -->
                <slot />
            </div>
        </div>
    </section>
</div>
</template>
<script>
// import Category from '../Components/Dashboard/Category.vue';
import SideBar from '../Components/Dashboard/SideBar.vue'
import Navbar from '../Components/Dashboard/Navbar.vue'
export default {
    components : {
        SideBar,
        Navbar
    },
    props : {
        title : String,
        page : String,
        user :Object,
    }

}
</script>
