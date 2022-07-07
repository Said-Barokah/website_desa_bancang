<template>
<!-- Component Code -->
<section class="xl:py-28 px-5 sm:p-10 md:p-16">
    <div class="flex justify-center mb-16">
        <div>
            <h2 class="font-bold text-4xl text-center text-zinc-600 mb-5">Berita Terkini</h2>
            <p class="text-zinc-500">kami menyediakan berita terkini yang aktual dan terpercaya</p>
        </div>
    </div>

    <div class="max-w-screen-lg mx-auto mb-16">
        <div class="rounded overflow-hidden flex flex-col mx-auto text-center">
            <a href="#">
                <img class="w-full my-4" src="https://images.pexels.com/photos/5120892/pexels-photo-5120892.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=625.0&sharp=10&w=1500" alt="Sunset in the mountains">
            </a>
            <a href="#" class="text-green-village max-w-3xl mx-auto text-xl sm:text-4xl font-semibold inline-block text-zinc-500 transition duration-500 ease-in-out inline-block mb-2">The Best Activewear from the Nordstrom Anniversary Sale</a>
            <p class="text-zinc-500 text-base leading-8 max-w-2xl mx-auto">
                Machu Picchu is a 15th-century Inca citadel situated on a mountain ridge 2,430 metres (7,970 ft) above sea level. It is located in the Cusco Region.
            </p>
            <div class="py-5 text-sm font-regular text-gray-900 flex items-center justify-center">
                <span class="mr-3 flex flex-row items-center">
                    <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                    <span class="ml-1 text-zinc-500 text-green-village">6 mins ago</span>
                </span>
                <a href="#" class="flex flex-row items-center hover:text-indigo-600  mr-3">
                    <RemixIcon :icon="'user-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                    <span class="ml-1 text-zinc-500 text-green-village">AliSher Azimi</span>
                </a>
                <a href="#" class="flex flex-row items-center hover:text-indigo-600">
                    <RemixIcon :icon="'flag-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                    <span class="ml-1 text-zinc-500 text-green-village">activewear</span>
                </a>
            </div>
            <hr />

        </div>
    </div>
    <!-- Component Code -->
    <div class="max-w-screen-xl mx-auto px-5 sm:px-10 md:px-16">
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-10">
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#">
                    <div class="relative">
                        <img class="w-full" src="https://images.pexels.com/photos/196667/pexels-photo-196667.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Sunset in the mountains">
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                        <a href="#!">
                            <div class="absolute bottom-0 left-0 bg-green-village px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Photos
                            </div>
                        </a>
                        <a href="!#">
                            <div class="text-sm absolute top-0 right-0 bg-green-village px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                <span class="font-bold">27</span>
                                <small>March</small>
                            </div>
                        </a>
                    </div>
                </a>
                <div class="px-6 py-4">
                    <a href="#" class="text-green-village font-semibold text-lg inline-block text-zinc-500 transition duration-500 ease-in-out">Best View in Newyork City</a>
                    <p class="text-gray-500 text-sm">
                        The city that never sleeps
                    </p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row items-center">
                        <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                        <span class="ml-1 text-zinc-500">6 mins ago</span>
                    </span>
                </div>
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#">
                    <div class="relative">
                        <img class="w-full" src="https://images.pexels.com/photos/1653877/pexels-photo-1653877.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Sunset in the mountains">
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                        <a href="#!">
                            <div class="absolute bottom-0 left-0 bg-green-village px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Photos
                            </div>
                        </a>
                        <a href="!#">
                            <div class="text-sm absolute top-0 right-0 bg-green-village px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                <span class="font-bold">20</span>
                                <small>March</small>
                            </div>
                        </a>
                    </div>
                </a>
                <div class="px-6 py-4">
                    <a href="#" class="text-green-village font-semibold text-lg inline-block text-zinc-500 transition duration-500 ease-in-out">Best Pizza in Town</a>
                    <p class="text-gray-500 text-sm">
                        The collection of best pizza images in Newyork city
                    </p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row justify-between items-center">
                        <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                        <span class="ml-1 text-zinc-500">3 mins read</span>
                    </span>
                </div>
            </div>
            <div class="rounded overflow-hidden shadow-lg">
                <a href="#">
                    <div class="relative">
                        <img class="w-full" src="https://images.pexels.com/photos/257816/pexels-photo-257816.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="Sunset in the mountains">
                        <div class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25"></div>
                        <a href="#!">
                            <div class="absolute bottom-0 left-0 bg-green-village px-4 py-2 text-white text-sm hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                Photos
                            </div>
                        </a>
                        <a href="!#">
                            <div class="text-sm absolute top-0 right-0 bg-green-village px-4 text-white rounded-full h-16 w-16 flex flex-col items-center justify-center mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                <span class="font-bold">15</span>
                                <small>April</small>
                            </div>
                        </a>
                    </div>
                </a>
                <div class="px-6 py-4">
                    <a href="#" class="text-green-village font-semibold text-lg inline-block text-zinc-500 transition duration-500 ease-in-out">Best Salad Images ever</a>
                    <p class="text-gray-500 text-sm">
                        The collection of best salads of town in pictures
                    </p>
                </div>
                <div class="px-6 py-4 flex flex-row items-center">
                    <span href="#" class="py-1 text-sm font-regular text-gray-900 mr-1 flex flex-row justify-between items-center">
                        <RemixIcon :icon="'time-fill'" style="width:13px; fill:#6f8744;"></RemixIcon>
                        <span class="ml-1 text-zinc-500">6 mins read</span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

body {
    font-family: 'Poppins', sans-serif !important;
}
.text-green-village:hover {
    color: #6f8744;
}
.bg-green-village {
    background-color: #6f8744;
}
.bg-green-village:hover {
    color : #6f8744;
    background-color: white;
}
</style>

<script>
import RemixIcon from './RemixIcons.vue';
export default {
    components : {
        RemixIcon
    },
    data() {
        return {
            url: '<!-- Credit: Componentity.com -->'
        }
    }
}
</script>
