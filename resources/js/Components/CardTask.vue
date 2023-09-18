<script>
export default {
    name: 'TaskCard',
    props: {
        id: Number,
        titulo: String,
        descripcion_corta: String,
        creado: String,
        expiracion: String,
        por: String,
        estado: String,
        url: String,
        url_photo: String,
        color: String
    },
    methods: {
        getStatusClass(status){
            switch(status) {
                case 'Pendiente':
                    return 'bg-yellow-100 border-2 border-yellow-400 block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-yellow-200 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80';

                case 'En Proceso':
                    return 'bg-blue-100 border-2 border-blue-400 block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-blue-300 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80';

                case 'Completada':
                    return 'bg-green-100 border-2 border-green-400 block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-green-300 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80';

                case 'Expirada':
                    return 'bg-red-100 border-2 border-red-400 block  mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-red-300 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80';

                case 'Cancelada':
                    return 'bg-fuchsia-200 border-2 border-fuchsia-400 block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-fuchsia-400 focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80';

                default:
                    return 'border border-gray-400 ';
            }
        }
    }
}
</script>
<template>
    <div class='items-center justify-center from-[#F9F5F3] via-[#F9F5F3] to-[#F9F5F3] bg-gradient-to-br px-5 mt-6 mb-6'>
        <div class='bg-white rounded-3xl shadow-xl overflow-hidden'>
            <div class='max-w-md mx-auto'>
            <div class='h-[236px]'>
                <img v-bind:src="url_photo" alt="photo" class="h-[250px] w-[350px]" >
            </div>
            <div class='p-4 sm:p-6'>
                <p class='font-bold text-gray-700 text-[26px] leading-7 mb-1'>
                    {{ titulo }}
                </p>
                <div class='flex flex-row'>
                <p class='text-[#3C3C4399] text-[17px] mr-2'>
                    {{ creado }}
                </p>
                </div>
                <p class='text-[#7C7C80] font-[15px] mt-6'>{{ descripcion_corta }}</p>
                <p class='text-[#3C3C4399] text-[17px] mr-2 mt-6'>
                   <b> Asignado por: </b>{{ por }}
                </p>
                <p class='text-[#3C3C4399] text-[17px] mr-2'>
                    <b>Exp: </b>{{ expiracion }}

                </p>

                <span :class="getStatusClass(estado)" class=' block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                    {{ estado }}
                </span>
                <a target='_blank' v-bind:href="url" class='border-2 border-gray-400 block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-gray-300 hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                    Ver
                </a>
            </div>
            </div>
        </div>
    </div>
</template>
