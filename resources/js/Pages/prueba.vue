<script setup>

defineProps({ tasks: Array})

</script>

<template>
    <h2>xdxdxd</h2>
    <ul v-for="task in tasks">
        <li>{{ task.expiration }}</li>
    </ul>
</template>
