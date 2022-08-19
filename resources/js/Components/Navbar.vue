<template>
<nav class="navbar-flat bg-transparant top-0 left-0 right-0 fixed z-50 px-4 py-4 flex justify-between items-center">
    <a class="text-3xl font-bold leading-none" href="#">
        <img src="/storage/images/logo/rect59901.png" alt="" class="h-10 inline">
        <div class="text-[#798e48] inline logo-text">
            Desa Bancang
        </div>
    </a>
    <div class="lg:hidden absolute right-0" @click="isHiddenNavbar = !isHiddenNavbar">
        <button class="navbar-burger flex items-center text-black p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="list-menu hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
        <li>
            <Link :href="route('home')" class="text-sm text-white font-bold hover:text-slate-200">Beranda</Link>
        </li>
        <li>
            <Link :href="route('home')" class="text-sm text-white font-bold hover:text-slate-200">Profil Desa</Link>
        </li>
        <li>
            <Link :href="route('front.posts.index')" class="text-sm text-white font-bold hover:text-slate-200">Artikel</Link>
        </li>
        <li>
            <Link @click="submit" class="text-sm text-white font-bold hover:text-slate-200">Data Desa</Link>
        </li>
        <li><a class="text-sm text-white font-bold hover:text-slate-200" href="#">Kontak</a></li>
    </ul>
    <div v-show="role!='guard'" class="lg:flex hidden items-center md:order-2 relative ">
        <button @click="isHiddenProfileMenu = !isHiddenProfileMenu" type="button" class="photo-user flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
            <RemixIcon v-show="user.path_profile_photo==null" :icon="'user-fill'" :class="'rounded-full bg-gray-500 w-8 h-8 fill-white p-1'"></RemixIcon>
            <div v-show="user.path_profile_photo!=null" class="w-8 h-8 rounded-full bg-gray-500 bg-cover bg-center" :style="'background-image: url('+ user.path_profile_photo +');'"></div>
        </button>

        <div v-show="!isHiddenProfileMenu" class="z-50 absolute top-4 right-0 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
            <div class="py-3 px-4">
                <span class="block text-sm text-gray-900 dark:text-white"> {{ user.name }} </span>
                <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ user.email }}</span>
            </div>
            <ul class="py-1">
                <li v-show="role!='user'">
                    <Link href="/dashboard" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</Link>
                </li>
                <li @click="isHiddenAccountSetting = false" v-show="role=='user'">
                    <button class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</button>
                </li>
                <li>
                    <Link  @click.prevent="logout()" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</Link>
                </li>
            </ul>
        </div>
        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
            <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
    <div v-show="role=='guard'">
        <Link :href="route('login')" class="hidden lg:inline-block lg:ml-auto lg:mr-3 py-2 px-6 bg-gray-50 hover:bg-gray-100 text-sm text-gray-900 font-bold  rounded-xl transition duration-200">Masuk</Link>
        <Link :href="route('register')" class="button-register hidden lg:inline-block py-2 px-6 text-sm text-white font-bold rounded-xl transition duration-200">Daftar</Link>
    </div>
</nav>
<div v-show="!isHiddenNavbar" class="navbar-menu relative z-50">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                <img src="/storage/images/logo/rect59901.png" alt="" class="h-10">
            </a>
            <button class="navbar-close" @click="isHiddenNavbar = !isHiddenNavbar">
                <svg class="h-6 w-6 text-gray-400 cursor-pointer hover:text-slate-200" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div>
            <ul>
                <li class="mb-1">
                    <Link :href="route('home')" class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded">Beranda</Link>
                </li>
                <li class="mb-1">
                    <Link :href="route('home')" class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded">Profil Desa</Link>
                </li>
                <li class="mb-1">
                    <Link :href="route('front.posts.index')" class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded">Artikel</Link>
                </li>
                <li class="mb-1">
                    <Link :href="route('home')" class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded">Data Desa</Link>
                </li>
                <li class="mb-1">
                    <Link :href="route('home')" class="block p-4 text-sm font-semibold text-gray-400 hover:bg-blue-50 hover:text-blue-600 rounded">Kontak</Link>
                </li>
            </ul>
        </div>
        <div class="mt-auto">
            <div v-show="role=='guard'" class="pt-6">
                <Link :href="route('login')" class="block px-4 py-3 mb-3 leading-loose text-xs text-center font-semibold leading-none bg-gray-50 hover:bg-gray-100 rounded-xl">Masuk</Link>
                <Link :href="route('register')" class="button-register block px-4 py-3 mb-2 leading-loose text-xs text-center text-white font-semibold rounded-xl">Daftar</Link>
            </div>
            <p class="my-4 text-xs text-center text-gray-400">
                <span>Copyright © 2021</span>
            </p>
        </div>
    </nav>

    <!-- Coursiele -->
</div>
<account-setting v-show="!isHiddenAccountSetting" :user="user" @hidden-container="hiddenAccountSetting" >
</account-setting>
</template>

<style scoped>
.bg-transparant {
    border-bottom: rgba(255, 255, 255, 0.26) solid 1px;
}

.button-register {
    background-image: linear-gradient(45deg, #6f8744, #b3b95f);
}

.button-register:hover {
    background-image: linear-gradient(45deg, #b3b95f, #6f8744);
}
</style>

<script>
// Burger menus
import {
    Link
} from '@inertiajs/inertia-vue3';
import AccountSetting from './AccountSetting.vue';

document.addEventListener('scroll', function () {
    const navbarFlat = document.querySelectorAll('.navbar-flat');
    const listMenu = document.querySelectorAll('.list-menu li a');
    const logoText = document.querySelector('logo-text')
    if (window.scrollY > 40) {
        navbarFlat[0].classList.remove('bg-transparant')
        navbarFlat[0].classList.add('bg-white')
        for (let list of listMenu) {
            list.classList.remove('text-white')
        }
    } else {
        navbarFlat[0].classList.add('bg-transparant')
        navbarFlat[0].classList.remove('bg-white')
        for (let list of listMenu) {
            list.classList.add('text-white')
        }
    }
})

import RemixIcon from './RemixIcons.vue';

export default {
    components: {
        Link,
        AccountSetting,
        RemixIcon
    },
    props: {
        role: String,
        user: Object
    },
    data(){
        return{
            isHiddenNavbar : true,
            isHiddenProfileMenu: true,
            isHiddenAccountSetting:true,
            form : {
                keyword : 'data desa bancang'
            }
        }
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'))
        },
        hiddenAccountSetting(){
            this.isHiddenAccountSetting=true
        },
        submit(){
            this.$inertia.get(route('front.posts.index'), this.form)
        }
    },
}
</script>
