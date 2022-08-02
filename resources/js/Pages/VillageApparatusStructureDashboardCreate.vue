<template>
<AdminLayout :user="user">
    <div class="w-full">
        <Link :href="route('village-apparatus-structure.index')" as="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-5">Back</Link>
        <form class="w-full" method="post" @submit.prevent="submit">
            <div class="relative z-0 w-full mb-6 group">
                <label for="File">Upload Foto Perangkat</label>
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
                <img v-if="url" :src="url" class="w-full mt-4 h-80" /></div>
            <div class="relative z-0 w-full mb-6 group">
                <v-select v-model="form.apparatus_id" :options="villagers" :reduce="name => name.id" label="data"></v-select>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Perangkat</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <v-select v-model="form.position_id" :options="apparatus_positions" :reduce="position => position.id" label="position"></v-select>
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Position</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.from_year" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dari Tahun</label>
            </div>
            <div class="relative z-0 w-full mb-6 group">
                <input v-model="form.to_year" type="text" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Sampai Tahun</label>
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
                photo_path:'',
                apparatus_id: '',
                position_id: '',
                from_year: '',
                to_year: ''
            },
            url: null,
        }
    },
    props: {
        villagers: Object,
        apparatus_positions: Object,
        user: Object,
    },
    methods: {
        submit() {
            if (this.$refs.photo) {
                this.form.photo_path = this.$refs.photo.files[0];
                console.log(this.form.photo_path)
            }
            this.$inertia.post(route('village-apparatus-structure.store'), this.form)
        },
        previewImage(e) {
            const file = e.target.files[0];
            this.url = URL.createObjectURL(file);
        },
    },
    mounted() {
        this.villagers.map(function (villager) {
            return villager.data = villager.nik + '-' + villager.name;
        });
    },

}
</script>
