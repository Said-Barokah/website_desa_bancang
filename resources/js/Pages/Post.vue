<template>
<Navbar :user="user"></Navbar>
<Header :title="post[0].title" :category="post[0].category_name" :action="action" :categorySlug="post[0].category_slug" :postSlug="post[0].slug" :postCover="post[0].cover"></Header>
<div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 md:px-0 flex justify-center">
    <div class="grid md:grid-cols-8 grid-cols-1 gap-10">
        <div class="grid grid-cols-1 gap-10 col-span-5 prose">
            <!-- place-to-write  -->
            <div class="w-full col-span-5">
                <div class="flex justify-start text-xl mb-5">
                    <span class="flex justify-start mr-4">
                        <RemixIcon :icon="'time-fill'" style="width:20px; fill:#6f8744;"></RemixIcon>
                        <p class="ml-2 mt-0 mb-0">{{ moment(post.created_at).format("LL")}}</p>
                    </span>
                    <span class="flex justify-start">
                        <RemixIcon :icon="'user-fill'" style="width:20px; fill:#6f8744;"></RemixIcon>
                        <p class="ml-2 mt-0 mb-0"> {{ post[0].writer }} </p>
                    </span>
                </div>
                <div :style="'background-image:url('+post[0].cover+');'"  class="bg-cover bg-center w-full h-96 max-h-96"></div>
            </div>
            <div class="col-span-5 leading-6 text-zinc-600 text-base prose prose-p:text-base" v-bind:innerHTML="post[0].desc">
            </div>
        </div>
        <SideBarRecentPost :postLatestSideBar="postLatestSideBar" :categories="categories" :tags="tags"></SideBarRecentPost>
    </div>
</div>
<Footer></Footer>
</template>

<script>
import Navbar from '../Components/Navbar.vue';
import Header from '../Components/News/Header.vue';
import Footer from '../Components/Footer.vue';
import SideBarRecentPost from '../Components/News/SideBarRecentPost.vue';
import RemixIcon from '../Components/RemixIcons.vue';
import moment from 'moment';
moment.locale('id');
export default {
    components: {
        Navbar,
        Header,
        Footer,
        SideBarRecentPost,
        RemixIcon
    },
    data() {
        return {
            moment: moment
        }
    },
    props: {
        user: Object,
        post: Object,
        postLatestSideBar: Object,
        categories : Object,
        tags : Object,
        action : String

    }
}
</script>
