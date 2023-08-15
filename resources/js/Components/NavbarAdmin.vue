<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <nav
        class="mt-4 mx-auto block w-full max-w-screen-xl rounded-xl border border-white/80 bg-white bg-opacity-80 py-2 px-4 text-white shadow-md backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4">
        <div>
            <div class="container mx-auto flex items-center justify-between text-gray-900">
                <Link :href="route('admin.index')"
                            class="middle none center rounded-lg py-3 px-6 font-sans text-2xs font-bold uppercase  transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-dark="true">
                            Dashboard
                        </Link>
                <ul class="hidden items-center gap-6 lg:flex">
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <Link :href="route('admin.showtask')"
                            class="middle none center rounded-lg py-3 px-6 font-sans text-xs font-bold uppercase  transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-dark="true">
                            Ver Tareas
                        </Link>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <Link
                            class="middle none center rounded-lg py-3 px-6 font-sans text-xs font-bold uppercase  transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-dark="true">
                            Estadisticas Tareas
                        </Link>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <Link
                            class="middle none center rounded-lg py-3 px-6 font-sans text-xs font-bold uppercase  transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-dark="true">
                            Ver Usuarios
                        </Link>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased ">
                        <Link
                            class="middle none center rounded-lg py-3 px-6 font-sans text-xs font-bold uppercase  transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                            data-ripple-dark="true">
                            Estadisticas Usuarios
                        </Link>
                    </li>
                </ul>
                <Link :href="route('admin.create')"
                    class="middle none center hidden rounded-lg bg-gradient-to-tr from-blue-600 to-pink-400 py-2 px-4 font-sans text-2xs font-bold uppercase text-white shadow-md shadow-black-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 active:opacity-[0.85] disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
                    type="button" data-ripple-light="true">
                    Crear Tarea
                </Link>
            </div>
        </div>
    </nav>
</template>




