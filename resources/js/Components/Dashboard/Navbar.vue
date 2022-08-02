<template>
<nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded dark:bg-gray-800 top-0 sticky z-50 ">
    <div class="container flex flex-wrap justify-between items-center mx-auto">
        <Link :href="route('home')" class="flex items-center">
            <img src="/storage/images/logo/rect59901.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Desa Bancang - KKNT 112 UTM 2022</span>
        </Link>
        <div class="lg:flex hidden items-center md:order-2 relative ">
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
                    <li>
                        <Link :href="route('home')" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Home</Link>
                    </li>
                    <li>
                        <Link as="button" @click.prevent="logout()" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign out</Link>
                    </li>
                </ul>
            </div>
            <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="mobile-menu-2" aria-expanded="false">
                <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
</nav>
</template>

<script>
import {
    Link
} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link
    },
    props: {
        page: String,
        user: Object
    },
    data() {
        return {
            isHiddenProfileMenu: true,
        }
    },
    methods: {
        logout() {
            this.$inertia.post('logout')
        },
    }
}
</script>
