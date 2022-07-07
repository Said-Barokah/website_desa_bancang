<template>
<div class="col-span-3">
    <form class="mb-3" @submit.prevent="submit">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
        <div class="relative contain-form">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" v-model="form.keyword" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Search Mockups, Logos..." required="">
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green-village font-medium rounded-lg text-sm px-4 py-2 ">Cari</button>
        </div>
    </form>
    <div class="grid grid-cols-1 gap-6">
        <Link :href="'/news/'+post.slug" v-for="post in postLatestSideBar" class="grid grid-cols-3 bg-white rounded-lg border shadow-md  md:max-w-xl hover:bg-gray-100 ">
            <img width="160" height="160" class="h-full object-cover" :src="post.cover" alt="">
            <div class="col-span-2 flex flex-col justify-between p-4 leading-normal">
                <p class="mb-3 font-normal text-gray-600">{{ moment(post.created_at).format("Do MMMM YYYY")}}</p>
                <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"> {{ post.title }} </h5>
                <!-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> -->
            </div>
        </Link>
    </div>
</div>
</template>
<style scoped>
.bg-green-village {
    background-color: #6f8744;
}
#default-search:focus {
    outline: #6f8744 2px solid;
}
.contain-form {
    outline: 0px solid red;
}
</style>
<script>
import moment from 'moment';
import {
    Link
} from '@inertiajs/inertia-vue3';
moment.locale('id');
export default {
    components : {
        Link
    },
    data() {
        return {
            moment: moment,
            form : {
                keyword : this.keyword
            }
        }
    },
    props : {
        postLatestSideBar : Object,
        keyword : String
    },
    methods : {
        submit(){
            this.$inertia.get(route('front.posts.index'), this.form)
        }
    }
}
</script>
