<template>
<div v-show="$page.props.flash.message || $page.props.errors.email" class="mx-auto flex p-4 mb-4 bg-lime-100 rounded-lg w-80 dark:bg-lime-200" role="alert">
    <RemixIcon :icon="'error-warning-fill'" :class="'fill-lime-700 w-5'"></RemixIcon>
    <div class="ml-3 font-bold  text-lg text-lime-700 dark:text-lime-800">
        {{ $page.props.flash.message }}
        {{ $page.props.errors.email }}
    </div>
</div>
<div class="flex justify-center h-screen items-center">
    <div class="grid grid-cols-1 gap-5 w-max justify-items-center">
        <h3 class="text-zinc-600 text-2xl font-bold mb-5">Lupa Password</h3>
        <form @submit.prevent="submit" @click="isHiddenAlert=false" class="flex justify-center w-full sm:px-0 px-4">
            <div class="relative z-0 w-full group">
                <input v-model="form.email" type="email" class="block py-2.5 h-full px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">kata sandi lama</label>
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
                email: null
            },
        }
    },
    methods: {
        submit() {
            this.$inertia.post(route('password.email'), this.form)
        }
    },
}
</script>
