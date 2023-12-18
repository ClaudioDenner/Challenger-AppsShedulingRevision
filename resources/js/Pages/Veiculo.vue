<script setup>
import Layout from '../Components/Layout.vue'
import FormCliente from '../Components/FormCliente.vue'
import ConsultaVeiculo from '../Components/ConsultaVeiculo.vue'
import { Head } from '@inertiajs/vue3'
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({ veiculos: Object})




</script>

<template>
  <Layout>
    <Head title="LISTA DE VEÍCULOS" />
    
    <main class="content_container flexCenterColumn">



      <div class="exception txtc m10">{{exception}}</div>

      
        <ConsultaVeiculo :props="veiculos" />
      


      





        
    </main>
    
    
  </Layout>
</template>