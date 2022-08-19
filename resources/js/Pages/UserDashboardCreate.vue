<template>
<AdminLayout :user="user">
    <div class="w-full">
        <Link :href="route('users.index')" as="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-5">Back</Link>
        <form class="w-full" method="post" @submit.prevent="submit()">
            <div class="relative z-0 w-full mb-6 group">
                <div :style="'background-image: url('+  form.path_profile_photo +');'" class="rounded-full bg-gray-500 w-40 h-40 my-6 bg-center bg-cover "></div>
                <label for="File">Upload Foto Pengurus</label>
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
            <div class="relative w-full mb-6 group">
                <v-select v-model="form.role_id" :options="roles" :reduce="name => name.id" label="data"></v-select>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Role-guard name</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.name" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.email" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.password" :type="isShowPassword ? 'text' : 'password'" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
                <div class="absolute top-0 right-6" @click="isShowPassword = !isShowPassword">
                    <RemixIcon :class="isShowPassword ? 'hidden' : 'block'" :icon="'eye-off-line'" style="color:gray;width:30px"></RemixIcon>
                    <RemixIcon :class="isShowPassword ? 'block' : 'hidden' " :icon="'eye-line'" style="color:gray;width:30px"></RemixIcon>
                </div>
            </div>
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
import RemixIcon from '../Components/RemixIcons.vue';
export default {
    components: {
        AdminLayout,
        Link,
        vSelect,
        RemixIcon
    },
    data() {
        return {
            form: {
                path_profile_photo: null,
                role_id: null,
                name: null,
                email: null,
                password: null
            },
            url: null,
            isShowPassword: false,
        }
    },
    props: {
        roles: Object,
        user: Object,
    },
    methods: {
        submit() {
            if (this.$refs.photo.files[0]) {
                this.form.path_profile_photo = this.$refs.photo.files[0];
            }

            this.$inertia.post(route('users.store'), this.form)
        },
        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
            this.form.path_profile_photo = this.url;
        },
    },
    mounted() {
        this.roles.map(function (roles) {
            return roles.data = roles.name + '-' + roles.guard_name;
        });
    },

}
</script>
