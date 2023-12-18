<script setup>
import Layout from '../Components/Layout.vue'
import { Head } from '@inertiajs/vue3'
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps({ cliente_id:Object, nome_completo:Object, veiculos_cliente:Object})

console.log(props.veiculos_cliente)

const form = reactive({
  cliente_id:props.cliente_id,
  veiculo_id:'',
  data:'',
  descricao:'',
  valor:'',
  
})

function submit() {
  router.post('/addAgendamento', form)
}




</script>

<template>
  <Layout>
    <Head title="Adicionar Agendamento" />
    
    <main class="content_container flexCenterColumn">

      <h1 style="font-size: 0.8rem;" class="m10 txtc">Nome:</h1>
      <h1 style="font-size: 0.8rem;" class="m10 txtc">{{ nome_completo }}</h1>
      

      <form @submit.prevent="submit" class="form_client flexCenterColumn">
        <label for="cliente_id"  class="label_input_client">ID_cliente</label>
        <input id="cliente_id" :value="cliente_id" class="input_form_client" required disabled/>
        <div class="label_input_client">Selecione um veículo</div>
        <select id="veiculo" v-model="form.veiculo_id" class="input_form_client"   required>
          <template v-for="veiculo in veiculos_cliente">
            <option :value="veiculo.id">{{veiculo.modelo}} {{veiculo.ano}}</option>
          </template>
        </select>

        <label for="descricao" class="label_input_client" >Descrição da Revisão</label>
        <input id="descricao" v-model="form.descricao" class="input_form_client" required/>
        <label for="valor" class="label_input_client">Custo da Revisão</label>
        <input type="number" step="0.01" min="0.01" id="valor" v-model="form.valor" class="input_form_client"  required/>
        <label for="data" class="label_input_client">Placa do veículo</label>
        <input id="data" type="datetime-local" v-model="form.data" class="input_form_client" required/>
        
        <button type="submit" class="submit_form_client">Salvar Veículo</button>
      </form>

        
    </main>
    
    
  </Layout>
</template>