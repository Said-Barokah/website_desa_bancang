<template>
<nav class="navbar-flat bg-transparant top-0 left-0 right-0 fixed z-50 px-4 py-4 flex justify-between items-center">
    <a class="text-3xl font-bold leading-none" href="#">
        <img src="storage/images/logo/rect59901.png" alt="" class="h-10">
    </a>
    <div class="lg:hidden absolute right-0">
        <button class="navbar-burger flex items-center text-blue-600 p-3">
            <svg class="block h-4 w-4 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <title>Mobile menu</title>
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
            </svg>
        </button>
    </div>
    <ul class="list-menu hidden absolute top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 lg:flex lg:mx-auto lg:flex lg:items-center lg:w-auto lg:space-x-6">
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
            <Link :href="route('home')" class="text-sm text-white font-bold hover:text-slate-200">Data Desa</Link>
        </li>
        <li><a class="text-sm text-white font-bold hover:text-slate-200" href="#">Kontak</a></li>
    </ul>
    <div v-show="role!='guard'" class="flex items-center md:order-2">
        <button type="button" class="photo-user flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown" >
            <span class="sr-only">Open user menu</span>
            <img class="w-8 h-8 rounded-full" alt="user photo" src="">
        </button>

        <div class="pop-menu-user hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="bottom" style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate(958px, 1928px);">
            <div class="py-3 px-4">
                <span class="block text-sm text-gray-900 dark:text-white"> {{ user.name }} </span>
                <span class="block text-sm font-medium text-gray-500 truncate dark:text-gray-400">{{ user.email }}</span>
            </div>
            <ul class="py-1" aria-labelledby="dropdown">
                <li>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Dashboard</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                </li>
                <li>
                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Earnings</a>
                </li>
                <li>
                    <Link as="button" @click.prevent="logout()" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</Link>
                </li>
            </ul>
        </div>
        <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
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
<div class="navbar-menu relative z-50 hidden">
    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
    <nav class="fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 bg-white border-r overflow-y-auto">
        <div class="flex items-center mb-8">
            <a class="mr-auto text-3xl font-bold leading-none" href="#">
                <svg class="h-12" alt="logo" viewBox="0 0 100 100">
                    <path d="M100 34.2c-.4-2.6-3.3-4-5.3-5.3-3.6-2.4-7.1-4.7-10.7-7.1-8.5-5.7-17.1-11.4-25.6-17.1-2-1.3-4-2.7-6-4-1.4-1-3.3-1-4.8 0-5.7 3.8-11.5 7.7-17.2 11.5L5.2 29C3 30.4.1 31.8 0 34.8c-.1 3.3 0 6.7 0 10v16c0 2.9-.6 6.3 2.1 8.1 6.4 4.4 12.9 8.6 19.4 12.9 8 5.3 16 10.7 24 16 2.2 1.5 4.4 3.1 7.1 1.3 2.3-1.5 4.5-3 6.8-4.5 8.9-5.9 17.8-11.9 26.7-17.8l9.9-6.6c.6-.4 1.3-.8 1.9-1.3 1.4-1 2-2.4 2-4.1V37.3c.1-1.1.2-2.1.1-3.1 0-.1 0 .2 0 0zM54.3 12.3L88 34.8 73 44.9 54.3 32.4V12.3zm-8.6 0v20L27.1 44.8 12 34.8l33.7-22.5zM8.6 42.8L19.3 50 8.6 57.2V42.8zm37.1 44.9L12 65.2l15-10.1 18.6 12.5v20.1zM50 60.2L34.8 50 50 39.8 65.2 50 50 60.2zm4.3 27.5v-20l18.6-12.5 15 10.1-33.6 22.4zm37.1-30.5L80.7 50l10.8-7.2-.1 14.4z"></path>
                </svg>
            </a>
            <button class="navbar-close">
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
            <div class="pt-6">
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
</template>
<style scoped>
.bg-transparant {
    background-color: rgba(242, 255, 240, 0.226);
}

.button-register {
    background-image: linear-gradient(45deg, #6f8744, #b3b95f);
}

.button-register:hover {
    background-image: linear-gradient(45deg,  #b3b95f, #6f8744);
}
</style>
<script>
// Burger menus
import {
    Link
} from '@inertiajs/inertia-vue3';

const photoUser = document.querySelector('.photo-user');
const popMenuUser = document.querySelector('.pop-menu-user');

// photoUser.addEventListener('click', function(){
//     // popMenuUser.classList.
//     popMenuUser.classList.remove('hidden')

// })
document.addEventListener('scroll',function(){
    const burger = document.querySelectorAll('.navbar-burger');
    const navbarFlat = document.querySelectorAll('.navbar-flat');
    const listMenu = document.querySelectorAll('.list-menu li a');
    if(window.scrollY>40){
        navbarFlat[0].classList.remove('bg-transparant')
        navbarFlat[0].classList.add('bg-white')
        for (let list of listMenu) {
            list.classList.remove('text-white')
        }
    }
    else {
        navbarFlat[0].classList.add('bg-transparant')
        navbarFlat[0].classList.remove('bg-white')
        for (let list of listMenu) {
            list.classList.add('text-white')
        }
    }
    // else if(window.scrollY<40){
    //     navbarFlat.classList.remove('bg-white')
    // }
})
document.addEventListener('DOMContentLoaded', function () {
    // open
    const burger = document.querySelectorAll('.navbar-burger');
    const menu = document.querySelectorAll('.navbar-menu');

    if (burger.length && menu.length) {
        for (var i = 0; i < burger.length; i++) {
            burger[i].addEventListener('click', function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    // close
    const close = document.querySelectorAll('.navbar-close');
    const backdrop = document.querySelectorAll('.navbar-backdrop');

    if (close.length) {
        for (var i = 0; i < close.length; i++) {
            close[i].addEventListener('click', function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }

    if (backdrop.length) {
        for (var i = 0; i < backdrop.length; i++) {
            backdrop[i].addEventListener('click', function () {
                for (var j = 0; j < menu.length; j++) {
                    menu[j].classList.toggle('hidden');
                }
            });
        }
    }
});

export default {
    components: {
        Link
    },
    props: {
        role: String,
        user : Object
    },
    methods: {
        logout() {
            this.$inertia.post('logout')
        },
    },
}
</script>
