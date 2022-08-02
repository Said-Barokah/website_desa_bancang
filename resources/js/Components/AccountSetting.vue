<template>
<div class="container px-8 py-11 z-50 mx-auto h-screen overflow-y-auto bg-white fixed">
    <div class="my-6">
        <h3 class="font-bold text-gray-700 text-2xl">Pengaturan pengguna</h3>
    </div>

    <form class="w-full max-w-lg" @submit.prevent="submit()">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">

                <RemixIcon v-show="!url" :icon="'user-fill'" :class="'rounded-full bg-gray-500 w-40 h-40 my-6 fill-white p-5'"></RemixIcon>
                <div v-show="url" :style="'background-image: url('+ url +');'" class="rounded-full bg-gray-500 w-40 h-40 my-6 bg-center bg-cover "></div>
                <div v-show="$page.props.flash.action=='success'" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                    <RemixIcon :icon="'error-warning-fill'" :class="'fill-green-700 w-5'"></RemixIcon>
                    <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                        {{ $page.props.flash.message }}
                    </div>
                    <RemixIcon @click="$page.props.flash.action='close'" :icon="'close-fill'" :class="'ml-auto -mx-1.5 -my-1.5 bg-green-100 fill-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 '"></RemixIcon>
                </div>
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                    Upload Foto Profil
                </label>
                <input ref="photo" @change="previewImage" class="appearance-none block w-full bg-gray-200 text-gray-700 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="file">
                <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
            </div>
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Nama Pengguna
                </label>
                <input v-model="form.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="w-full px-3 mb-6">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    Email
                </label>
                <input disabled v-model="user.email" class="appearance-none mb-3 block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="w-full px-3">
                <div class=""></div>
                <div class="">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Memperbarui
                    </button>
                </div>
            </div>
        </div>
    </form>

    <form class="w-full max-w-lg" @submit.prevent="submit_password()">
        <div v-show="$page.props.flash.action=='error'" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
            <RemixIcon :icon="'error-warning-fill'" :class="'fill-red-700 w-5'"></RemixIcon>
            <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                {{ $page.props.flash.message }}
            </div>
            <RemixIcon @click="$page.props.flash.action='close'" :icon="'close-fill'" :class="'ml-auto -mx-1.5 -my-1.5 bg-red-100 fill-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 '"></RemixIcon>
        </div>
        <div v-show="$page.props.flash.action=='success-password'" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
            <RemixIcon :icon="'error-warning-fill'" :class="'fill-green-700 w-5'"></RemixIcon>
            <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                {{ $page.props.flash.message }}
            </div>
            <RemixIcon @click="$page.props.flash.action='close'" :icon="'close-fill'" :class="'ml-auto -mx-1.5 -my-1.5 bg-green-100 fill-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 '"></RemixIcon>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 relative">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    password sekarang
                </label>
                <input v-model="form2.current_password" required class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" :type="isShowCurrentPassword ? 'text' : 'password'">
                <div class="absolute top-8 right-6" @click="isShowCurrentPassword = !isShowCurrentPassword">
                    <RemixIcon :class="isShowCurrentPassword ? 'hidden' : 'block'" :icon="'eye-off-line'" style="color:gray;width:30px"></RemixIcon>
                    <RemixIcon :class="isShowCurrentPassword ? 'block' : 'hidden' " :icon="'eye-line'" style="color:gray;width:30px"></RemixIcon>
                </div>
            </div>
            <div class="w-full px-3 mb-6 relative">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                    password baru
                </label>
                <input v-model="form2.new_password" required class="appearance-none mb-3 block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" :type="isShowNewPassword ? 'text' : 'password'">
                <div class="absolute top-8 right-6" @click="isShowNewPassword = !isShowNewPassword">
                    <RemixIcon :class="isShowNewPassword ? 'hidden' : 'block'" :icon="'eye-off-line'" style="color:gray;width:30px"></RemixIcon>
                    <RemixIcon :class="isShowNewPassword ? 'block' : 'hidden' " :icon="'eye-line'" style="color:gray;width:30px"></RemixIcon>
                </div>
            </div>
            <div class="w-full px-3">
                <div class=""></div>
                <div class="">
                    <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Memperbarui
                    </button>
                </div>
            </div>
        </div>
    </form>
    <RemixIcon @click="$emit('hidden-container')" :icon="'close-line'" class="absolute top-1 right-0 hover:bg-gray-300 p-2 rounded-full" style="color:gray;width:50px"></RemixIcon>
</div>
</template>

<script>
import AlertSuccess from "./Alerts/AlertSuccess.vue";
import RemixIcon from "./RemixIcons.vue";
export default {
    components: {
        RemixIcon,
        AlertSuccess
    },
    data() {
        return {
            form: {
                path_profile_photo: this.user.path_profile_photo,
                name: this.user.name
            },

            form2: {
                current_password: null,
                new_password: null
            },
            isShowCurrentPassword: false,
            isShowNewPassword: false,
            url: false
        }
    },
    props: {
        user: Object,
        message: String,
    },

    methods: {
        submit() {
            if (this.$refs.photo.files[0]) {
                this.form.path_profile_photo = this.$refs.photo.files[0];
            }
            this.$inertia.post(route('user-account-setting.update'), this.form)
        },
        submit_password() {
            this.$inertia.post(route('user-account-setting-password.update'), this.form2)
        },
        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },

    },
    created() {
        this.url = this.form.path_profile_photo
    }
}
</script>

<style scoped>
@media (min-width: 640px) {
    .container {
        width: 640px
    }
}
</style>
