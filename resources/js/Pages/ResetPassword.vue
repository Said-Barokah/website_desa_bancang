<template>
<div v-show="$page.props.errors.email || $page.props.errors.password " class="mx-auto flex p-4 mb-4 bg-lime-100 rounded-lg w-80 dark:bg-lime-200" role="alert">
    <RemixIcon :icon="'error-warning-fill'" :class="'fill-lime-700 w-5'"></RemixIcon>
    <div class="ml-3 fnt-bold  text-lg text-lime-700 dark:text-lime-800">
        {{ $page.props.errors.email }}
        {{ $page.props.errors.password }}
    </div>
</div>
<div class="flex justify-center h-screen items-center">
    <div class="grid grid-cols-1 gap-5 w-max justify-items-center">
        <h3 class="text-zinc-600 text-2xl font-bold mb-5">Lupa Password</h3>
        <form @submit.prevent="submit" @click="isHiddenAlert=false" class="flex justify-center flex-col w-full">
            <div class="relative z-0 w-full group mb-[18px]">
                <input v-model="form.email" type="email" class="block py-2.5 h-full px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
            </div>
            <div class="relative z-0 w-full group mb-[18px]">
                <input v-model="form.password" type="password" class="block py-2.5 h-full px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>
            <div class="relative z-0 w-full group mb-[18px]">
                <input v-model="form.password_confirmation" type="password" class="block py-2.5 h-full px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Konfirmasi Password</label>
            </div>
            <button type='submit' class="bg-gradient-to-r from-[#caec01] to-[#99ad25] ml-6 py-2 px-6 text-center text-white box- rounded-md font-medium text-sm">Kirim</button>
        </form>
        <img src="/storage/images/forgotPassword/2942004.webp" alt="" width="360">
    </div>
</div>
</template>

<script>
import RemixIcon from '../Components/RemixIcons.vue';
export default {
    components: {
        RemixIcon
    },

    data() {
        return {
            isHiddenAlert: true,
            form: {
                email: null,
                password: null,
                password_confirmation: null,
                token: this.token
            },
        }
    },
    props: {
        token: String
    },
    methods: {
        submit() {
            this.$inertia.post(route('password.update'), this.form)
        },
    },
}
</script>
