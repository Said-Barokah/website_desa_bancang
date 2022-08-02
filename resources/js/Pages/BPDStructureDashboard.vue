<template>
<AdminLayout :user="user">
    <div class="w-full">
        <Link :href="route('BPD-structure.create')" as="button" type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Tambahkan Pengurus</Link>
        <!-- Notofikasi -->
        <alert-danger v-show="$page.props.flash.action=='delete'" :message="$page.props.flash.message"></alert-danger>
        <alert-success v-show="$page.props.flash.action=='success'" :message="$page.props.flash.message"></alert-success>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg w-full">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            nama pengurus
                        </th>
                        <th scope="col" class="px-6 py-3">
                            jabatan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            priode
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="b_p_d_structure in b_p_d_structures" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                            <Link :href="route('BPD-structure.show',b_p_d_structure.id)">{{ b_p_d_structure.villager.name }}</Link>
                        </th>
                        <td class="px-6 py-4">
                            {{ b_p_d_structure.position.position }}
                        </td>
                        <td class="px-6 py-4">
                            {{ b_p_d_structure.from_year }} - {{ b_p_d_structure.to_year }}
                        </td>
                        <td class="flex justify-around px-6 py-4">
                            <Link :href="route('BPD-structure.edit',b_p_d_structure.id)" as="button" type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Edit</Link>

                            <!-- <Link  class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</Link> -->
                            <!-- <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a> -->
                            <button @click="destroy(b_p_d_structure.id)" type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>

                        </td>
                    </tr>
                </tbody>
            </table>
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
    props: {
        b_p_d_structures: Object,
        user: Object,
    },
    methods: {
        destroy(id) {
            if (confirm('Apakah anda yakin')) {
                this.$inertia.delete(route('BPD-structure.destroy', id))
            }

        }
    }
}
</script>
