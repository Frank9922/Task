<script>

export default {
    name: 'TableHistorialTask',
    props: {
        Historial: Array
    },
}

</script>

<template>
    <div class="overflow-x-auto pt-6">
        <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
            <thead class="ltr:text-left rtl:text-right">
            <tr>
                <th class="w-[35px] whitespace-nowrap px-3 py-3 font-medium text-gray-900">
                ID
                </th>
                <th class="w-[35px] whitespace-nowrap px-3 py-3 font-medium text-gray-900">
                Titulo
                </th>
                <th class="whitespace-nowrap px-6 py-3 font-medium text-gray-900">
                Modificado
                </th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Estado Anterior
                </th>
                <th class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                Estado Posterior
                </th>
            </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
            <tr v-for ="item in Historial" :key="item.id">
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                    {{ item.id_task }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                    {{ item.title }}
                </td>
                <td class="whitespace-nowrap px-6 py-3 text-gray-700 text-center">
                    {{ item.fecha_hora }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                    {{ item.estado_anterior }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                    {{ item.estado_posterior }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
