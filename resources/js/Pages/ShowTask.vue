<script setup>
import SectionCard from '@/Components/SectionCard.vue';
import TableHistorialTask from '@/Components/TableHistorialTask.vue';
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
                            <!-- <p>{{ item.data }}</p> -->
                            <SectionCard
                            v-bind:titulo="item.data.titulo"
                            v-bind:contenido="item.data.contenido"
                            v-bind:creado="item.data.creado"
                            v-bind:por="item.data.Por.nombre"
                            v-bind:estado="item.data.Estado.Nombre"
                            v-bind:expiracion="item.data.expiracion"
                            v-bind:Asignado_photo_url="item.data.Asignado.photo_url"
                            />

                            <TableHistorialTask />
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
