<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'; 
</script>

<template>
         
     <ApplicationLogo class="w-full" /> 
       
    <div class=" mainn min-h-full flex flex-col sm:justify-center items-center pt-0 ">
       

            <div   class="w-full sm:max-w-md mt-6 px-6 py-4 shadow-md overflow-hidden sm:rounded-lg" style="background-color: #808080e6;" >
            <slot />
        </div>
    </div>
</template>
