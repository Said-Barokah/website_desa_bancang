<template>
<aside class="w-64 h-screen left-0 fixed" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800 h-full">
        <ul class="space-y-2">
            <li>
                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <svg class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" @click="isHiddenNews = !isHiddenNews ">
                    <RemixIcon icon="newspaper-fill" style="width:24px; height: 24px;"></RemixIcon>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item="">Berita</span>
                    <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul v-if="!isHiddenNews" class="py-2 space-y-2 pl-11">
                    <li class="flex item items-center">
                        <RemixIcon icon="article-line" style="width:24px; height: 24px;"></RemixIcon>
                        <Link href="/dashboard/posts" class="flex items-center p-2 pl-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Post</Link>
                    </li>
                    <li class="flex item items-center">
                        <RemixIcon icon="flag-2-line" style="width:24px; height: 24px;"></RemixIcon>
                        <Link href="/dashboard/categories" class="flex items-center p-2 pl-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Kategori</Link>
                    </li>
                    <li class="flex item items-center">
                        <RemixIcon icon="bookmark-line" style="width:24px; height: 24px;"></RemixIcon>
                        <Link href="/dashboard/tags" class="flex items-center p-2 pl-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Tag</Link>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" @click="isHiddenApparatur = !isHiddenApparatur ">
                    <RemixIcon icon="user-2-fill" style="width:24px; height: 24px;"></RemixIcon>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item="">Perangkat Desa</span>
                    <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul v-if="!isHiddenApparatur" class="py-2 space-y-2 pl-11">
                    <li class="flex item items-center">
                        <RemixIcon icon="organization-chart" style="width:24px; height: 24px;"></RemixIcon>
                        <Link href="/dashboard/village-apparatus-structure" class="flex items-center p-2 pl-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Struktur Perangkat Desa</Link>
                    </li>
                    <li class="flex item items-center">
                        <RemixIcon icon="award-line" style="width:24px; height: 24px;"></RemixIcon>
                        <Link href="/dashboard/apparatus-position " class="flex items-center p-2 pl-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Jabatan</Link>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" @click="isHiddenManager = !isHiddenManager ">
                    <RemixIcon icon="user-settings-fill" style="width:24px; height: 24px;"></RemixIcon>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item="">BPD</span>
                    <svg sidebar-toggle-item="" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul v-if="!isHiddenManager" class="py-2 space-y-2 pl-11">
                    <li class="flex item items-center">
                        <RemixIcon icon="team-line" style="width:24px; height: 24px;"></RemixIcon>
                        <Link href="/dashboard/BPD-structure" class="flex items-center p-2 pl-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Struktur BPD</Link>
                    </li>
                    <li class="flex item items-center">
                        <RemixIcon icon="node-tree" style="width:24px; height: 24px;"></RemixIcon>
                        <Link href="/dashboard/management-position" class="flex items-center p-2 pl-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Posisi</Link>
                    </li>
                </ul>
            </li>
            <li>
                <Link href="/dashboard/villagers" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <RemixIcon icon="user-location-fill" style="width:24px; height: 24px;"></RemixIcon>
                <span class="ml-3">Masyarakat Desa</span>
                </Link>
            </li>
            <li>
                <Link :href="route('account-setting.index')" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                <RemixIcon icon="settings-4-fill" style="width:24px; height: 24px;"></RemixIcon>
                <span class="flex-1 ml-3 whitespace-nowrap">Setting Akun</span>
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
        RemixIcon
    },
    data() {
        return {
            isHiddenNews: true,
            isHiddenApparatur: true,
            isHiddenManager: true
        }
    }
}
</script>
