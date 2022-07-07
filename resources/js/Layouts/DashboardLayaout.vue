<template>
<!-- Navbar -->
<Navbar></Navbar>
<!-- Side Bar -->
<div class="">
    <SideBar></SideBar>
    <!-- Contain -->
    <section class="flex justify-center w-full">
        <div class="w-full ml-64 px-16 py-10">
            <div class="w-full flex">
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
        page : String
    }

}
</script>
