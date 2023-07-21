<script setup>
    import{Link, Head} from '@inertiajs/vue3'

    defineProps({ users: Array})
</script>

<template>
    <div v-for="user in users" :key="user.id" >
        <h3>{{ user.name }}</h3>
    </div>
</template>


<style scoped>

</style>
