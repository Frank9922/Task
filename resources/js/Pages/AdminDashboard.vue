<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';


const ctx = document.getElementById('mychart');



</script>
<template>
<AppLayout title="Admin Task">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido {{ $page.props.auth.user .name}}!
        </h2>

    </template>
</AppLayout>

</template>
