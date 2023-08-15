<script>
import Dropdown from '@/Components/Dropdown.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';
import DropdownLink from '@/Components/DropdownLink.vue';

const form = useForm({
    id: null,
    estado: null,
    remember: false,
})

export default {
    name: 'NoteTask',
    props: {
        id: Number,
        titulo: String,
        contenido: String,
        expiracion: String,
        estado: String,
        estadoDrop: String,
        status_id: Number
    },
    components: { Dropdown, DropdownLink },
    methods: {
        getStatusClass(status){
            switch (status){
                case 'Pendiente':
                    return 'bg-yellow-100 text-yellow-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-yellow-900 dark:text-yellow-300 border border-yellow-400';

                case 'En Proceso':
                    return 'bg-blue-100 text-blue-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-blue-900 dark:text-blue-300 border border-blue-400';

                case 'Completada':
                    return 'bg-green-100 text-green-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-green-900 dark:text-green-300 border border-green-400';

                case 'Expirada':
                    return 'bg-red-100 text-red-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-red-900 dark:text-red-300 border border-red-400';

                case 'Cancelada':
                    return 'bg-gray-100 text-gray-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-gray-900 dark:text-gray-300 border border-gray-400';

                default:
                    return 'border border-gray-400 ';
            }
        },
        isDisabled(status) {
            return ['Completada', 'Expirada', 'Cancelada'].includes(status);
        },
        changeStatus(id, estado) {
        this.$inertia.put('/profile/mis-tareas', {
                payload: {
                    id: parseInt(this.id),
                    estado: this.status_id
                }
            });
            this.$forceUpdate();
        },
}
}

</script>

<template>
    <div class="mx-auto container py-4 px-6">
        <div
            class="w-full h-64 flex flex-col justify-between dark:bg-gray-800 bg-white dark:border-gray-700 rounded-lg border border-gray-400 mb-6 py-5 px-4">
            <div class="overflow-auto">
                <h4 class="text-gray-800 dark:text-gray-100 font-bold mb-3">{{ titulo }}</h4>
                <p class="text-gray-800 dark:text-gray-100 text-sm flex">{{ contenido }}</p>
            </div>
            <div>
                <span :class="getStatusClass(estado)">
                    {{ estado }}
                </span>
                <div class="flex items-center justify-between text-gray-800 dark:text-gray-100">
                    <p class="text-sm py-1"> {{ expiracion }}</p>

                    <Dropdown v-if="!isDisabled(estado)" align="right" width="48">
                        <template #trigger>
                            <span
                                class="cursor-pointer flex items-center px-3 py-2 border border-gray-300 rounded-md transition duration-300 ease-in-out hover:bg-gray-100 hover:border-gray-400">
                                Opciones
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </template>
                        <template #content>
                            <div>
                                <form @submit.prevent="submit(id, status_id)">
                                    <div v-if="estado === 'Pendiente'">
                                        <DropdownLink as="button" v-on:click="changeStatus(id, status_id)">Empezar Tarea</DropdownLink>
                                    </div>
                                    <div v-if="estado === 'En Proceso'">
                                        <DropdownLink as="button" v-on:click="changeStatus(id, status_id)">Terminar Tarea</DropdownLink>
                                    </div>
                                </form>
                            </div>
                        </template>
                    </Dropdown>
                </div>
            </div>
        </div>
    </div>
</template>

