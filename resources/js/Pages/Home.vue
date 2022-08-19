<template>
<Navbar :role="role" :user="user" ></Navbar>
<Corousel></Corousel>
<FeatureAboutUs></FeatureAboutUs>
<FeatureGovernmentCard :fromYear="fromYear" :toYear="toYear" :kepalaDesa="kepalaDesa" :sekretarisDesa="sekretarisDesa"></FeatureGovernmentCard>
<LatestBlogPost :postLatest="postLatest"></LatestBlogPost>
<Footer></Footer>
</template>

<script>
import Navbar from '../Components/Navbar.vue';
import Corousel from '../Components/Corousel.vue';
import FeatureAboutUs from '../Components/FeatureAboutUs.vue';
import Footer from '../Components/Footer.vue';
import FeatureGovernmentCard from '../Components/FeatureGovernmentCard.vue';
import LatestBlogPost from '../Components/LatestBlogPost.vue';
import EmbedMap from '../Components/EmbedMap.vue';
export default {
    components: {
        Navbar,
        Corousel,
        FeatureAboutUs,
        Footer,
        FeatureGovernmentCard,
        LatestBlogPost,
        EmbedMap
    },
    props : {
        role : String,
        user : Object,
        fromYear : Number,
        toYear : Number,
        kepalaDesa : Object,
        sekretarisDesa : Object,
        postLatest : Object
    }
}
</script>
