<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
  nome_completo: null,
  cpf: null,
  telefone: null,
  email: null,
  sexo: null,
  
})

function submit() {
  router.post('/addCliente', form)
}

</script>


<template>
    <form @submit.prevent="submit" class="form_client flexCenterColumn">
        <label for="nome_completo" class="label_input_client">Nome Completo:</label>
        <input id="nome_completo" v-model="form.nome_completo" class="input_form_client" placeholder="Ex: Paulo Roberto Nascimento" required/>
        <label for="cpf" class="label_input_client">CPF:</label>
        <input id="cpf" v-model="form.cpf" type="text" class="input_form_client" pattern="\d{3}\.?\d{3}\.?\d{3}-?\d{2}" placeholder="Digite um CPF no formato: xxx.xxx.xxx-xx" required/>
        <label for="telefone" class="label_input_client">Telefone:</label>
        <input id="telefone" type="tel" v-model="form.telefone" class="input_form_client" placeholder="(xx)xxxxx-xxxx" required/>
        <label for="email" class="label_input_client">Email:</label>
        <input id="email" v-model="form.email" class="input_form_client" placeholder="Ex: pedro@gmail.com" />
        <label for="sexo" class="label_input_client">Gênero:</label>

        <select id="sexo" v-model="form.sexo" class="input_form_client"   required>
            <option disabled value="">Por favor selecione um valor</option>
            <option>Masculino</option>
            <option>Feminino</option>
        </select>

        
        
        <button type="submit" class="submit_form_client">Cadastrar</button>
      </form>
</template>