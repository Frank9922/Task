<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Public Users</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <ShowUserComponent
                    v-bind:tasks="tasks"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import ShowUserComponent from '@/Components/ShowUserComponent.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    tasks: Object
})
</script>

<style scoped>

</style>
