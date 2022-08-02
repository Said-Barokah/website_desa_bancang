<template>
<div id="default-carousel" class="relative" data-carousel="static">
    <div class="overflow-hidden relative h-screen rounded-lg xl:min-h-screen 2xl:min-h-screen">
        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20 md:bg-cover bg-no-repeat bg-center" style="background-image: url('storage/images/corousel/slide-bg-1.webp')" data-carousel-item="">
            <!-- <img src="" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="..."> -->
            <div class="w-full h-full flex justify-start items-center md:pt-0 pt-32">
                <div class="z-50 md:ml-12 ml-none md:mx-none mx-7 flex flex-col">
                    <h1 class="font-bold md:text-6xl xl:text-zinc-500 xl:w-1/2 w-full text-3xl text-white h-min md:mb-9 mb-4">Selamat Datang di Website Desa Bancang</h1>
                    <h5 class="xl:text-zinc-600 text-white xl:w-1/2 w-full text-lg md:text-xl h-min md:mb-9 mb-4">Website desa Bancang dibangun bertujuan sebagai sarana untuk menyampaikan informasi terbaru dan menarik mengenai desa bancang. Website ini dibangun oleh kelompok KKNT 112 Universitas Trunojoyo Madura tahun 2022</h5>
                    <Link href="" class="link-button-1 rounded-full text-base p-4 md:text-xl md:p-4  bg-zinc-700 text-white w-max md:shadow-none shadow">Baca Selengkapnya</Link>
                </div>
            </div>
        </div>
        <div class="img-corousel duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10" data-carousel-item="">
            <!-- <img src="image/image-slide/WhatsApp Image 2022-05-21 at 19.08.50.jpeg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="..."> -->
        </div>
        <div class="duration-700 ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="">
            <!-- <img src="image/image-slide/WhatsApp Image 2022-05-21 at 20.41.52.jpeg" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="..."> -->
        </div>
    </div>
    <div class="hidden md:flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
        <button type="button" class="w-3 h-3 rounded-full bg-white dark:bg-gray-800" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
    </div>

    <button type="button" class="hidden md:flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev="">
        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="hidden">Previous</span>
        </span>
    </button>
    <button type="button" class="hidden md:flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next="">
        <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="hidden">Next</span>
        </span>
    </button>
    <div class="hidden md:inline custom-shape-divider-bottom-1654902622 z-40">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
    </div>
</div>
</template>

<script>
import {
    Link
} from '@inertiajs/inertia-vue3';
export default {
    components: {
        Link
    },
    data() {
        return {
            link_gambar: 'https://www.freepik.com/free-photo/farmer-standing-rice-field-with-tablet_3738144.htm#query=farmer&position=14&from_view=search#position=14&query=farmer'
        }
    }
}
</script>

<style scoped>
.img-corousel {

}
.link-button-1 {
    background-image: linear-gradient(45deg, #6f8744, #b3b95f);
}

.link-button-1:hover {
    background-image: linear-gradient(45deg, #b3b95f, #6f8744);
}.custom-shape-divider-bottom-1654902622 {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: rotate(180deg);
}

.custom-shape-divider-bottom-1654902622 svg {
    position: relative;
    display: block;
    width: calc(194% + 1.3px);
    height: 79px;
    transform: rotateY(180deg);
}

.custom-shape-divider-bottom-1654902622 .shape-fill {
    fill: #FFFFFF;
}

</style>
