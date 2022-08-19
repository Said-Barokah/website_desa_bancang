<template>
<section class="relative header-news bg-gradient-to-r  w-full py-28 md:px-16 px-0
after:content-[''] after:absolute after:w-full after:h-full after:opacity-10
after:z-10 after:top-0 after:left-0 after:bg-cover after:bg-center" :style="'background-image:url('+postCover+')'">
    <div class="flex flex-col justify-center align-middle h-full md:pl-10 px-7 pt-16 z-20 relative">
        <nav class="flex mb-4" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 text-white">
                <li class="inline-flex items-center after:content-[''] after:w-1 after:h-1 after:bg-white after:opacity-50 after:ml-2 after:rounded-full">
                    <Link :href="route('home')" class="flex items-center text-xl">
                    Beranda
                    </Link>
                </li>
                <li>
                    <Link :href="route('front.posts.index')" class="flex items-center text-xl ">
                    {{ action }}
                    </Link>
                </li>
                <li>
                    <Link :href="route('front.posts.categories',categorySlug)" class="flex items-center text-xl ">
                    {{ category }}
                    </Link>
                </li>
            </ol>
        </nav>
        <div v-show="!isHiddenArtikel">
            <h3 class="text-4xl text-white mb-2">Artikel</h3>
            <h5 class="text-lg text-white">Berita yang disedikan oleh kami adalah berita yang terpercaya, faktual dan terkinini</h5>
        </div>
        <span class="text-4xl text-white"> {{ slug }} </span>
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

.header-news::after {
    background: rgb(99, 112, 38);
    background: linear-gradient(135deg, rgb(98, 112, 38) 0%, rgb(172, 178, 88) 35%, rgba(108, 112, 50, 0.952) 100%);
    opacity: 1;
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
    data() {
        return {
            isHiddenArtikel: true,
        }
    },
    props: {
        title: String,
        action: String,
        slug: String,
        category: String,
        categorySlug: String,
        postSlug: String,
        postCover: String,
    },
    created() {
        if (this.action == undefined ) {
            this.isHiddenArtikel = false
        } else {
            this.isHiddenArtikel = true
        }
    }
}
</script>
