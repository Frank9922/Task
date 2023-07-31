<script>

export default{
    name: 'TableHistorial',
    props: {
        historial: Array
    }
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
            <tr v-for ="item in historial">
                <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                {{ item.id }}
                </td>
                <td class="whitespace-nowrap px-6 py-3 text-gray-700 text-center">
                    {{ item.fecha_hora }}
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ item.estado_anterior }}</td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">{{ item.estado_posterior }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
