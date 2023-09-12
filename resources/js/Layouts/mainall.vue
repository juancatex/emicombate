<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue'; 
</script>

<template>
         
     <ApplicationLogo class="w-full" /> 
       
    <div class="mainn min-h-full flex flex-col sm:justify-center items-center pt-0" style="padding: 0% 20%;">
       

            <div   class="w-full overflow-hidden sm:rounded-lg " style="background-color: #808080e6;padding: 3% 3%;">
            <slot />
        </div>
    </div>
</template>
