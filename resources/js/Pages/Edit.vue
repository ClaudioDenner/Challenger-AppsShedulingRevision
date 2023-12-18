<script setup>
import Layout from '../Components/Layout.vue'
import FormCliente from '../Components/FormEditClient.vue'

import { Head } from '@inertiajs/vue3'

import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

defineProps({ clientes: Object , exception: String})



</script>

<template>
  <Layout>
    <Head title="Clientes" />
    
    <main class="content_container flexCenterColumn">


      <div class="exception txtc m10">{{exception}}</div>

      
        <FormCliente  :props="clientes" />
      
        
    </main>
    
    
  </Layout>
</template>