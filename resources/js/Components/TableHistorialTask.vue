<script>

export default {
    name: 'TableHistorialTask',
    props: {
        Historial: Array
    },
    methods: {
        getStatusClass(status){
            switch(status){
                case 'Pendiente':
                    return 'bg-yellow-100 text-yellow-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-yellow-900 dark:text-yellow-300 border border-yellow-400';

                case 'En Proceso':
                    return 'bg-blue-100 text-blue-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-blue-900 dark:text-blue-300 border border-blue-400';

                case 'Completada':
                    return 'bg-green-100 text-green-800  text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-green-900 dark:text-green-300 border border-green-400';

                case 'Expirada':
                    return 'bg-red-100 text-red-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-red-900 dark:text-red-300 border border-red-400';

                case 'Cancelada':
                    return 'bg-gray-100 text-gray-800 text-1xs font-medium mr-2 py-1 px-2.5 rounded dark:bg-gray-900 dark:text-gray-300 border border-gray-400';

                default:
                    return 'border border-gray-400 ';
            }
        }
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
                    <span :class="getStatusClass(item.estado_anterior)">
                        {{ item.estado_anterior }}
                    </span>
                </td>
                <td class="whitespace-nowrap px-4 py-2 text-gray-700 text-center">
                    <span :class="getStatusClass(item.estado_posterior)">
                        {{ item.estado_posterior}}
                    </span>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
