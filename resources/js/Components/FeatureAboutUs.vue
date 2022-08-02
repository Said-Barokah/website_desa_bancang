<template>
<section class="md:relative static about_us md:mt-3 mt-24  padding_top overflow-hidden">
    <div class="container">
        <div class="flex md:flex-row flex-col content-between items-center">
            <div class="md:w-3/6  w-4/6 py-40 pr-20 md:inline hidden">
                <div class="about_us_img">
                    <div v-show='!isHiddenMap' class="gmap_canvas">
                        <iframe height="304" id="gmap_canvas" src="https://maps.google.com/maps?q=desa%20bancang&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                    <img v-show='isHiddenMap' class="shadow-2xl" src="storage/images/aboutUs/image866.webp" alt="" data-pagespeed-url-hash="3259222683" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                </div>
            </div>
            <div class="md:w-3/6  w-5/6">
                <div class="about_us_text">
                    <h2 class="text-4xl text-zinc-600">Desa Bancang</h2>
                    <p>Desa Bancang merupakan salah satu desa yang terletak di Kecamatan Tragah Kabubaten Bangkalan. Pekerjaan masyarakat desa disini rata rata merupakan petani. Padi, pohon bambu, atau ketela pisang meruapakan contoh sumber daya alam yang bisa dimanfaatkan di desa ini.</p>
                    <a class="btn_2 rounded-full" href="#">Baca Selengkapnya</a>
                    <div class="banner_item md:flex hidden">
                        <div class="single_item">
                            <Link href="/" class="btn-fiture">
                            <RemixIcon style="width:30px" :icon="'quill-pen-fill'"></RemixIcon>
                            <h5 class="font-bold text-zinc-600">Sejarah</h5>
                            </Link>

                        </div>
                        <div class="single_item">
                            <Link href="/" class="btn-fiture">
                            <RemixIcon style="width:30px" :icon="'government-fill'"></RemixIcon>
                            <h5 class="font-bold text-zinc-600">Pemerintah Desa</h5>
                            </Link>

                        </div>
                        <div class="single_item" @click="isHiddenMap = !isHiddenMap">
                            <RemixIcon style="width:30px" :icon="'road-map-fill'"></RemixIcon>
                            <h5 class="font-bold text-zinc-600">Letak Desa</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md:inline hidden">
        <img class="absolute top-9 left-28 -z-10" src="storage/images/aboutUs/g20931.webp" alt="">
    </div>
</section>
</template>

<script>
import RemixIcon from './RemixIcons.vue';
import {
    Link
} from '@inertiajs/inertia-vue3';
export default {
    components: {
        RemixIcon,
        Link
    },
    data(){
        return {
            isHiddenMap : true
        }
    }
}
</script>

<style scoped>
.about_us .about_us_text h2 {
    font-size: 42px;
    font-weight: 600;
    margin-bottom: 24px;
    position: relative;
}

.gmap_canvas {
    overflow: hidden;
    background: none !important;
    height: 304px;
    width: 600px;
}

@media(min-width: 768px) {
    .about_us_img {
        border-radius: 44% 56% 54% 46% / 44% 30% 70% 56%;
    }
}

.about_us .about_us_text p {
    line-height: 1.929;
    margin-bottom: 35px;
}

p {
    color: #666666;
    font-family: "Roboto", sans-serif;
    line-height: 1.929;
    font-size: 16px;
    margin-bottom: 0px;
    color: #888888;
}

.about_us .about_us_text .btn_2 {
    margin-top: 13px;
}

.btn_2 {
    display: inline-block;
    padding: 16px 45px;
    text-align: center;
    font-size: 14px;
    color: #fff;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
    text-transform: uppercase;
    font-family: "Roboto", sans-serif;
    background-size: 200% auto;
    display: inline-block;
}

.btn_1,
.btn_2,
.regervation_part .btn_2:hover {
    background-image: -webkit-linear-gradient(45deg, #6f8744, #b3b95f);
    background-image: -o-linear-gradient(45deg, #6f8744, #b3b95f);
    background-image: linear-gradient(45deg, #6f8744, #b3b95f);
}

.banner_item {
    justify-content: space-between;
}

.banner_item .single_item {
    text-align: center;
    margin-top: 100px;
    position: relative;
    z-index: 1;
}

.banner_item .single_item img {
    width: 44px;
    margin-bottom: 25px;
}

.banner_item .single_item h5 {
    font-size: 18px;
    text-transform: capitalize;
}

.btn-fiture:hover h5 {
    color: #6f8744;
}

.btn-fiture:hover svg {
    fill: #6f8744;
}
</style>
