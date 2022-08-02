<template>
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">
    <div class="grid md:grid-cols-8 grid-cols-1 gap-10">
        <div class="col-span-5 grid grid-cols-1 md:grid-cols-2 sm:grid-cols-2 gap-10">
            <div v-for="post in posts.data" class="rounded overflow-hidden shadow-lg">
                <a href="#">
                    <div class="relative">
                        <!-- <img class="w-full" :src="post.cover" alt="Sunset in the mountains"> -->
                        <div :style="'background-image:url('+post.cover+');'"  class="bg-cover bg-center w-full h-48"></div>
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                        <Link :href="'/categories/' + post.category_slug +'/news/' ">
                            <div class="absolute bottom-0 left-0 bg-green-village px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                {{ post.category_name }}
                            </div>
                        </Link>
                        <a href="!#">
                            <div class="text-sm absolute top-0 right-0 bg-green-village px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                <span class="font-bold">{{ moment(post.created_at).format("DD")}}</span>
                                <small>{{ moment(post.created_at).format("MMMM")}}</small>
                            </div>
                        </a>
                    </div>
                </a>
                <div class="px-6 py-4">
                    <Link :href="'/news/'+ post.slug" class="text-green-village font-semibold text-lg inline-block parapraph-cut-2 text-zinc-500 transition duration-500 ease-in-out">{{ post.title }}</Link>
                    <p class="text-gray-500 text-sm parapraph-cut-4">
                        {{ post.meta_desc }}
                    </p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                        <span class="ml-1 text-zinc-500"> {{ moment(post.created_at).fromNow()}} </span>
                    </span>
                </div>
            </div>
            <!-- Pagination -->
            <div class="col-span-2">
                <div class="flex justify-end">

                    <Link v-show="posts.prev_page_url" :href='posts.prev_page_url' class="inline-flex items-center py-2 px-4 mr-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                    </svg>
                    Previous
                    </Link>

                    <Link :href='posts.next_page_url' class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                    Next
                    <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                    </Link>
                </div>

            </div>
        </div>
        <SideBarRecentPost :postLatestSideBar="postLatestSideBar" :keyword="keyword" :tags="tags" :categories="categories"></SideBarRecentPost>
    </div>
</div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

body {
    font-family: 'Poppins', sans-serif !important;
}

.text-green-village:hover {
    color: #6f8744;
}

.bg-green-village {
    background-color: #6f8744;
}

.bg-green-village:hover {
    color: #6f8744;
    background-color: white;
}

.parapraph-cut-2 {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.parapraph-cut-4 {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 4;
    -webkit-box-orient: vertical;
}
</style>

<script>
import {
    Link
} from '@inertiajs/inertia-vue3';
import RemixIcon from '../RemixIcons.vue';
import SideBarRecentPost from './SideBarRecentPost.vue';
import moment from 'moment';
moment.locale('id');
export default {
    components: {
        RemixIcon,
        SideBarRecentPost,
        Link
    },
    data() {
        return {
            url: '<!-- Credit: Componentity.com -->',
            moment: moment
        }
    },
    props: {
        posts: Object,
        postLatestSideBar: Object,
        keyword : String,
        tags : Object,
        categories : Object
    },
    created() {
        // console.log(this.posts)
    }
}
</script>
