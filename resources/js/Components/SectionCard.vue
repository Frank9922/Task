<script>
export default{
    name: 'SectionCard',
    props: {
        id: Number,
        titulo: String,
        creado: String,
        contenido: String,
        expiracion: String,
        por: String,
        estado: String,
        url: String,
        color: String,
        Asignado_photo_url: String
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
    <section>
        <div class="max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 lg:py-16">
            <div
            class="grid grid-cols-1 gap-y-8 lg:grid-cols-2 lg:items-center lg:gap-x-16"
            >
            <div
                class="mx-auto max-w-lg text-center lg:mx-0 ltr:lg:text-left rtl:lg:text-right"
            >
                <h2 class="text-3xl font-bold sm:text-4xl">{{ titulo }}</h2>

                <p class="mt-4 text-gray-600">
                    {{ contenido }}
                </p>
                <span :class="getStatusClass(estado)">
                    {{ estado }}
                </span>
            </div>

            <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 ">
                <div class="col-span-3">
                    <img v-bind:src="Asignado_photo_url" alt="photo" class="w-full">
                </div>
                <a
                class="block rounded-xl border border-gray-100 p-4 row-start-2 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                href="#"
                >
                <span class="inline-block rounded-lg bg-gray-50 p-3">
                    <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                    ></path>
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                    ></path>
                    </svg>
                </span>

                <h2 class="mt-2 font-bold">Creada</h2>

                <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                    {{creado }}
                </p>
                </a>

                <a
                class="block rounded-xl border border-gray-100 p-4 row-start-2 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                href="#"
                >
                <span class="inline-block rounded-lg bg-gray-50 p-3">
                    <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                    ></path>
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                    ></path>
                    </svg>
                </span>

                <h2 class="mt-2 font-bold">Por</h2>

                <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                    {{ por }}
                </p>
                </a>

                <a
                class="block rounded-xl border border-gray-100 p-4 row-start-2 shadow-sm hover:border-gray-200 hover:ring-1 hover:ring-gray-200 focus:outline-none focus:ring"
                href="#"
                >
                <span class="inline-block rounded-lg bg-gray-50 p-3">
                    <svg
                    class="h-6 w-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                    >
                    <path d="M12 14l9-5-9-5-9 5 9 5z"></path>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"
                    ></path>
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"
                    ></path>
                    </svg>
                </span>

                <h2 class="mt-2 font-bold">Expiracion</h2>

                <p class="hidden sm:mt-1 sm:block sm:text-sm sm:text-gray-600">
                    {{ expiracion }}
                </p>
                </a>
            </div>
            </div>
        </div>
    </section>
</template>
