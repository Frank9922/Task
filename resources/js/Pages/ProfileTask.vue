<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import TableHistorialTask from '@/Components/TableHistorialTask.vue';
import NoteTask from '@/Components/NoteTask.vue';
import {ref,onMounted, watchEffect} from 'vue';

 defineProps({
    user: Object,
    task: Object,
    update: String,
    historialCompleto: Object
})



</script>

<template>
    <AppLayout title="Mis Tareas">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis Tareas
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <div v-if="task.data.length">
                            <div v-for="item in task.data">
                                <NoteTask
                                v-bind:id="item.id"
                                v-bind:titulo="item.titulo"
                                v-bind:contenido="item.contenido"
                                v-bind:expiracion="item.expiracion"
                                v-bind:estado="item.estado"
                                v-bind:status_id="item.status_id"
                                @datos-enviados="manejarDatosEnviados"
                                />
                            </div>
                        </div>
                        <div v-else>
                            <div
                            class="font-semibold text-1xl text-gray-800 text-center bg-red-200 my-4 mx-4 rounded">
                            <p class="text-red-800 text-opacity-75 pt-4 pb-4 transform motion-safe:hover:scale-110">No hay tareas en este momento!</p>
                            </div>
                        </div>
                        <div v-if="historialCompleto.data.length > 0">
                            <h1 class="font-semibold text-4xl text-gray-800 leading-tight text-center">Historial</h1>
                            <TableHistorialTask
                            v-bind:Historial="historialCompleto.data"
                            />
                        </div>
                        <div v-else>
                            <div
                            class="font-semibold text-1xl text-gray-800 text-center bg-yellow-100 my-4 mx-4 rounded">
                            <p class="text-yellow-800 text-opacity-75 pt-4 pb-4 transform motion-safe:hover:scale-110">No tienes cambios registrados!</p>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
