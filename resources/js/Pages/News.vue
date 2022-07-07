<template>
<Navbar :user="user"></Navbar>
<Header></Header>
<NewsList :posts="posts" :postLatestSideBar="postLatestSideBar" :keyword="keyword"></NewsList>
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
        posts : Object,
        postLatestSideBar : Object,
        keyword : String,
        user : Object
    },

}
</script>
