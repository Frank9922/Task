<template>
    <div class="grid grid-cols-3 gap-10">
        <div v-for="task in tasks" class="bg-white p-4 shadow-xl rounded-md">
        <div class="flex justify-between mb-4">
    <!-- Agregar la palabra a la izquierda -->
    <span class="text-sm text-gray-500">{{ task.status.name }}</span>
    <!-- Agregar la fecha en la esquina inferior derecha -->
    <span class="text-sm text-gray-500">{{ task.expiration }}</span>
  </div>
  <h2 class="text-xl font-semibold">{{ task.title }}</h2>
  <p class="text-gray-600 mt-4 mb-4">{{ task.short_description }}</p>
  <Link :href="'/task/' + task.id" class="bg-blue-500 text-black px-4 py-2 mt-2 rounded-md hover:bg-blue-600">Ver</Link>
</div>
    </div>
</template>
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Link } from '@inertiajs/vue3';
defineProps({
    tasks: Object,
})

</script>

<style scoped>
</style>
