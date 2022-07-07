<template>
<section class="relative sec-contain bg-grey-lightest py-28">
    <div class="w-full max-w-2xl ml-auto mr-auto my-8">
        <div class="flex justify-center pb-20">
            <div class="grid grid-cols-1 gap-3 text-center text-white">
                <h2 class="text-4xl font-bold">Perangkat Desa</h2>
                <div>
                    <p>Perangkat Desa Bancang, Kecamatan Tragah, Kabupaten Bangkalan</p>
                    <p>Periode Tahun 2020-2025</p>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap -mx-6 -my-6 pb-20">
            <div class="w-full lg:w-1/2 px-6 py-6 text-center">
                <div class="bg-white rounded shadow-lg overflow-hidden p-8">
                    <div class="rounded-full h-64 w-64 flex items-center justify-center bg-gray-300 mx-auto mb-8"></div>
                    <div class="font-bold text-xl mb-2">Maisyaroh</div>
                    <p class="text-grey-darker text-base mb-4">Kepala Desa</p>
                    <button class="bg-transparent hover:bg-blue text-blue-dark rounded-full font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent ">Contact</button>
                </div>
            </div>
            <!--        -->
            <div class="w-full lg:w-1/2 px-6 py-6 text-center ">
                <div class="bg-white rounded shadow-lg overflow-hidden p-8">
                    <div class="rounded-full h-64 w-64 flex items-center justify-center bg-gray-300 mx-auto mb-8"></div>
                    <div class="font-bold text-xl mb-2">Ahmad Rizal</div>
                    <p class="text-grey-darker text-base mb-4">Sekretaris Desa</p>
                    <button class="bg-transparent hover:bg-blue text-blue-dark rounded-full font-semibold hover:text-white py-2 px-4 border border-blue hover:border-transparent ">Contact</button>
                </div>
            </div>
        </div>
        <div class="flex justify-center">
            <a href="" class="rounded-full px-5 py-3 bg-white text-zinc-600 hover:text-yellow-500 font-bold text-center">Lihat Selangkapnya</a>
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
