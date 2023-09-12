<script setup> 
import { Head,Link } from '@inertiajs/vue3'; 
import mainall from '@/Layouts/mainall.vue'; 
const props = defineProps({
    rol: {
        type: Number,
    } 
});
</script>

<template>
    
    <mainall>
        <Head title="Dashboard" />
       
        <div class="grid grid-cols-3 gap-4 content-center  rounded-lg">
            <div class="flex flex-col justify-center items-center">
                <div> <img src="/images/sol.png" alt=""  ></div>
            </div>
            <div class="col-span-2 flex flex-col sm:justify-center items-center"> 
                <div class="pt-6 text-white text-4xl text-center font-bold">Entrenamiento de Combate </div> 
                <div class="pt-2 pb-6 text-white text-4xl text-center">C.Q.B.</div> 
                <div class="w-full flex flex-col sm:justify-center items-center" style="padding: 0% 20%;"> 
                    <button
                        class="mt-3 block w-full bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-2 border-blue-600 hover:border-blue-500 rounded transition duration-150 ease-in-out">
                        Nuevo registro 
                    </button>
                    <button v-if="rol==1"
                        class="mt-3 block w-full bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-2 border-blue-600 hover:border-blue-500 rounded transition duration-150 ease-in-out">
                        Registro del combatiente 
                    </button>
                    <button
                        class="mt-3 block w-full bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-2 border-blue-600 hover:border-blue-500 rounded transition duration-150 ease-in-out">
                        Busqueda historica
                    </button>
                    <button
                        class="mt-3 block w-full bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-2 border-blue-600 hover:border-blue-500 rounded transition duration-150 ease-in-out">
                        Manual de Entrenamiento
                    </button>
                    <Link :href="route('logout')" method="post" as="button" type="button" class="mt-6   bg-red-500   hover:bg-red-400 text-white font-bold py-2 px-4 border-b-2 border-red-600 hover:border-red-500 
                    rounded  inline-flex items-center">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1" id="Capa_1"
                            width="800px" height="800px" viewBox="0 0 45.58 45.58" xml:space="preserve">
                            <g>
                                <path
                                    d="M45.506,33.532c-1.741-7.42-7.161-17.758-23.554-19.942V7.047c0-1.364-0.826-2.593-2.087-3.113   c-1.261-0.521-2.712-0.229-3.675,0.737L1.305,19.63c-1.739,1.748-1.74,4.572-0.001,6.32L16.19,40.909   c0.961,0.966,2.415,1.258,3.676,0.737c1.261-0.521,2.087-1.75,2.087-3.113v-6.331c5.593,0.007,13.656,0.743,19.392,4.313   c0.953,0.594,2.168,0.555,3.08-0.101C45.335,35.762,45.763,34.624,45.506,33.532z" />
                            </g>
                        </svg>
                        <span>Logout</span>
                    </Link>
                </div>
            </div>
        </div>
        
    </mainall>
     
       
    
</template>
