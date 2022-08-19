<template>
<AdminLayout :user="auth">
    <div class="w-full">
        <Link :href="route('dashboard')" as="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-5">Back</Link>
        <form class="w-full" method="post" @submit.prevent="submit()">
            <div class="flex justify-end">
                <h3 class="text-gray-500 text-xl font-bold">Update Akun</h3>
            </div>
            <alert-danger v-show="$page.props.flash.action=='error'" :message="$page.props.flash.message"></alert-danger>
            <alert-success v-show="$page.props.flash.action=='success'" :message="$page.props.flash.message"></alert-success>
            <div class="relative z-0 w-full mb-6 group">
                <!-- <img :src="url ? url : form.path_profile_photo" class="w-full mt-4 h-80" /> -->
                <div :style="'background-image: url('+  form.path_profile_photo +');'" class="rounded-full bg-gray-500 w-40 h-40 my-6 bg-center bg-cover "></div>
                <label for="File">Upload Foto Profil</label>
                <input type="file" @change="previewImage" ref="photo" class="
                                        w-full
                                        px-4
                                        py-2
                                        mt-2
                                        border
                                        rounded-md
                                        focus:outline-none
                                        focus:ring-1
                                        focus:ring-blue-600
                                    " />
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.name" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">nama</label>
            </div>
            <!-- <QuillEditor theme="snow" :toolbar="['bold', 'italic', 'underline']" v-model="form.meta_desc" /> -->
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
        </form>
        <form class="w-full" method="post" @submit.prevent="submit_password()">
            <div class="flex justify-end">
                <h3 class="text-gray-500 text-xl font-bold">Ubah Kata Sandi</h3>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form_2.current_password" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">kata sandi lama</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form_2.new_password" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">kata sandi baru</label>
            </div>
            <!-- <QuillEditor theme="snow" :toolbar="['bold', 'italic', 'underline']" v-model="form.meta_desc" /> -->
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah</button>
        </form>
    </div>
</AdminLayout>
</template>

<script>
import AdminLayout from '../Layouts/DashboardLayaout.vue';
import {
    Link
} from '@inertiajs/inertia-vue3';
import vSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
import AlertDanger from '../Components/Alerts/AlertDanger.vue';
import AlertSuccess from '../Components/Alerts/AlertSuccess.vue';
export default {
    components: {
        AdminLayout,
        Link,
        vSelect,
        AlertDanger,
        AlertSuccess
    },
    data() {
        return {
            form: {
                path_profile_photo: this.auth.path_profile_photo,
                name: this.auth.name,
            },
            url: null,
            form_2: {
                current_password: '',
                new_password: ''
            }

        }
    },
    props: {
        auth: Object,
    },
    methods: {
        submit() {
            if (this.$refs.photo.files[0]) {
                this.form.path_profile_photo = this.$refs.photo.files[0];
            }
            console.log()
            this.$inertia.post(route('account-setting.update'), this.form)
        },
        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
            this.form.path_profile_photo = URL.createObjectURL(file);
            console.log(this.url);
        },

        submit_password() {
            this.$inertia.post(route('account-setting-password.update'), this.form_2)
        },
    },
    mounted() {
        // this.villagers.map(function (villager) {
        //     return villager.data = villager.nik + '-' + villager.name;
        // });

    },

}
</script>
