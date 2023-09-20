<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Rol
                </th>
                <th scope="col" class="px-6 py-3">
                    Tareas F.
                </th>
                <th scope="col" class="px-6 py-3">
                    Foto
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="user in users" class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ user.name }}
                </th>
                <td class="px-6 py-4">
                    {{ user.role.name }}
                </td>
                <td class="px-6 py-4">
                    {{ user.completed_tasks }}
                </td>
                <td class="px-6 py-4">
                    <img
                        :src="user.profile_photo_url"
                        class="w-12 rounded-lg shadow-lg"
                        alt="Avatar" />
                </td>
                <td class="px-6 py-4">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Ver</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script >

export default{
    name: "TableUser",
    props: {
        users: Object
    }
}
</script>

<style scoped>
</style>
