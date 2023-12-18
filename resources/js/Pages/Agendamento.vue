<script setup>
import Layout from '../Components/Layout.vue'
import ConsultaAgendamento from '../Components/ConsultaAgendamento.vue'
import { Head } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

defineProps({ agendamentos: Object})




</script>

<template>
  <Layout>
    <Head title="LISTA DE AGENDAMENTOS" />
    
    <main class="content_container flexCenterColumn">



      <div class="exception txtc m10"></div>

      
        <ConsultaAgendamento :props="agendamentos" />
      


      





        
    </main>
    
    
  </Layout>
</template>