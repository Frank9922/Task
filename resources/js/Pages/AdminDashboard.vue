<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import FormTask from '@/Components/FormTask.vue';


</script>

<template>
<AppLayout title="Admin Task">
    <template #header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Bienvenido {{ $page.props.auth.user .name}}!
        </h2>
    </template>
    <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <FormTask />
                </div>
            </div>
    </div>
</AppLayout>

</template>
