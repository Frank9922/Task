<script>
export default{
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
                    <b>Exp: </b>{{ url }}

                </p>

                <a class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                    {{ estado }}
                </a>
                <a target='_blank' v-bind:href="url" class='block mt-1.5 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform rounded-[14px] hover:bg-[#F2ECE7] hover:text-[#000000dd] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                    Ver
                </a>
            </div>
            </div>
        </div>
    </div>
</template>
