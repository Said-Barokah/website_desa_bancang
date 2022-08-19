<template>
<div class="flex justify-center md:flex-row flex-col items-center h-screen">
    <div>
        <Link :href="route('home')" class="py-[12px] px-[20px] w-max border-gray-600 border-[1.5px] border-solid absolute left-0 top-0 mt-5 ml-5 md:px-20 font-bold rounded-full self-start  text-zinc-400 ring-slate-400 focus:ring-4 focus:outline-none focus:ring-blue-300 text-sm sm:w-auto md:py-2.5 text-center">Beranda</Link>
    </div>
    <div class="w-[64%] md:w-1/2 md:flex justify-center items-center md:mt-0 mt-[78px]">
        <img src="storage/images/login/2845445.webp" alt="" width="550">
    </div>
    <form @submit.prevent="form.post('/login')" class="w-full md:w-1/2">
        <div class="flex justify-center items-center flex-col">
            <div v-if="errors.email" class="w-full px-20">
                <h1 class="bg-red-400 w-full rounded-lg text-red-700 py-3 text-center">{{ errors.email }}</h1>
            </div>
            <div v-show="$page.props.flash.success" class="w-full px-20">
                <h1 class="bg-green-400 w-full rounded-lg text-white py-3 text-center">{{ $page.props.flash.success }}</h1>
            </div>
            <div class="font-bold text-zinc-500 text-4xl">
                <h3>Login</h3>

            </div>
            <div class="mb-6 w-full md:px-20 px-7">
                <label for="email" class="block mb-2 text-sm font-medium text-zinc-500 dark:text-gray-300">Email</label>
                <input type="email" v-model="form.email" id="email" class="focus:border-[#99ad25] bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
            </div>
            <div class="mb-6 w-full md:px-20 px-7 flex flex-col mt-[10px]">
                <label for="password" class="block mb-2 text-sm font-medium text-zinc-500 dark:text-gray-300">Password</label>
                <input type="password" v-model="form.password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                <Link :href="route('password.request')" class="self-end text-blue-600 mt-[10px]">Lupa password ?</Link>
            </div>
            <div class="flex justify-center md:flex-row flex-col">
                <button type="submit" class="bg-gradient-to-r md:mx-[10px] from-[#99ad25] to-[#909d45] hover:from-[#909d45] hover:to-[#99ad25] px-20 font-bold rounded-full self-start text-white focus:ring-4 focus:outline-none focus:ring-blue-300 text-sm w-full sm:w-auto  py-2.5 text-center">Login</button>
                <span class="md:hidden block text-center my-3 text-zinc-500">atau</span>
                <Link :href="route('register')" class="hover:bg-gradient-to-r md:mx-[10px] hover:from-[#a36c1b] hover:to-[#feaa2b] hover:border-none hover:py-2.5 bg-none border-4 border-[#a36c1b] text-[#a36c1b] py-[6px] px-20 font-bold rounded-full self-start hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 text-sm w-full sm:w-auto text-center ">Daftar</Link>
            </div>

        </div>
    </form>
</div>
</template>

<script>
import {
    useForm
} from '@inertiajs/inertia-vue3';
import {
    Link
} from '@inertiajs/inertia-vue3';


export default {
    components: {
        Link
    },
    props: {
        errors: Object,
        success: String,
    },
    data() {
        return {
            link_gambar: 'https://www.freepik.com/free-vector/farmers-doing-agricultural-work-together_5524745.htm#query=farmers&position=14&from_view=search'
        }
    },
    setup() {
        const form = useForm({
            email: null,
            password: null
        })

        form.setError({
            foo: 'Your error message for the foo field.',
            bar: 'Some other error for the bar field.'
        });

        return {
            form
        }
    },
}
</script>
