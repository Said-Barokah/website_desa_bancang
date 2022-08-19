<template>
<AdminLayout :user="user">
    <div class="w-full">
        <div class="w-full flex ">
            <Link :href="route('villagers.create')" as="button" type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2">Tambah Masyarakat</Link>
            <form class="" @submit.prevent="submit">
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-gray-300">Search</label>
                <div class="relative contain-form">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" v-model="form.keyword" class="block p-4 pl-10 pr-20 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300" placeholder="Cari nik, nama ....">
                    <button type="submit" class="absolute top-2 right-0 text-white bg-gradient-to-r from-lime-400 to-lime-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cari</button>
                </div>
            </form>
        </div>

        <!-- Notofikasi -->
        <alert-danger v-show="$page.props.flash.action=='delete'" :message="$page.props.flash.message"></alert-danger>
        <alert-success v-show="$page.props.flash.action=='success'" :message="$page.props.flash.message"></alert-success>
        <div class="overflow-x-auto shadow-md sm:rounded-lg w-full mt-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="villager in villagers.data" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <Link :href="route('villagers.show',villager.id)">{{ villager.id }}</Link>
                        </th>
                        <td class="px-6 py-4">
                            {{ villager.nik }}
                        </td>
                        <td class="px-6 py-4">
                            {{ villager.name }}
                        </td>
                        <td class="flex justify-around px-6 py-4">
                            <Link :href="route('villagers.edit',villager.id)" as="button" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</Link>

                            <!-- <Link  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link> -->
                            <!-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> -->
                            <button @click="destroy(villager.id)" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <div class="flex justify-end">
                <Link v-show="villagers.prev_page_url" :href='keyword == null ? villagers.prev_page_url : villagers.prev_page_url+"&keyword="+keyword' class="inline-flex items-center py-2 px-4 mr-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                <svg class="mr-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                </svg>
                Previous
                </Link>
                <Link v-show="!isHiddenNextPagination" :href="keyword == null ? villagers.next_page_url : villagers.next_page_url+'&keyword='+keyword  " class="inline-flex items-center py-2 px-4 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                Next
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                </Link>
            </div>

        </div>
    </div>
</AdminLayout>
</template>

<script>
import AdminLayout from '../Layouts/DashboardLayaout.vue';
import {
    Link
} from '@inertiajs/inertia-vue3';
import AlertDanger from '../Components/Alerts/AlertDanger.vue';
import AlertSuccess from '../Components/Alerts/AlertSuccess.vue';
export default {
    components: {
        AdminLayout,
        Link,
        AlertDanger,
        AlertSuccess
    },
    data() {
        return {
            form: {
                keyword: this.keyword
            },
            isHiddenNextPagination: true
        }
    },
    props: {
        villagers: Object,
        user: Object,
        keyword: String
    },
    methods: {
        destroy(id) {
            if (confirm('Apakah anda yakin')) {
                this.$inertia.delete(route('management-position.destroy', id))
            }

        },
        submit() {
            this.$inertia.get(route('villagers.index'), this.form)
        },
    },
    created() {
        if (this.villagers.next_page_url != null) {
            this.isHiddenNextPagination = false
        }
    }
}
</script>
