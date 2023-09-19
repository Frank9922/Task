<script setup>
import CardTask from '@/Components/CardTask.vue';
import AppLayout from '@/Layouts/AppLayout.vue';
import PaginationTask from '@/Components/PaginationTask.vue';

defineProps({ tasks: Object})
</script>

<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tasks</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1 class="m-4">Tareas:</h1>
                    <div class="border p-4 pt-4 pb-4 grid grid-cols-3 grid-rows-auto">
                            <CardTask v-for="item in tasks.data"
                            v-bind:titulo="item.titulo"
                            v-bind:descripcion_corta="item.descripcion_corta"
                            v-bind:expiracion="item.expiracion"
                            v-bind:creado="item.creado"
                            v-bind:por="item.Por"
                            v-bind:estado="item.Estado"
                            v-bind:url_photo="item.photo_url"
                            v-bind:url="item.url"
                            v-bind:color="item.color"
                            />
                    </div>
                            <PaginationTask
                            v-bind:pagination="tasks.meta"
                            class="pt-4 mb-4"
                            />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
