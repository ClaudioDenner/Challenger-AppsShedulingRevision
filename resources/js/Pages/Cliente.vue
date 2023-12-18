<script setup>
import Layout from '../Components/Layout.vue'
import FormCliente from '../Components/FormCliente.vue'
import ConsultaCliente from '../Components/ConsultaCliente.vue'
import { Head } from '@inertiajs/vue3'

import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({ clientes: Object , exception: String})


function submit() {
  router.post('/addCliente', form)
}

const  tabNavigation = reactive({
  cadastro:false,
  consulta:true
})

function consultaActive(){
  tabNavigation.consulta = true
  tabNavigation.cadastro = false

}
function cadastroActive(){
  tabNavigation.cadastro = true
  tabNavigation.consulta = false

}



</script>

<template>
  <Layout>
    <Head title="CADASTROS" />
    
    <main class="content_container flexCenterColumn">

      <div class="flexCenterColumnRow m10 g10">
        <button  :class="{ 'submit_form_client': tabNavigation.consulta==true, 'submit_form_client inative':tabNavigation.consulta==false }" v-on:click="consultaActive" >Consultar</button>
        <button  :class="{ 'submit_form_client': tabNavigation.cadastro==true, 'submit_form_client inative':tabNavigation.cadastro==false }" v-on:click="cadastroActive" >Cadastrar Novo Cliente</button>
      </div>

      <div class="exception txtc m10">{{exception}}</div>

      <template v-if="tabNavigation.cadastro">
        <FormCliente />
      </template>
      <template v-if="tabNavigation.consulta">
        <ConsultaCliente :props="clientes" />
      </template>


      





        
    </main>
    
    
  </Layout>
</template>