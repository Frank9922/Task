<script setup>
import CardTask from '@/Components/CardTask.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({ tasks: Array})
</script>

<template>
    <AppLayout title="Tasks">
        <template #header>
            <h2>Tasks</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <h1 class="m-4">Tareas:</h1>
                    <div>
                        <div class="border p-4 pt-4 pb-4 grid grid-cols-3 grid-rows-auto" v-for="task in tasks" :key="task.id">
                            <CardTask v-for="item in task"
                            v-bind:titulo="item.titulo"
                            v-bind:descripcion_corta="item.descripcion_corta"
                            v-bind:expiracion="item.expiracion"
                            v-bind:creado="item.creado"
                            v-bind:por="item.Por.nombre"
                            v-bind:estado="item.Estado.Nombre"
                            v-bind:url_photo="item.Asignado.photo_url"
                            v-bind:url="item.url"
                            v-bind:color="item.color"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
