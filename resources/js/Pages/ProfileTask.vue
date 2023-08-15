<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import TableHistorialTask from '@/Components/TableHistorialTask.vue';
import NoteTask from '@/Components/NoteTask.vue';

defineProps({
    user: Object,
    task: Object
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
                        <div v-for="item in task.data">
                            <NoteTask
                            v-bind:id="item.id"
                            v-bind:titulo="item.titulo"
                            v-bind:contenido="item.contenido"
                            v-bind:expiracion="item.expiracion"
                            v-bind:estado="item.Estado.Nombre"
                            />
                        </div>
                        <h1 class="font-semibold text-4xl text-gray-800 leading-tight text-center">Historial</h1>
                        <TableHistorialTask v-bind:historial=historial
                        />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
