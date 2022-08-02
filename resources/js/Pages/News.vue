<template>
<Navbar :user="user" :role="role"></Navbar>
<Header :action="action" :slug="slug" categorySlug="" :postCover="posts.data[0].cover"></Header>
<NewsList :posts="posts" :postLatestSideBar="postLatestSideBar" :keyword="keyword" :tags="tags" :categories="categories"></NewsList>
<Footer></Footer>
</template>

<script>
import Navbar from '../Components/Navbar.vue';
import Header from '../Components/News/Header.vue';
import NewsList from '../Components/News/NewsList.vue';
import Footer from '../Components/Footer.vue';
export default {
    components: {
        Navbar,
        Header,
        NewsList,
        Footer
    },

    props : {
        role : String,
        posts : Object,
        postLatestSideBar : Object,
        keyword : String,
        user : Object,
        tags : Object,
        action : String,
        slug : String,
        categories: Object,

    },

}
</script>
