<script setup> 
import { Head,Link,useForm ,router} from '@inertiajs/vue3';  
import mainall from '@/Layouts/mainall.vue'; 
import TextInput from '@/Components/TextInput.vue';
import Pagination from '@/Components/Paginations.vue'; 
import {ref,watch} from 'vue'; 
import { debounce } from 'lodash';
const searchField=ref('');
const props = defineProps({
    combates: {
        type: Object,
    },
    soldadosin: {
        type: Object,
    }
}); 
const form = useForm({ 
    idsol: '',
    municiongas: '',
    municionsob: '',
    vida: '',
    tiempo: ''     
});
watch(searchField, debounce(() => { 
router.get('combate', {search: searchField.value}, {preserveState: true, preserveScroll: true, only: ['combates','soldadosin']})
}, 300));
const guardarDatos=()=>{ 
    form.post(route('Guardarcombate'),{onSuccess:()=>{ok('Creado correctamente')}  }); 
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
const reporteasignacionid=(id)=>{
    _pl.startReport();
    var url= '/reportercombate?id=' +id;
    axios.get(url).then(function (response) { 
                             _pl.ViserReporte(`data:application/pdf;base64,${response.data}`,'Regporte de Asignaciones'); 
    })
    .catch(function (error) {
        console.log(error);
    });
     
};
</script>

<template>
    
    <mainall>
        <Head title="Combate" />
       
        <div class="  content-center  rounded-lg">
            <div class="row">
                <div class="col-md-12 p-4"> 
                                            <div class="form-floating mt-3"> 
                                                    <TextInput class="form-control" id="search" ref="nameinput" v-model="searchField" type="text" >
                                                    </TextInput> 
                                                <label for="serie">Buscar por nombre del soldado</label> 
                                            </div> 
                        </div>
            </div>
            <div class="col-span-2 flex flex-col sm:justify-center items-center"> 
                
                <div class="w-full flex flex-col sm:justify-center items-center" style="padding: 0% 0%;"> 
                   
                    <table class="table">
                        <thead>
                        <tr style="  background: linear-gradient(to right, rgb(1, 120, 188) 0%, rgb(0, 189, 218) 100%) !important;color: white;">
                          <th class="align-middle" style="text-align: center;">#</th>
                          <th class="align-middle" style="text-align: center;width: 65px;">Foto</th> 
                          <th class="align-middle" style="text-align: left;">Nombre</th> 
                          <th class="align-middle" style="text-align: center;">No. de entrenamiento</th>
                          <th class="align-middle" style="text-align: center;">Munición gastada</th> 
                          <th class="align-middle" style="text-align: center;">Munición sobrante</th> 
                          <th class="align-middle" style="text-align: center;">Porcentaje de vida</th> 
                          <th class="align-middle" style="text-align: center;">Tiempo de entrenamiento (horas)</th> 
                          <th class="align-middle" style="text-align: center;">Acciones</th> 
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(sold, index) in combates.data" :key="sold.idco">
                            <td class="align-middle" style="text-align: center;">{{ index+1 }}</td>
                            <td class="align-middle" style="text-align: center;"><img :src="sold.foto" class="rounded-circle" alt="activo" ></td> 
                            <td class="align-middle" style="text-align: left;">{{ sold.nomcompleto }}</td>  
                            <td class="align-middle" style="text-align: center;">{{ sold.no }}</td>  
                            <td class="align-middle" style="text-align: center;">{{ sold.municiongas }}</td>  
                            <td class="align-middle" style="text-align: center;">{{ sold.municionsob }}</td>  
                            <td class="align-middle" style="text-align: center;">{{ sold.vida }} %</td>  
                            <td class="align-middle" style="text-align: center;">{{ sold.tiempo }} Hrs.</td>  
                            <td class="align-middle" style="text-align: center;">
                                 <button   class="btn btn-outline-info  "
                                    @click="reporteasignacionid(sold.idco)" >
                                        <i class="ti-file"></i>
                                    </button> 
                                </td>  
                             
                        </tr>
                      </tbody>
                    </table>
                    <pagination v-if="combates.links.length>3" class="mt-6" :links="combates.links" />
                </div>
              <div class="clearfix">
                <button @click="openModal" class="pull-left mt-6  text-sm bg-green-500   hover:bg-green-400 text-white font-bold py-1 px-4 border-b-2 border-green-600 hover:border-green-500 
                    rounded  inline-flex items-center"> 
                        <span>Nuevo registro</span>
                </button>
               
                <Link :href="route('inicio')" method="get" as="button" type="button" class="pull-left mt-1 ml-2  text-sm bg-red-500   hover:bg-red-400 text-white font-bold py-1 px-8 border-b-2 border-red-600 hover:border-red-500 
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
            
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content"> 
                    <div class="
                              modal-header modal-colored-header
                              bg-info
                              text-white
                            ">
                        <h4 class="modal-title" id="warning-header-modalLabel">
                            Registro del combatiente
                        </h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card">
                            <div class="card-body"> 
                                <form>
                                    <div class="row"> 
                                            
                                        <div class="col-md-12">
                                            <div class=" mb-3'"> 
                                                <label for="soldadoss">Seleccionar soldado</label> 
                                                    <select class="form-select form-select-lg mb-3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                                        v-model="form.idsol" 
                                                        ref="input" >   
                                                        <option v-for="opt in soldadosin" :key="opt.idsol" :value="opt.idsol" >
                                                            {{ opt.nomcompleto }}
                                                        </option>
                                                    </select>
                                            </div>
                                        </div>
                                     
                                        <div class="col-md-6">
                                            <div :class="form.errors.municiongas?'form-floating mb-3 has-danger':'form-floating mb-3'"> 
                                                    <TextInput class="form-control" id="ap" ref="nameinput" v-model="form.municiongas" type="number"  >
                                                    </TextInput> 
                                                <label for="ap">Munición gastada</label>
                                                <small v-show="form.errors.municiongas" class="form-control-feedback">
                                                    {{form.errors.municiongas}}
                                                    </small> 
                                            </div>
                                        </div>


                                         <div class="col-md-6">
                                                <div :class="form.errors.municionsob?'form-floating mb-3 has-danger':'form-floating mb-3'">
                                                    <TextInput class="form-control" id="am" ref="nameinput" v-model="form.municionsob" type="number">
                                                    </TextInput>
                                                    <label for="am">Munición sobrante</label>
                                                    <small v-show="form.errors.municionsob" class="form-control-feedback">
                                                        {{form.errors.municionsob}}
                                                    </small>
                                                </div>
                                         </div>
                                      
                                         <div class="col-md-6">
                                                <div :class="form.errors.vida?'form-floating mb-3 has-danger':'form-floating mb-3'">
                                                    <TextInput class="form-control" id="vida" ref="nameinput" v-model="form.vida" type="number">
                                                    </TextInput>
                                                    <label for="vida">Porcentaje de vida</label>
                                                    <small v-show="form.errors.vida" class="form-control-feedback">
                                                        {{form.errors.vida}}
                                                    </small>
                                                </div>
                                         </div>

                                         <div class="col-md-6">
                                                <div :class="form.errors.tiempo?'form-floating mb-3 has-danger':'form-floating mb-3'">
                                                    <TextInput class="form-control" id="tiempo" ref="nameinput" v-model="form.tiempo" type="number">
                                                    </TextInput>
                                                    <label for="tiempo">Tiempo de entrenamiento</label>
                                                    <small v-show="form.errors.tiempo" class="form-control-feedback">
                                                        {{form.errors.tiempo}}
                                                    </small>
                                                </div>
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
                                btn btn-info 
                                font-weight-medium
                              " @click="guardarDatos">
                            Guardar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </mainall>
     
       
    
</template>
