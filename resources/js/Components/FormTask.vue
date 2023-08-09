<script setup>
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

const form = reactive({
    title: "",
    short_description: "",
    content: "",
    user_id: "",
    expiration: "",
    created_by: 1
})

function submit() {
    router.post('/admin', form)
}

</script>

<template>
<form @submit.prevent="submit" class="mx-8 mt-8 mb-8">
    <p v-if="succes"> {{ succes }}</p>
    <input type="hidden" name="created_by" id="created_by" v-model="form.created_by" >
    <h2 class="font-semibold text-2xl text-gray-800 leading-tight mx-4 mt-8 mb-8">Crear Tarea</h2>
    <div class="relative z-0 w-full mb-6 group">
      <input type="text" name="title" id="title" v-model="form.title" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <div></div>

      <label for="floating_title" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Titulo</label>
  </div>
  <div class="relative z-0 w-full mb-6 group">
      <input type="text" name="short_description" id="short_description" v-model="form.short_description" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      <div></div>
      <label for="short_description" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripcion corta</label>
  </div>
  <div class="relative z-0 w-full mb-6 group">
      <textarea name="content" id="content" v-model="form.content" class="block py-6.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white    dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer h-24" rows="5" cols="33" />
      <div></div>
      <label for="content" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contenido</label>
  </div>
  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-6 group">
        <input type="number" name="user_id" id="user_id" v-model="form.user_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <div></div>
        <label for="user_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Usuario</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="date" name="expiration" id="expiration" v-model="form.expiration" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <div></div>
        <label for="expiration" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expiracion</label>
    </div>
  </div>
    <input type="hidden" name="created_by" id="created_by" v-model="created_by">
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear</button>
</form>

</template>

<style>

</style>
