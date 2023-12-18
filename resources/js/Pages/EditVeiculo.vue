<script setup>
import Layout from '../Components/Layout.vue'
import FormEditVeiculo from '../Components/FormEditVeiculo.vue'

import { Head } from '@inertiajs/vue3'

import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({ veiculo: Object})



</script>

<template>
  <Layout>
    <Head title="Editar Veículo" />
    
    <main class="content_container flexCenterColumn">


      <div class="exception txtc m10"></div>

      
        <FormEditVeiculo  :props="veiculo" />
      
        
    </main>
    
    
  </Layout>
</template>