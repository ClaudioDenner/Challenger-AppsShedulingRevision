<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const props = defineProps(['props'])

console.log(props.props)

const form = reactive({
  cliente_id:props.props.cliente_id,
  modelo:props.props.modelo,
  ano:props.props.ano,
  placa:props.props.placa,
  
})



function submit() {
 router.put(`/veiculo/${props.props.id}`, form)

}

</script>


<template>
  <form @submit.prevent="submit" class="form_client flexCenterColumn">
    <label for="cliente_id"  class="label_input_client">ID_cliente</label>
    <input id="cliente_id" :value="form.cliente_id" class="input_form_client" required disabled/>
    <label for="modelo" class="label_input_client" >Modelo</label>
    <input id="modelo" v-model="form.modelo" class="input_form_client" required/>
    <label for="ano" class="label_input_client">Ano</label>
    <input type="number" id="ano" v-model="form.ano" class="input_form_client" minlength="4" maxlength="4" required/>
    <label for="placa" class="label_input_client">Placa</label>
    <input id="placa" v-model="form.placa" class="input_form_client" required/>

    <button type="submit" class="submit_form_client">Salvar Alterações</button>
  </form>
</template>