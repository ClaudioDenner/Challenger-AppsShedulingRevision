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



function deleteVeiculo(){
  router.delete(`/veiculo/${popup.id}`)
  togglePopup(undefined)
  
}



</script>


<template>
      
      <div class="subitles">
        <h3 class="txtc">Legendas</h3>
        <p class="subitles_item">
          <i class="bi bi-pencil-square" style="color:blue"></i> - Editar Informações do veiculo
        </p>
        <p class="subitles_item">
          <i class="bi bi-trash" style="color:red"></i> - Remover cadastro do veiculo da base de dados
        </p>
      </div>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Cod</th>
            <th scope="col">Cod_proprietário</th>
            <th scope="col">Modelo</th>
            <th scope="col">Ano</th>
            <th scope="col" class="ocultMobile">Placa</th>
            <th scope="col">Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="veiculo in props.props">
            <th scope="row">{{ veiculo.id }}</th>
            <td class="txtc">{{ veiculo.cliente_id }}</td>
            <td class="txtc">{{ veiculo.modelo }}</td>
            <td class="txtc">{{ veiculo.ano }}</td>
            <td class="txtc ocultMobile">{{ veiculo.placa }}</td>
            <td class="txtc flexCenterColumnRow g10">
                <Link :href="`/veiculo/${veiculo.id}`"> <i class="bi bi-pencil-square" style="color: blue;"></i> </Link>
                <i class="bi bi-trash cPointer" @click="togglePopup(`${veiculo.id}`)" style="color:red"></i>
            </td>

          </tr>
        </tbody>
      </table>
      <div class="popup_alert flexCenterColumn" v-if="popup.status">
        <div class="msg_alert txtc flexCenterColumn">
          Atenção! Você está prestes a <span style="font-weight:700; display:contents">deletar</span> o veículo de id <span style="font-weight:700; display:contents">{{ popup.id }}</span> e todos os seus registros da base de dados. É isso mesmo que deseja fazer?

          <div class="flexCenterRow g10 " style="width:100%" >
            <button type="submit" class="submit_form_client inative" style="margin-left: 15px;" @click="togglePopup(`${undefined}`)">Não</button>
            <button type="submit" class="submit_form_client" style="margin-left: 15px;" @click="deleteVeiculo">Sim</button>
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