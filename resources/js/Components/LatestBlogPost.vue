<template>
<!-- Component Code -->
<section class="xl:py-28 px-5 sm:p-10 md:p-16 pt-24">
    <div class="flex justify-center mb-16">
        <div>
            <h2 class="font-bold text-4xl text-center text-zinc-600 mb-5">Berita Terkini</h2>
            <p class="text-zinc-500">kami menyediakan berita terkini yang aktual dan terpercaya</p>
        </div>
    </div>

    <div class="max-w-screen-lg mx-auto mb-16">
        <div class="rounded overflow-hidden flex flex-col mx-auto text-center">
            <Link :href="route('front.posts.show',postLatest[0].slug)">
                <div class="w-full max-h-96 h-60 md:h-96 bg-center bg-cover my-4" :style="'background-image:url('+postLatest[0].cover+')'"></div>
            </Link>
            <Link :href="route('front.posts.show',postLatest[0].slug)" class="text-green-village max-w-3xl mx-auto text-xl sm:text-4xl font-semibold text-zinc-500 transition duration-500 ease-in-out inline-block mb-2"> {{ postLatest[0].title }} </Link>
            <p class="text-zinc-500 text-base leading-8 max-w-2xl mx-auto">
                {{ postLatest[0].meta_desc }}
            </p>
            <div class="py-5 text-sm font-regular text-gray-900 flex items-center justify-center">
                <span class="mr-3 flex flex-row items-center">
                    <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                    <span class="ml-1 text-zinc-500 text-green-village"> {{ moment(postLatest[0].created_at).fromNow()}} </span>
                </span>
                <Link href="#" class="flex flex-row items-center hover:text-indigo-600  mr-3">
                    <RemixIcon :icon="'user-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                    <span class="ml-1 text-zinc-500 text-green-village"> {{ postLatest[0].user_name }} </span>
                </Link>
                <Link :href="route('front.posts.categories',postLatest[0].category_slug )" class="flex flex-row items-center hover:text-indigo-600">
                    <RemixIcon :icon="'flag-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                    <span class="ml-1 text-zinc-500 text-green-village"> {{ postLatest[0].category_name }} </span>
                </Link>
            </div>
            <hr />

        </div>
    </div>
    <!-- Component Code -->
    <div class="max-w-screen-xl mx-auto px-5 sm:px-10 md:px-16">
        <div class="grid grid-cols-1 xl:grid-cols-3 sm:grid-cols-2 gap-10">
            <div class="rounded overflow-hidden shadow-lg">
                <Link :href="route('front.posts.show',postLatest[1].slug)">
                    <div class="relative">
                        <div class="w-full h-60 bg-center bg-cover" :style="'background-image:url('+postLatest[1].cover+')'"></div>
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                        <Link :href="route('front.posts.categories',postLatest[1].category_slug )">
                            <div class="absolute bottom-0 left-0 bg-green-village px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                {{ postLatest[1].category_name }}
                            </div>
                        </Link>
                        <a href="!#">
                            <div class="text-sm absolute top-0 right-0 bg-green-village px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                <span class="font-bold">{{ moment(postLatest[1].created_at).format("DD")}}</span>
                                <small>{{ moment(postLatest[1].created_at).format("MMMM")}}</small>
                            </div>
                        </a>
                    </div>
                </Link>
                <div class="px-6 py-4">
                    <Link :href="route('front.posts.show',postLatest[1].slug)" class="text-green-village font-semibold text-lg inline-block text-zinc-500 transition duration-500 ease-in-out"> {{ postLatest[1].title }} </Link>
                    <p class="text-gray-500 text-sm">
                        {{ postLatest[1].meta_desc }}
                    </p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                        <span class="ml-1 text-zinc-500"> {{ moment(postLatest[1].created_at).fromNow()}} </span>
                    </span>
                </div>
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <Link :href="route('front.posts.show',postLatest[2].slug)">
                    <div class="relative">
                        <div class="w-full h-60 bg-center bg-cover" :style="'background-image:url('+postLatest[2].cover+')'"></div>
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                        <Link :href="route('front.posts.categories',postLatest[2].category_slug )">
                            <div class="absolute bottom-0 left-0 bg-green-village px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                {{ postLatest[2].category_name }}
                            </div>
                        </Link>
                        <a href="!#">
                            <div class="text-sm absolute top-0 right-0 bg-green-village px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                <span class="font-bold">{{ moment(postLatest[2].created_at).format("DD")}}</span>
                                <small>{{ moment(postLatest[2].created_at).format("MMMM")}}</small>
                            </div>
                        </a>
                    </div>
                </Link>
                <div class="px-6 py-4">
                    <Link :href="route('front.posts.show',postLatest[2].slug)" class="text-green-village font-semibold text-lg inline-block text-zinc-500 transition duration-500 ease-in-out"> {{ postLatest[2].title }} </Link>
                    <p class="text-gray-500 text-sm">
                        {{ postLatest[2].meta_desc }}
                    </p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                        <span class="ml-1 text-zinc-500"> {{ moment(postLatest[2].created_at).fromNow()}} </span>
                    </span>
                </div>
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <Link :href="route('front.posts.show',postLatest[3].slug)">
                    <div class="relative">
                        <div class="w-full h-60 bg-center bg-cover" :style="'background-image:url('+postLatest[3].cover+')'"></div>
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                        <Link :href="route('front.posts.categories',postLatest[3].category_slug )">
                            <div class="absolute bottom-0 left-0 bg-green-village px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                {{ postLatest[3].category_name }}
                            </div>
                        </Link>
                        <a href="!#">
                            <div class="text-sm absolute top-0 right-0 bg-green-village px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                <span class="font-bold">{{ moment(postLatest[3].created_at).format("DD")}}</span>
                                <small>{{ moment(postLatest[3].created_at).format("MMMM")}}</small>
                            </div>
                        </a>
                    </div>
                </Link>
                <div class="px-6 py-4">
                    <Link :href="route('front.posts.show',postLatest[3].slug)" class="text-green-village font-semibold text-lg inline-block text-zinc-500 transition duration-500 ease-in-out"> {{ postLatest[3].title }} </Link>
                    <p class="text-gray-500 text-sm">
                        {{ postLatest[3].meta_desc }}
                    </p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                        <span class="ml-1 text-zinc-500"> {{ moment(postLatest[3].created_at).fromNow()}} </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
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
</style>

<script>
import {
    Link
} from '@inertiajs/inertia-vue3';
import RemixIcon from './RemixIcons.vue';
import moment from 'moment';
moment.locale('id');
export default {
    components: {
        RemixIcon,
        Link
    },
    data() {
        return {
            url: '<!-- Credit: Componentity.com -->',
            moment: moment
        }
    },
    props: {
        postLatest: Object
    }
}
</script>
