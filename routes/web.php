<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\RevisaoAgendamentoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('app');
});
*/


//ROTAS CLIENTE

Route::get('/', function () {return Inertia::render('Home');})->name('Home');

Route::get('/cliente/{id}',[ClienteController::class,'getOne']);

Route::get('/clientes',[ClienteController::class,'index'])->name('Clientes');

Route::post('/addCliente',[ClienteController::class,'save']);

Route::put('/cliente/{id}',[ClienteController::class,'changeOne']);

Route::delete('/cliente/{id}', [ClienteController::class,'deleteOne']);


//ROTAS VEICULO

Route::get('/addVeiculo/{id}/{nome_completo}', [VeiculoController::class,'form']);

Route::get('/veiculos', [VeiculoController::class,'index']);

Route::get('/veiculo/{id}', [VeiculoController::class,'getOne']);

Route::post('/addVeiculo', [VeiculoController::class,'add']);

Route::put('/veiculo/{id}', [VeiculoController::class,'changeOne']);

Route::delete('/veiculo/{id}', [VeiculoController::class,'deleteOne']);

//ROTAS AGENDAMENTOS

Route::get('/addAgendamento/{id}/{nome_completo}', [RevisaoAgendamentoController::class,'form']);

Route::get('/agendamentos', [RevisaoAgendamentoController::class,'index']);

Route::get('/agendamento/{id}', [RevisaoAgendamentoController::class,'getOne']);

Route::post('/addAgendamento', [RevisaoAgendamentoController::class,'add']);

Route::put('/agendamento/{id}', [RevisaoAgendamentoController::class,'changeOne']);

Route::delete('/agendamento/{id}', [RevisaoAgendamentoController::class,'deleteOne']);
