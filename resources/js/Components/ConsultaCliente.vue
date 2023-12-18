<script setup>
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'


const popup = reactive({
  status:false,
  id:undefined
})

function togglePopup(id){
  popup.status = !popup.status
  popup.id = id

}

const props = defineProps(['props'])



function deleteCliente(){
  router.delete(`/cliente/${popup.id}`)
  togglePopup(undefined)
  
}



</script>


<template>
      
      <div class="subitles">
        <h3 class="txtc">Legendas</h3>
        <p class="subitles_item">
          <i class="bi bi-pencil-square" style="color:blue"></i> - Editar Informações do cliente
        </p>
        <p class="subitles_item">
          <i class="bi bi-car-front"></i> - Adicionar veículo ao cliente
        </p>
        <p class="subitles_item">
          <i class="bi bi-clock-history" style="color: green;"></i> - Agendar Revisão
        </p>
        <p class="subitles_item">
          <i class="bi bi-trash" style="color:red"></i> - Remover cadastro do cliente da base de dados
        </p>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Cod</th>
            <th scope="col">Nome Completo</th>
            <th scope="col">CPF</th>
            <th scope="col">Telefone</th>
            <th scope="col" class="ocultMobile">Email</th>
            <th scope="col" class="ocultMobile">Gênero</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="cliente in props.props">
            <th scope="row">{{ cliente.id }}</th>
            <td>{{ cliente.nome_completo }}</td>
            <td class="txtc">{{ cliente.cpf }}</td>
            <td class="txtc">{{ cliente.telefone }}</td>
            <td class="txtc ocultMobile">{{ cliente.email }}</td>
            <td class="txtc ocultMobile">{{ cliente.sexo }}</td>
            <td class="txtc flexCenterColumnRow g10">
                <Link :href="`/cliente/${cliente.id}`"> <i class="bi bi-pencil-square" style="color: blue;"></i> </Link>
                <Link :href="`/addVeiculo/${cliente.id}/${cliente.nome_completo}`" style="color: black;"><i class="bi bi-car-front cPointer"></i></Link>
                <Link :href="`/addAgendamento/${cliente.id}/${cliente.nome_completo}`" style="color: green"><i class="bi bi-clock-history"></i></Link>
                <i class="bi bi-trash cPointer" @click="togglePopup(`${cliente.id}`)" style="color:red"></i>
            </td>

          </tr>
        </tbody>
      </table>
      <div class="popup_alert flexCenterColumn" v-if="popup.status">
        <div class="msg_alert txtc flexCenterColumn">
          Atenção! Você está prestes a <span style="font-weight:700; display:contents">deletar</span> o cliente de id <span style="font-weight:700; display:contents">{{ popup.id }}</span> e todos os seus registros da base de dados. É isso mesmo que deseja fazer?

          <div class="flexCenterRow g10 " style="width:100%" >
            <button type="submit" class="submit_form_client inative" style="margin-left: 15px;" @click="togglePopup(`${undefined}`)">Não</button>
            <button type="submit" class="submit_form_client" style="margin-left: 15px;" @click="deleteCliente">Sim</button>
          </div>
        </div>
      </div>
      

</template>

<style>
.table{
    width: 90%;
    margin-bottom: 50px;
}
th{
padding: 8px;
background-color: var(--blue);
color: white;
}
td{
  padding-left: 5px;
}

tr{
    &:hover{
        background-color: var(--grayFree);
    }
}



</style>