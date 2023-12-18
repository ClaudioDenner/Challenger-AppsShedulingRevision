<script setup>
import Layout from '../Components/Layout.vue'
import { Head } from '@inertiajs/vue3'
import Dicas from '../Components/Dicas.vue'


defineProps({ title: Object, menu:String })
</script>

<template>
  <Layout>
    <Head title="Home" />
    
    <main class="content_container flexCenterColumn">

      <div>
        <img src="../Assets/ReviCarLogo.png">
      </div>
      <div class="txtc">
        Dicas de uso geral:
        <Dicas />
      </div>
      
    </main>
    
    
  </Layout>
</template>