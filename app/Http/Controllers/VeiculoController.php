<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Veiculo;


class VeiculoController extends Controller
{
    
    //

    public function index()
    {
        $veiculo = new Veiculo();
        return Inertia::render('Veiculo', [
          'veiculos' => $veiculo->orderBy('id','desc')->get()
        ]);
    }

    public function form(Request $request, $id, $nome_completo){

        return Inertia::render('AddVeiculo',[
            'cliente_id'=>$id,
            'nome_completo'=>$nome_completo
        ]);
      }

    public function add(Request $request){
        {

            $veiculo = new Veiculo();
            $veiculo->cliente_id  = $request->input('cliente_id');
            $veiculo->modelo  = $request->input('modelo');
            $veiculo->ano  = $request->input('ano');
            $veiculo->placa  = $request->input('placa');
      
            try{
              $this->exception = '----';
              $veiculo->save();
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
