<template>
<Navbar :user="user" :role="role"></Navbar>
<Header :action="action" :slug="slug" categorySlug="" :postCover="postCover"></Header>
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
    data(){
        return {
            postCover : null
        }
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
    created() {
         if(Object.keys(this.posts.data).length != 0){
            this.postCover = this.posts.data[0].cover
         }
    }

}
</script>
