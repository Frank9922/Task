<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import TableHistorialTask from '@/Components/TableHistorialTask.vue';

defineProps({
    user: Object,
    tasks: Object
})

</script>

<template>
    <AppLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Mis Tareas
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <ul>
                        <div class="border p-4 pt-4 pb-4">
                            <div class="overflow-x-auto pt-6">
                                <p>{{ user.data.nombre }}</p>
                                <div v-for="items in tasks">
                                    <div v-for="task in items">
                                        <!-- <p> {{ task }}</p> -->
                                    <a  class="mt-4 ml-4 mr-4 group relative block h-64 sm:h-40 lg:h-46 cursor-default">
                                        <span class="absolute inset-0 border-2 border-dashed border-black"></span>

                                        <div
                                            class="relative flex h-full transform items-end border-2 border-black bg-white transition-transform group-hover:-translate-x-2 group-hover:-translate-y-2">
                                            <div
                                                class="p-4 !pt-0 transition-opacity group-hover:absolute group-hover:opacity-0 sm:p-6 lg:p-8">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 sm:h-12 sm:w-12"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>

                                                <h2 class="mt-4 text-xl font-medium sm:text-2xl">{{ task.titulo }}</h2>
                                            </div>

                                            <div
                                                class="absolute p-4 opacity-0 transition-opacity group-hover:relative group-hover:opacity-100 sm:p-6 lg:p-8">
                                                <h3 class="mt-4 text-xl font-medium sm:text-2xl">{{ task.titulo }}</h3>

                                                <p class="mt-4 text-sm sm:text-base">
                                                    {{ task.descripcion_corta }}
                                                </p>

                                                <button href="" class="mt-8 font-bold text-right border">Cambiar Estado</button>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                </div>
                                <h1 class="font-semibold text-4xl text-gray-800 leading-tight text-center">Historial</h1>
                                <TableHistorialTask v-bind:historial=historial />
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
