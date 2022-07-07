<template>
<section class="relative header-news bg-gradient-to-r  w-full py-28 px-16">
    <div class="flex flex-col justify-center align-middle h-full md:pl-10 px-7 pt-16">
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                <li class="inline-flex items-center">
                    <Link :href="route('home')" class="flex items-center">
                    <RemixIcon :icon="'home-fill'" class="mr-2 w-4 h-4" style="width:30px;fill:white;"></RemixIcon>
                    <span>Home</span>
                    </Link>
                </li>
                <li>
                    <div class="flex items-center">
                        <Link :href="route('front.posts.index')" class="ml-1 text-sm font-medium md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            Berita
                        </Link>
                        <RemixIcon :class="arrow-right-s-line" style=""></RemixIcon>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium  md:ml-2 dark:text-gray-500">Flowbite</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="xl:pr-96 md:pr-40 ">
            <h2 class="text-white text-4xl mb-2"> {{ title }} </h2>
        </div>
    </div>
</section>
</template>

<style scoped>
.header-news {
    background: rgb(99, 112, 38);
    background: linear-gradient(135deg, rgb(98, 112, 38) 0%, rgba(172, 178, 88, 0.884) 35%, rgb(108, 112, 50) 100%);
}
</style>

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
    props : {
        title : String
    }
}
</script>
