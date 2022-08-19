<template>
<AdminLayout :user="user">
    <div class="w-full">
        <Link :href="route('villagers.index')" as="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-5">Back</Link>
        <form class="w-full" method="post" @submit.prevent="submit">
            <div v-if="$page.props.errors.nik" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.nik }}</h1>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.nik" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NIK</label>
            </div>
            <div v-if="$page.props.errors.name" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.name }}</h1>
            </div>
            <div class="relative z-0 w-full mb-7 group">
                <input v-model="form.name" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama</label>
            </div>
            <div v-if="$page.props.errors.places_of_birth" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.places_of_birth }}</h1>
            </div>
            <div class="relative w-full mb-7 group">

                <v-select v-model="form.places_of_birth" :options="cities" :reduce="name => name.id" label="name"></v-select>
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tempat Lahir</label>
            </div>
            <div v-if="$page.props.errors.birthday" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.birthday }}</h1>
            </div>
            <div class="relative w-full mb-7 group">

                <input type="date" v-model="form.birthday" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" ">
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tangal Lahir</label>
            </div>
            <div v-if="$page.props.errors.blood_type_id" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.blood_type_id }}</h1>
            </div>
            <div class="relative w-full mb-7 group">

                <v-select v-model="form.blood_type_id" :options="blood_types" :reduce="name => name.id" label="name"></v-select>
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Golongan Darah</label>
            </div>
            <div v-if="$page.props.errors.gender_id" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.gender_id }}</h1>
            </div>
            <div class="relative w-full mb-7 group">

                <v-select v-model="form.gender_id" :options="genders" :reduce="name => name.id" label="name"></v-select>
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Jenis Kelamin</label>
            </div>
            <div v-if="$page.props.errors.religion_id" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.religion_id }}</h1>
            </div>
            <div class="relative w-full mb-7 group">

                <v-select v-model="form.religion_id" :options="religions" :reduce="name => name.id" label="name"></v-select>
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Agama</label>
            </div>
            <div v-if="$page.props.errors.marital_status_id" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.marital_status_id }}</h1>
            </div>
            <div class="relative w-full mb-7 group">

                <v-select v-model="form.marital_status_id" :options="marital_statuses" :reduce="name => name.id" label="name"></v-select>
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Status Perkawinan</label>
            </div>
            <div v-if="$page.props.errors.profession_id" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.profession_id }}</h1>
            </div>
            <div class="relative w-full mb-7 group">
                <v-select v-model="form.profession_id" :options="professions" :reduce="name => name.id" label="name"></v-select>
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Pekerjaan</label>
            </div>
            <div v-if="$page.props.errors.nationality_id" class="w-max py-1">
                <h1 class="w-full rounded-lg text-red-700 py-3 text-center">{{ $page.props.errors.nationality_id }}</h1>
            </div>
            <div class="relative w-full mb-7 group">

                <v-select v-model="form.nationality_id" :options="nationalities" :reduce="name => name.id" label="name"></v-select>
                <label class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-1 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kewarganegaraan</label>
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

export default {
    components: {
        AdminLayout,
        Link,
        vSelect
    },
    data() {
        return {
            form: {
                nik: null,
                name: null,
                places_of_birth: null,
                birthday: null,
                blood_type_id: null,
                gender_id: null,
                religion_id: null,
                marital_status_id: null,
                profession_id: null,
                nationality_id: null
            },
        }
    },
    props: {
        user: Object,
        cities: Object,
        genders: Object,
        religions: Object,
        blood_types: Object,
        marital_statuses: Object,
        professions: Object,
        nationalities: Object,
    },
    methods: {
        submit() {
            // console.log(this.form)
            this.$inertia.post(route('villagers.store'), this.form)
        },
    },
}
</script>
