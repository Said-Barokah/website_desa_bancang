<template>
<AdminLayout :user="user">
    <div class="w-full grid grid-cols-1 gap-y-4">
        <div class="flex w-full justify-between">
            <div class="flex justify-between p-3 shadow-lg w-[23%] bg-white">
                <div class="flex flex-col justify-center">
                    <span class="text-[12px]">Total Masyarakat</span>
                    <span class="text-2xl"> {{ totalVillager }} </span>
                </div>
                <div class="p-5 bg-gradient-to-tr from-[#8296ab] to-[#002b5b]">
                    <RemixIcon icon="user-location-fill" class="fill-white h-[24px] w-[24px]"></RemixIcon>
                </div>
            </div>
            <div class="flex justify-between p-3 shadow-lg w-[23%] bg-white">
                <div class="flex flex-col justify-center">
                    <span class="text-[12px]">Total Berita</span>
                    <span class="text-2xl"> {{ totalPost }} </span>
                </div>
                <div class="p-5 bg-gradient-to-tr from-[#8296ab] to-[#002b5b]">
                    <RemixIcon icon="newspaper-fill" class="fill-white h-[24px] w-[24px]"></RemixIcon>
                </div>
            </div>
            <div class="flex justify-between p-3 shadow-lg w-[23%] bg-white">
                <div class="flex flex-col justify-center">
                    <span class="text-[12px]">Total Perangkat Desa</span>
                    <span class="text-2xl"> {{ totalApparatus }} </span>
                </div>
                <div class="p-5 bg-gradient-to-tr from-[#8296ab] to-[#002b5b]">
                    <RemixIcon icon="user-2-fill" class="fill-white h-[24px] w-[24px]"></RemixIcon>
                </div>
            </div>
            <div class="flex justify-between p-3 shadow-lg w-[23%] bg-white">
                <div class="flex flex-col justify-center">
                    <span class="text-[12px]">Total BPD</span>
                    <span class="text-2xl"> {{ totalBPD }} </span>
                </div>
                <div class="p-5 bg-gradient-to-tr from-[#8296ab] to-[#002b5b]">
                    <RemixIcon icon="user-settings-fill" class="fill-white h-[24px] w-[24px]"></RemixIcon>
                </div>
            </div>
        </div>
        <div class="grid grid-rows-2 grid-cols-8 gap-4">
            <div class="bg-white w-full font-bold p-4 col-span-2">
                <span>Laki - Laki</span>
                <div class="flex items-center justify-around">
                    <span class="text-3xl">504</span>
                    <span class="bg-pink-300 text-pink-700 px-[6px] py-[2px]">20%</span>
                </div>
            </div>
            <div class="bg-white h-full w-full row-span-2 col-span-6">
            </div>
            <div class="bg-white w-full font-bold p-4 col-span-2">
                <span>Perempuan</span>
                <div class="flex items-center justify-around">
                    <span class="text-3xl">404</span>
                    <span class="bg-lime-300 text-lime-700 px-[6px] py-[2px]">20%</span>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto shadow-md sm:rounded-lg w-full">
            <label class="text-[1.2rem] block bg-[#8296ab] w-full py-[5px] px-[20px] text-white font-bold">Perangkat Desa Periode Sekarang</label>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            nama perangkat
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
                    <tr v-for="village_apparatus_structure in village_apparatus_structures.data" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap" :title="village_apparatus_structure.villager.nik ">
                             {{ village_apparatus_structure.villager.name  }}
                        </th>
                        <td class="px-6 py-4">
                            {{ village_apparatus_structure.position.position }}
                        </td>
                        <td class="px-6 py-4">
                            {{ village_apparatus_structure.from_year }} - {{ village_apparatus_structure.to_year }}
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
import RemixIcon from '../Components/RemixIcons.vue';

export default {
    components: {
        AdminLayout,
        RemixIcon
    },
    props: {
        user: Object,
        village_apparatus_structures: Object,
        totalVillager : Number,
        totalPost : Number,
        totalApparatus : Number,
        totalBPD : Number

    }
}
</script>
