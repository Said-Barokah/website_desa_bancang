<template>
<section class="relative about_us padding_top overflow-hidden">
    <div class="container">
        <div class="flex md:flex-row flex-col content-between items-center">
            <div class="md:w-3/6  w-4/6 py-40 pr-20">
                <div class="about_us_img">
                    <img class="shadow-2xl" src="storage/images/aboutUs/image866.webp" alt="" data-pagespeed-url-hash="3259222683" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                </div>
            </div>
            <div class="md:w-3/6  w-5/6">
                <div class="about_us_text">
                    <h2 class="text-4xl text-zinc-600">Desa Bancang</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit sed
                        do eiusmod tempor incididunt ut labore et dolore magna aliqua
                        Quis ipsum suspendisse ultrices gravida. Risus cmodo viverra
                        maecenas accumsan lacus vel</p>
                    <a class="btn_2 rounded-full" href="#">Baca Selengkapnya</a>
                    <div class="banner_item">
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
                        <div class="single_item">
                            <Link href="" class="btn-fiture">
                            <RemixIcon style="width:30px" :icon="'road-map-fill'"></RemixIcon>
                            <h5 class="font-bold text-zinc-600">Letak Desa</h5>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
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

.btn_1,.btn_2,.regervation_part .btn_2:hover {
    background-image: -webkit-linear-gradient(45deg, #6f8744, #b3b95f);
    background-image: -o-linear-gradient(45deg, #6f8744, #b3b95f);
    background-image: linear-gradient(45deg, #6f8744, #b3b95f);
}

.banner_item {
    display: flex;
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
.btn-fiture:hover h5{
    color: #6f8744;
}
.btn-fiture:hover svg{
    fill:#6f8744;
}
</style>
