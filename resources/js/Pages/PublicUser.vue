<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Public Users</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl">
                    <TableUser
                    v-bind:users="users.data"
                    />
                    <!-- <pre>{{ users }}</pre> -->
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TableUser from '@/Components/TableUser.vue';

defineProps({
    users: Object
});
</script>

<style scoped>
</style>
