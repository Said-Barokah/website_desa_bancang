<template>
<div class="md:col-span-3 col-span-5">
    <form class="mb-3" @submit.prevent="submit">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
        <div class="relative contain-form">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" v-model="form.keyword" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Cari berita terkini ....." required="">
            <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-green-village font-medium rounded-lg text-sm px-4 py-2 ">Cari</button>
        </div>
    </form>
    <div class="grid grid-cols-1 gap-6 mb-9">
        <span class="text-xl font-semibold text-green-village-1">Berita Terkini</span>
        <Link :href="'/news/'+post.slug" v-for="post in postLatestSideBar" class="grid grid-cols-3 bg-white rounded-lg border shadow-md  md:max-w-xl hover:bg-gray-100 ">
        <div :style="'background-image:url('+post.cover+');'" class="bg-cover bg-center w-auto"></div>
        <div class="col-span-2 flex flex-col justify-between p-4 leading-normal">
            <p class="mb-3 font-normal text-gray-600">{{ moment(post.created_at).format("Do MMMM YYYY")}}</p>
            <h5 class="mb-2 text-lg font-bold tracking-tight text-gray-900 dark:text-white" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; text-overflow: ellipsis;"> {{ post.title }} </h5>
            <!-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p> -->
        </div>
        </Link>
    </div>
    <div class="relative mb-9">
        <div class="text-green-village-1 text-3xl font-semibold mb-3">Kategori</div>
        <div class="border rounded-full w-full py-2 px-5 flex justify-between shadow" :class=" {'border-3 border-gray-400' : !isHiddenCategory} " @click="isHiddenCategory = !isHiddenCategory">
            <span>Pilih Kategori</span>
            <RemixIcon :icon="'arrow-down-s-line'" class="h-5 fill" :class="{ 'rotate-180 transition' : !isHiddenCategory}"></RemixIcon>
        </div>
        <div class="w-full shadow-lg absolute top-auto left-0 flex flex-col bg-white px-5 py-5" v-show="!isHiddenCategory">
            <Link v-for="category in categories" :href="'/categories/' + category.slug +'/news/'" class="mb-1 text-green-village "> {{ category.name }} </Link>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="text-green-village-1 text-3xl font-semibold mb-3">Tag</div>
        <div class="flex flex-wrap relative " :class="!isHiddenTag ? 'max-h-max overflow-visible' : 'max-h-[109px] overflow-hidden'">
            <Link as="button" :href="'/tags-news/'+tag.slug" v-for="tag in tags" class="font-bold text-white  bg-lime-700 py-1 px-3 text-green-village hover:bg-white hover:border hover:border-lime-500 rounded-md m-1">{{ tag.name }}</Link>
            <Link as="button" :href="'/tags-news/'+tag.slug" v-for="tag in tags" class="font-bold text-white  bg-lime-700 py-1 px-3 text-green-village hover:bg-white hover:border hover:border-lime-500 rounded-md m-1">{{ tag.name }}</Link>
            <div class="bg-gradient-to-t from-white  w-full absolute bottom-0 h-[67px]" v-show="isHiddenTag">
            </div>
            <div class="w-full flex justify-center absolute bottom-[-4px] cursor-pointer" @click="isHiddenTag=!isHiddenTag" :class="{'bottom-[-39px]' : !isHiddenTag}">
                <RemixIcon :icon="'arrow-down-s-line'" class="h-[3.25rem] fill-gray-500" :class="{ 'rotate-180 transition' : !isHiddenTag}"></RemixIcon>
            </div>

        </div>
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

.text-green-village-1 {
    color: #6f8744;
}

.text-green-village:hover {
    color: #6f8744;
}

.bg-green-village:hover {
    color: #6f8744;
    background-color: white;
}
</style>

<script>
import moment from 'moment';
import {
    Link
} from '@inertiajs/inertia-vue3';
moment.locale('id');
import RemixIcon from '../RemixIcons.vue';
export default {
    components: {
        Link,
        RemixIcon
    },
    data() {
        return {
            moment: moment,
            form: {
                keyword: this.keyword
            },
            isHiddenCategory: true,
            isHiddenTag: true
        }
    },
    props: {
        postLatestSideBar: Object,
        keyword: String,
        tags: Object,
        categories: Object
    },
    methods: {
        submit() {
            this.$inertia.get(route('front.posts.index'), this.form)
        }
    }
}
</script>
