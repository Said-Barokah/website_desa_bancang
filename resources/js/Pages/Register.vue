<template>
<div class="flex justify-center items-center h-screen">
    <form @submit.prevent="form.post('/register')" class="w-1/2">
        <div>
            <Link :href="route('login')" class="button-back absolute left-0 top-0 mt-5 ml-5 px-20 font-bold rounded-full self-start  text-zinc-400 ring-slate-400 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Back</Link>
        </div>
        <div class="flex justify-center items-center flex-col">
            <div v-if="errors.email" class="w-full px-20">
                <h1 class="bg-red-400 w-full rounded-lg text-red-700 py-3 text-center">{{ errors.email }}</h1>
            </div>
            <div class="font-bold text-zinc-500 text-4xl">
                <h3>Register</h3>
            </div>
            <div class="mb-6 w-full px-20">
                <label for="email" class="block mb-2 text-sm font-medium text-zinc-500 font-bold dark:text-gray-300">Email</label>
                <input type="email" v-model="form.email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required>
            </div>
            <div class="mb-6 w-full px-20 ">
                <label for="password" class="block mb-2 text-sm font-medium text-zinc-500 font-bold dark:text-gray-300">Password</label>
                <input type="password" v-model="form.password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <div class="mb-6 w-full px-20 ">
                <label for="password" class="block mb-2 text-sm font-medium text-zinc-500 font-bold dark:text-gray-300">Konfirmasi Password</label>
                <input type="password" v-model="form.password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
           <div class="mb-6 w-full px-20 ">
                <label for="password" class="block mb-2 text-sm font-medium text-zinc-500 font-bold dark:text-gray-300">Nama Pengguna</label>
                <input type="text" v-model="form.name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
            </div>
            <button type="submit" class="button-register px-20 font-bold rounded-full self-start ml-20 text-white focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Register</button>
        </div>
    </form>
    <div class="w-1/2 flex justify-center items-center">
        <img src="storage/images/register/image832.webp" alt="" width="700">
    </div>
</div>
</template>
<style scoped>
.button-register {
    background-image: linear-gradient(45deg, #99ad25, #909d45);
}

.button-back {
    border: 1.5px gray solid;
}
.button-register:hover {
    background-image: linear-gradient(45deg, #909d45, #99ad25);
}

input:focus {
    border-color: #99ad25;
}
</style>
<script>
import {
    useForm
} from '@inertiajs/inertia-vue3';
import {
    Link
} from '@inertiajs/inertia-vue3';
export default {
    components : {
        Link
    },
    props: {
        errors: Object,

    },
    setup() {
        const form = useForm({
            email: null,
            password: null,
            password_confirmation: null,
            name: null,
        })

        return {
            form
        }
    },
}
</script>
