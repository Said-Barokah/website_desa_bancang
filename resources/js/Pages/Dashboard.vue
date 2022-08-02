<template>
<AdminLayout :user="user">

</AdminLayout>
</template>
<script>
import AdminLayout from '../Layouts/DashboardLayaout.vue';

export default {
    components : {
        AdminLayout
    },
    props:{
        user:Object
    }
}
</script>
