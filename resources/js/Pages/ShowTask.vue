<script setup>
import CardTask from '@/Components/CardTask.vue';
import Modal from '@/Components/Modal.vue';
import AppLayout from '@/Layouts/AppLayout.vue';


defineProps({ item: Array}, {show: Boolean});
</script>

<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2>Task {{ item.titulo }}</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ul >
                        <div class="border p-4 pt-4 pb-4">
                            <p>{{ item.data }}</p>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
