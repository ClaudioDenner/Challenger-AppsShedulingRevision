<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RevisaoAgendamento;
use App\Models\Veiculo;
use Inertia\Inertia;



class RevisaoAgendamentoController extends Controller
{
    
    //

    public function index()
    {
        $revisaoAgendamento = new RevisaoAgendamento();
        return Inertia::render('Agendamento', [
          'agendamentos' => $revisaoAgendamento->orderBy('id','desc')->get()
        ]);
    }

    public function form(Request $request, $id, $nome_completo){
        $veiculo = new Veiculo();
        $veiculos_cliente = $veiculo->where('cliente_id',$id)->get();
        return Inertia::render('AddAgendamento',[
            'cliente_id'=>$id,
            'nome_completo'=>$nome_completo,
            'veiculos_cliente'=>$veiculos_cliente
        ]);
      }

    public function add(Request $request){
        {

            $agendamento = new RevisaoAgendamento();
            $agendamento->cliente_id = $request->input('cliente_id');
            $agendamento->veiculo_id = $request->input('veiculo_id');
            $agendamento->descricao  = $request->input('descricao');
            $agendamento->data_agendamento = $request->input('data');
            $agendamento->valor = $request->input('valor');
      
            try{
              $this->exception = '----';
              $agendamento->save();
              return Inertia::render('Home');
            } 
            catch(Exception $e){
              
              return Inertia::render('Home');
              
              
            }
      }

    }

    public function deleteOne(Request $request, $id){
      $cliente = new Veiculo();
      $registro = $cliente->find($id);
      $registro->delete();
    
      return Inertia::render('Home');

    }

    public function changeOne(Request $request, $id){
      
      
      $veiculo = new Veiculo();
      $veiculo->where('id', $id)->update([
        'modelo' => $request->input('modelo'),
        'ano' => $request->input('ano'),
        'placa' => $request->input('placa'),
    ]);

    return Inertia::render('Home');

    }

    public function getOne(){
      $id = request()->route('id');
      $veiculo = new Veiculo();
      return Inertia::render('EditVeiculo', [
        'veiculo' => $veiculo->find($id),
      ]);
    }

}
