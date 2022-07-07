<template>
<div class="flex justify-center h-screen items-center">
    <div class="grid grid-cols-1 gap-5 w-max justify-items-center">
        <img src="/storage/images/emailVerifikasi/3459559.webp" alt="" width="360">
        <h3 class="text-zinc-600 text-2xl font-bold">Verifikasi Email</h3>
        <div class="text-zinc-500 text-base font-mono text-center">
            <p>kamu wajib verifikasi email anda agar bisa mengakses halaman website ini.</p>
            <p>Kami menjaga akun anda dari serangan peretasan yang tak diinginkan.</p>
        </div>
        <form @submit.prevent="form.post(route('verification.send'))" class="flex justify-center">
            <button type='submit' class="bg-green-village px-20 py-3 text-center text-white box- rounded-md font-bold text-lg">Kirim Verifikasi</button>
        </form>
    </div>
</div>
</template>

<script>
import {
    useForm
} from '@inertiajs/inertia-vue3';

export default {
    setup() {
        const form = useForm({
        })
        return {
            form
        }

    }
}
</script>

<style>
.bg-green-village {
    background-image: linear-gradient(45deg, #99ad25, #909d45);
}
</style>
