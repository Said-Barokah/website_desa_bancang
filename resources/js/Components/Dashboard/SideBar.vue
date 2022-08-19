<template>
<aside class="w-64 h-screen left-0 fixed z-[100]" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 pl-4 bg-dashboard dark:bg-gray-800 h-full">
        <Link :href="route('home')" class="flex items-center mb-[45px]">
        <img src="/storage/images/logo/rect59901.png" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
        <span class="self-center text-xl font-semibold whitespace-nowrap text-gray-100 ">Bancang</span>
        </Link>
        <ul class="side-bar space-y-2">
            <li>
                <Link :href="route('dashboard')" class="flex items-center p-2 text-base font-normal  hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                    <svg class="w-6 h-6 text-[#5c7691] transition duration-75 dark:text-gray-400 group-hover:dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3 text-[#5c7691]">Dashboard</span>
                </Link>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 group text-white w-full text-base font-normal pr-4 transition duration-75 hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid" @click="isHiddenNews = !isHiddenNews ">
                    <RemixIcon icon="newspaper-fill" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap text-[#5c7691] group-hover:text-white" sidebar-toggle-item="">Berita</span>
                    <svg sidebar-toggle-item="" class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul v-if="!isHiddenNews" class="py-2 space-y-2 pl-11">
                    <li class="group flex item items-center hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                        <RemixIcon icon="article-line" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                        <Link href="/dashboard/posts" class="group-hover:text-white flex items-center p-2 pl-2 text-[#5c7691] w-full text-base font-normal transition duration-75   ">Post</Link>
                    </li>
                    <li class="group flex item items-center hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                        <RemixIcon icon="flag-2-line" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                        <Link href="/dashboard/categories" class="group-hover:text-white flex items-center p-2 pl-2 text-[#5c7691] w-full text-base font-normal transition duration-75   ">Kategori</Link>
                    </li>
                    <li class="group flex item items-center hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                        <RemixIcon icon="bookmark-line" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                        <Link href="/dashboard/tags" class="group-hover:text-white flex items-center p-2 pl-2 text-[#5c7691] w-full text-base font-normal transition duration-75   ">Tag</Link>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 group text-white w-full text-base font-normal pr-4 transition duration-75 hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid" @click="isHiddenApparatur = !isHiddenApparatur ">
                    <RemixIcon icon="user-2-fill" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap text-[#5c7691] group-hover:text-white" sidebar-toggle-item="">Perangkat Desa</span>
                    <svg sidebar-toggle-item="" class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul v-if="!isHiddenApparatur" class="py-2 space-y-2 pl-11">
                    <li class="group flex item items-center hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                        <RemixIcon icon="organization-chart" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                        <Link href="/dashboard/village-apparatus-structure" class="group-hover:text-white flex items-center p-2 pl-2 text-[#5c7691] w-full text-base font-normal transition duration-75   ">Struktur Perangkat Desa</Link>
                    </li>
                    <li class="group flex item items-center hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                        <RemixIcon icon="award-line" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                        <Link href="/dashboard/apparatus-position " class="group-hover:text-white flex items-center p-2 pl-2 text-[#5c7691] w-full text-base font-normal transition duration-75   ">Jabatan</Link>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 group text-white w-full text-base font-normal pr-4 transition duration-75 hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid" @click="isHiddenManager = !isHiddenManager ">
                    <RemixIcon icon="user-settings-fill" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap text-[#5c7691] group-hover:text-white" sidebar-toggle-item="">BPD</span>
                    <svg sidebar-toggle-item="" class="w-6 h-6 " fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul v-if="!isHiddenManager" class="py-2 space-y-2 pl-11">
                    <li class="group flex item items-center hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                        <RemixIcon icon="team-line" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                        <Link href="/dashboard/BPD-structure" class="group-hover:text-white flex items-center p-2 pl-2 text-[#5c7691] w-full text-base font-normal transition duration-75   ">Struktur BPD</Link>
                    </li>
                    <li class="group flex item items-center hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                        <RemixIcon icon="node-tree" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                        <Link href="/dashboard/management-position" class="group-hover:text-white flex items-center p-2 pl-2 text-[#5c7691] w-full text-base font-normal transition duration-75   ">Posisi</Link>
                    </li>
                </ul>
            </li>
            <li class="hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                <Link href="/dashboard/villagers" class="flex items-center p-2 group text-base font-normal   ">
                <RemixIcon icon="user-location-fill" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                <span class="ml-3 text-[#5c7691] group-hover:text-white">Masyarakat Desa</span>
                </Link>
            </li>
            <li v-show="user.roles[0].id==3"  class="hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                <Link href="/dashboard/users" class="flex items-center p-2 group text-base font-normal   ">
                <RemixIcon icon="user-location-fill" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                <span class="ml-3 text-[#5c7691] group-hover:text-white">Pengguna Aplikasi</span>
                </Link>
            </li>
            <li class="hover:bg-gradient-to-l hover:from-white hover:border-r-8 hover:border-r-[#256D85] hover:border-solid">
                <Link :href="route('account-setting.index')" class="flex group items-center p-2 text-base font-normal   ">
                <RemixIcon icon="settings-4-fill" class="fill-[#5c7691] h-[24px] w-[24px] group-hover:fill-white"></RemixIcon>
                <span class="flex-1 ml-3 whitespace-nowrap text-[#5c7691] group-hover:text-white">Setting Akun</span>
                </Link>
            </li>
        </ul>
    </div>
</aside>
</template>

<script>
import {
    Link
} from '@inertiajs/inertia-vue3';
import RemixIcon from '../RemixIcons.vue';
export default {
    components: {
        Link,
        RemixIcon,
    },
    data() {
        return {
            isHiddenNews: true,
            isHiddenApparatur: true,
            isHiddenManager: true
        }
    },
    props : {
        user :Object
    }
}
</script>

<style scoped>
.bg-dashboard {
    background-color: #002B5B;
}
</style>
