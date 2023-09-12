<script setup> 
import { Head,Link,useForm } from '@inertiajs/vue3';  
import mainall from '@/Layouts/mainall.vue'; 
import TextInput from '@/Components/TextInput.vue';
import Pagination from '@/Components/Paginations.vue';
import Cropp from '@/Components/CropperImage.vue'; 
const props = defineProps({
    soldados: {
        type: Object,
    }
});
const form = useForm({ 
    nomcompleto: '',
    nom: '',
    ap: '',
    am: '',
    foto: '',       
});
const guardarDatos=()=>{
    form.nomcompleto=form.nom+" "+form.ap+" "+form.am;
    form.post(route('GuardarSoldado'),{onSuccess:()=>{ok('Creado correctamente')}  }); 
};
const ok =(msj)=>{ 
    closeModal();
    Swal.fire({title:msj,icon:'success'});
};
const closeModal=()=>{ 
    form.reset(); 
    $('#staticBackdrop').modal('hide');  
};
const openModal=()=>{ 
    form.clearErrors();
    form.reset();
    $('#staticBackdrop').modal('show'); 
};
</script>

<template>
    
    <mainall>
        <Head title="Soldados" />
       
        <div class="grid grid-cols-3 gap-4 content-center  rounded-lg">
            
            <div class="col-span-2 flex flex-col sm:justify-center items-center"> 
                
                <div class="w-full flex flex-col sm:justify-center items-center" style="padding: 0% 0%;"> 
                   
                    <table class="table">
                        <thead>
                        <tr style="  background: linear-gradient(to right, rgb(1, 120, 188) 0%, rgb(0, 189, 218) 100%) !important;color: white;">
                          <th class="align-middle" style="text-align: center;width: 25px;">No.</th>
                          <th class="align-middle" style="text-align: center;width: 65px;">Foto</th> 
                          <th class="align-middle" style="text-align: center;">Nombre</th> 
                         
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(sold, index) in soldados.data" :key="sold.idsol">
                            <td class="align-middle" style="text-align: center;">{{ index+1 }}</td>
                            <td class="align-middle" style="text-align: center;"><img :src="sold.foto" class="rounded-circle" alt="activo" ></td> 
                            <td class="align-middle" style="text-align: center;">{{ sold.nom }} {{ sold.ap }} {{ sold.am }}</td>     
                        </tr>
                      </tbody>
                    </table>
                    <pagination v-if="soldados.links.length>3" class="mt-6" :links="soldados.links" />
                </div>
             
            </div>
            <div class="flex flex-col justify-center items-center">
                <div> <img src="/images/sol.png" alt=""  ></div>
                <button @click="openModal" class="mt-6  text-sm bg-green-500   hover:bg-green-400 text-white font-bold py-1 px-4 border-b-2 border-green-600 hover:border-green-500 
                    rounded  inline-flex items-center"> 
                        <span>Nuevo registro</span>
                </button>
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content"> 
                    <div class="
                              modal-header modal-colored-header
                              bg-warning
                              text-white
                            ">
                        <h4 class="modal-title" id="warning-header-modalLabel">
                            {{titulo}}
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body"> 
                                <form>
                                    <div class="row"> 
                                          
                                        <div class="col-md-9 row" >
                                         
                                        <div class="col-md-12">
                                            <div :class="form.errors.nom?'form-floating mb-3 has-danger':'form-floating mb-3'"> 
                                                    <TextInput class="form-control" id="nom" ref="nameinput" v-model="form.nom" type="text" >
                                                    </TextInput> 
                                                <label for="nom">Nombre</label>
                                                    <small v-show="form.errors.nom" class="form-control-feedback">
                                                    {{form.errors.nom}}
                                                    </small> 
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-12">
                                            <div :class="form.errors.ap?'form-floating mb-3 has-danger':'form-floating mb-3'"> 
                                                    <TextInput class="form-control" id="ap" ref="nameinput" v-model="form.ap" type="text"  >
                                                    </TextInput> 
                                                <label for="ap">Apellido Paterno</label>
                                                <small v-show="form.errors.ap" class="form-control-feedback">
                                                    {{form.errors.ap}}
                                                    </small> 
                                            </div>
                                        </div>


                                            <div class="col-md-12">
                                                <div :class="form.errors.am?'form-floating mb-3 has-danger':'form-floating mb-3'">
                                                    <TextInput class="form-control" id="am" ref="nameinput" v-model="form.am" type="text">
                                                    </TextInput>
                                                    <label for="am">Apellido Materno</label>
                                                    <small v-show="form.errors.am" class="form-control-feedback">
                                                        {{form.errors.am}}
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 row">
                                            <table
                                                :class="form.errors.foto?'form-floating dropzone mb-3 has-danger':'form-floating dropzone mb-3'">
                                                <tbody>
                                                    
                                                    <tr>
                                                        <td class="align-middle" style="text-align: center;">
                                                            <img v-if="form.foto" style="width: 100%;margin: 0 auto;margin-bottom: 8px;    border: 1px solid gray; border-radius: 3%;" :src="form.foto" alt="">
                                                           <Cropp v-model="form.foto"/>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr style="max-height: 20px;text-align: center;">
                                                        <td class="align-bottom"> 
                                                            <small v-show="form.errors.foto"
                                                                class="form-control-feedback">
                                                                {{form.errors.foto}}
                                                            </small>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="
                                btn btn-light-warning
                                text-warning
                                font-weight-medium
                              " @click="guardarDatos">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
                <Link :href="route('inicio')" method="get" as="button" type="button" class="mt-1  text-sm bg-red-500   hover:bg-red-400 text-white font-bold py-1 px-8 border-b-2 border-red-600 hover:border-red-500 
                    rounded  inline-flex items-center">
                        <svg class="fill-current w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000" version="1.1" id="Capa_1"
                            width="800px" height="800px" viewBox="0 0 45.58 45.58" xml:space="preserve">
                            <g>
                                <path
                                    d="M45.506,33.532c-1.741-7.42-7.161-17.758-23.554-19.942V7.047c0-1.364-0.826-2.593-2.087-3.113   c-1.261-0.521-2.712-0.229-3.675,0.737L1.305,19.63c-1.739,1.748-1.74,4.572-0.001,6.32L16.19,40.909   c0.961,0.966,2.415,1.258,3.676,0.737c1.261-0.521,2.087-1.75,2.087-3.113v-6.331c5.593,0.007,13.656,0.743,19.392,4.313   c0.953,0.594,2.168,0.555,3.08-0.101C45.335,35.762,45.763,34.624,45.506,33.532z" />
                            </g>
                        </svg>
                        <span>Volver</span>
                    </Link> 
            </div>
        </div>
      
    </mainall>
     
       
    
</template>
