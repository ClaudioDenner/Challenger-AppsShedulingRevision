<script setup>
import Layout from '../Components/Layout.vue'
import { Head } from '@inertiajs/vue3'
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({ cliente_id:Object, nome_completo:Object})



const form = reactive({
  cliente_id:props.cliente_id,
  modelo:'',
  ano:'',
  placa:'',
  
})

function submit() {
  router.post('/addVeiculo', form)
}


</script>

<template>
  <Layout>
    <Head title="Adicionar Veículo" />
    
    <main class="content_container flexCenterColumn">

      <h1 style="font-size: 0.8rem;" class="m10 txtc">Nome:</h1>
      <h1 style="font-size: 0.8rem;" class="m10 txtc">{{ nome_completo }}</h1>
      

      <form @submit.prevent="submit" class="form_client flexCenterColumn">
        <label for="cliente_id"  class="label_input_client">ID_cliente</label>
        <input id="cliente_id" :value="cliente_id" class="input_form_client" required disabled/>
        <label for="modelo" class="label_input_client" >Modelo do Veículo</label>
        <input id="modelo" v-model="form.modelo" class="input_form_client" required/>
        <label for="ano" class="label_input_client">Ano de Fabricação do Veículo</label>
        <input type="number" id="ano" v-model="form.ano" class="input_form_client" minlength="4" maxlength="4" required/>
        <label for="placa" class="label_input_client">Placa do veículo</label>
        <input id="placa" v-model="form.placa" class="input_form_client" required/>

        <button type="submit" class="submit_form_client">Salvar Veículo</button>
      </form>

        
    </main>
    
    
  </Layout>
</template>