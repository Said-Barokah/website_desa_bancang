<template>
<div v-show="$page.props.flash.action=='success'" class="mx-auto flex p-4 mb-4 bg-lime-100 rounded-lg w-80 dark:bg-lime-200" role="alert">
    <RemixIcon :icon="'error-warning-fill'" :class="'fill-lime-700 w-5'"></RemixIcon>
    <div class="ml-3 font-bold  text-lg text-lime-700 dark:text-lime-800">
        {{ $page.props.flash.message }}
    </div>
    <RemixIcon @click="$page.props.flash.action='close'" :icon="'close-fill'" :class="'ml-auto -mx-1.5 -my-1.5 bg-lime-100 fill-lime-500 rounded-lg focus:ring-2 focus:ring-lime-400 p-1.5 hover:bg-lime-200 inline-flex h-8 w-8 '"></RemixIcon>
</div>
<div class="flex justify-center h-screen items-center">
    <div class="grid grid-cols-1 gap-5 w-max justify-items-center">
        <img src="/storage/images/emailVerifikasi/3459559.webp" alt="" width="360">
        <h3 class="text-zinc-600 text-2xl font-bold">Verifikasi Email</h3>
        <div class="text-zinc-500 text-base font-mono text-center">
            <p>kamu wajib verifikasi email anda agar bisa mengakses halaman website ini.</p>
            <p>Kami menjaga akun anda dari serangan peretasan yang tak diinginkan.</p>
        </div>
        <form @submit.prevent="form.post(route('verification.send'))" @click="isHiddenAlert=false" class="flex justify-center">
            <button type='submit' class="bg-green-village px-20 py-3 text-center text-white box- rounded-md font-bold text-lg">Kirim Verifikasi</button>
        </form>
    </div>
</div>
</template>

<script>
import {
    useForm
} from '@inertiajs/inertia-vue3';
import RemixIcon from '../Components/RemixIcons.vue';
export default {
    components: {
        RemixIcon
    },
    setup() {
        const form = useForm({})
        return {
            form
        }

    },

    data() {
        return {
            isHiddenAlert: true
        }
    }
}
</script>

<style>
.bg-green-village {
    background-image: linear-gradient(45deg, #99ad25, #909d45);
}
</style>
