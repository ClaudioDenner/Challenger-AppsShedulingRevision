<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Cliente;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Redirect;


class ClienteController extends Controller
{
    public $exception = '';

    public function index()
    {
        $cliente = new Cliente();
        return Inertia::render('Cliente', [
          'clientes' => $cliente->orderBy('id','desc')->get(),
          'exception'=> $this->exception
        ]);
    }

    public function save(Request $request)
    {

      $cliente = new Cliente();
      $cliente->nome_completo  = $request->input('nome_completo');
      $cliente->cpf  = $request->input('cpf');
      $cliente->telefone  = $request->input('telefone');
      $cliente->email  = $request->input('email');
      $cliente->sexo  = $request->input('sexo');

      try{
        $this->exception = '----';
        $cliente->save();
        return Inertia::reload();
      } 
      catch(\Exception $e){
        
        $this->exception = '===';
        return Inertia::render('Home');
        
        
      }
      
    }


    public function getOne(){
      $id = request()->route('id');
      $cliente = new Cliente();
      return Inertia::render('Edit', [
        'clientes' => $cliente->find($id),
        'exception'=> $this->exception
      ]);
    }


    public function changeOne(Request $request, $id){
      
      
      $cliente = new Cliente();
      $cliente->where('id', $id)->update([
        'nome_completo' => $request->input('nome_completo'),
        'cpf' => $request->input('cpf'),
        'telefone' => $request->input('telefone'),
        'email' => $request->input('email'),
        'sexo' => $request->input('sexo')

    ]);

    return Inertia::render('Home');

    }

    public function deleteOne(Request $request, $id){
      $cliente = new Cliente();
      $registro = $cliente->find($id);
      $registro->delete();
    
      return Inertia::render('Home');


    }

}
