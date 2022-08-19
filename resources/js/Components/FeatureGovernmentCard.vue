<template>
<section class="relative sec-contain bg-grey-lightest py-24 md:mt-0 mt-24 flex flex-col items-center">
    <div class="w-full my-8">
        <div class="flex justify-center pb-20">
            <div class="grid grid-cols-1 gap-3 text-center text-white">
                <h2 class="text-4xl font-bold">Perangkat Desa</h2>
                <div>
                    <p>Perangkat Desa Bancang, Kecamatan Tragah, Kabupaten Bangkalan</p>
                    <p>Periode Tahun {{ fromYear }} - {{ toYear }} </p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap justify-center mx-6 my-6 pb-20">
            <div class="w-96 px-6 py-6 text-center">
                <div class="bg-white rounded shadow-lg overflow-hidden p-8">
                    <div class="rounded-full h-64 flex items-center justify-center bg-gray-300 mx-auto mb-8 bg-cover bg-center" :style="'background-image:url('+kepalaDesa[0].photo_path +')'"></div>
                    <div class="font-bold text-xl mb-2"> {{ kepalaDesa[0].villager.name }} </div>
                    <p class="text-grey-darker text-base mb-4"> {{ kepalaDesa[0].position.position }} </p>
                    <button class="bg-transparent hover:bg-blue text-blue-dark rounded-full font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent ">Contact</button>
                </div>
            </div>
            <div class="w-96 px-6 py-6 text-center ">
                <div class="bg-white rounded shadow-lg overflow-hidden p-8">
                    <div class="rounded-full h-64 flex items-center justify-center bg-gray-300 mx-auto mb-8 bg-cover bg-center" :style="'background-image:url('+sekretarisDesa[0].photo_path +')'"></div>
                    <div class="font-bold text-xl mb-2"> {{ sekretarisDesa[0].villager.name }} </div>
                    <p class="text-grey-darker text-base mb-4"> {{ sekretarisDesa[0].position.position }} </p>
                    <button class="bg-transparent hover:bg-blue text-blue-dark rounded-full font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent ">Contact</button>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <Link :href="'/news?keyword=perangkat%20desa%20bancang'" class="rounded-full px-5 py-3 bg-white text-zinc-600 hover:text-yellow-500 font-bold text-center">Lihat Selangkapnya</Link>
        </div>
    </div>
</section>
</template>

<style scoped>
.sec-contain {
    background: rgb(99, 112, 38);
    background: linear-gradient(135deg, rgb(98, 112, 38) 0%, rgba(172, 178, 88, 0.884) 35%, rgb(108, 112, 50) 100%);
}
.sec-contain::after {
    content: '';
    position: absolute;
    top : 0;
    left : 0;
    width: 100%;
    height: 100%;
    background-image: url(/storage/images/goverment/court-hammer-books-judgment-law-.webp);
    background-position: center;
    background-repeat: no-repeat;
    background-size: 4000px;
    z-index:-3;
}
</style>

<script>
import moment from 'moment';
moment.locale('id');
import {
    Link
} from '@inertiajs/inertia-vue3';

export default {
    components: {
        Link
    },
    data(){
        return {
            moment : moment
        }
    },
    props : {
        fromYear : Number,
        toYear : Number,
        kepalaDesa : Object,
        sekretarisDesa : Object
    }
}

</script>
