<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\BarbeiroController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CadastrarController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\CortesController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\GerenteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\SobreController;
use App\Models\Agendamento;
use App\Models\Cadastrar;
use Faker\Guesser\Name;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sobre', [SobreController::class, 'index'])->name('sobre');


//CORTES
Route::get('/cortes', [CortesController::class, 'index'])->name('cortes');
Route::get('/servicos/barba', [CortesController::class, 'barba'])->name('barba');
Route::get('/servicos/coloracao', [CortesController::class, 'coloracao'])->name('coloracao');
Route::get('/servicos/cuidados', [CortesController::class, 'cuidados'])->name('cuidados');
Route::get('/servicos/tratamento', [CortesController::class, 'tratamento'])->name('tratamento');


// CONTATO
Route::get('/contato', [ContatoController::class, 'index'])->name('contato');
// Route::get('/contato/enviar', [ContatoController::class, 'salvarNoBanco'])->name('contato.enviar');
// Route::get('/contato/enviarnew', [ContatoController::class, 'salvarEmail'])->name('contato.enviarnew');

// LOGIN
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'autenticar'])->name('login');

Route::get('/cadastrar', [CadastrarController::class, 'index'])->name('cadastrar');
Route::post('/cadastrar', [CadastrarController::class, 'cadastrar'])->name('cadastrar');


// AUTENTICAÇÃO DE GERENTE
Route::middleware(['autenticacao:gerente'])->group(function() {
    Route::get('/dashboard/gerente', [GerenteController::class, 'index'])->name('gerente');
    Route::get('/dashboard/gerente/funcionarios', [GerenteController::class, 'listFuncionarios'])->name('list.func');
    Route::get('/dashboard/gerente/funcionarios/adicionar', [GerenteController::class, 'adicionarFunc'])->name('adicionar.func');
    Route::get('/dashboard/gerente/adicionar-servico', [GerenteController::class, 'adicionarServico'])->name('adicionar.servico');
    Route::get('/dashboard/gerente/vendas', [GerenteController::class, 'vendas'])->name('gerente.vendas');
    Route::get('/dashboard/gerente/perfil', [GerenteController::class, 'perfil'])->name('gerente.perfil');
    Route::get('/dashboard/gerente/agendamento', [GerenteController::class, 'listAgendamentos'])->name('gerente.agendamento');
    Route::get('/dashboard/gerente/clientes', [GerenteController::class, 'cliente'])->name('gerente.clientes');
    Route::get('/dashboard/gerente/{id}/edit', [GerenteController::class, 'perfilEdit'])->name('gerente.edit');
    Route::post('/dashboard/gerente/adicionar/funcionario', [GerenteController::class, 'store'])->name('adc.func');
    Route::get('/dashboard/cliente/obterFuncionariosDisponiveis', [AgendamentoController::class, 'obterFuncionariosDisponiveis'])->name('funcs');
    Route::put('/cliente/desativar/{id}', 'App\Http\Controllers\GerenteController@updateStatusClienteDesativar')->name('cliente.desativar');
    Route::put('/cliente/ativar/{id}', 'App\Http\Controllers\GerenteController@updateStatusClienteAtivar')->name('cliente.ativar');
    Route::get('/dashboard/funcionarios/{id}/edit', [GerenteController::class, 'editFuncionario'])->name('funcionario.edit');
    Route::get('/dashboard/gerente/{id}/editServico', [GerenteController::class, 'editServico'])->name('gerente.editServico');
    Route::post('/dashboard/gerente/adicionar-servico', [GerenteController::class, 'storeServico'])->name('adc.servico');
    Route::put('/dashboard/gerente/{id}/gerente/update', [GerenteController::class, 'perfilUpdate'])->name('gerente.update');
    Route::put('/dashboard/gerente/funcionario/{id}', [GerenteController::class, 'updateFuncionario'])->name('update.funcionario');
    Route::put('/dashboard/gerente/servico/{id}', [GerenteController::class, 'updateServico'])->name('update.servico');
    Route::put('/cliente/desativar/{id}', 'App\Http\Controllers\GerenteController@updateStatusServicoDesativar')->name('gerente.servico.desativar');
    Route::put('/cliente/ativar/{id}', 'App\Http\Controllers\GerenteController@updateStatusServicoAtivar')->name('gerente.servico.ativar');
    Route::post('/dashboard/gerente/vendas', [GerenteController::class, 'vendasCreate'])->name('gerente.vendas.create');
    Route::get('/dashboard/gerente/servicos', [GerenteController::class, 'servicos'])->name('gerente.servicos');
    Route::get('/dashboard/gerente/servInativos', [GerenteController::class, 'servicosInativos'])->name('gerente.servInativos');
    Route::put('/gerente/desativar/{id}/update/gerente/horario', 'App\Http\Controllers\GerenteController@horarioDeletar')->name('gerente.horario.deletar');
    Route::get('/dashboard/gerente/{id}/editHorario', [GerenteController::class, 'horarioEditar'])->name('gerente.editHorario');
    Route::put('/dashboard/gerente/{id}/update/horario', [GerenteController::class, 'horarioUpdate'])->name('update.horario');
    Route::get('/dashboard/gerente/adcHorario', [GerenteController::class, 'adcHorario'])->name('adc.horario');
    Route::post('/dashboard/gerente/adcHorario', [GerenteController::class, 'storeHorario'])->name('adicionar.horario');


    Route::get('/dashboard/gerente/esgotado', [GerenteController::class, 'produtoEsgotado'])->name('produto.esgotado');
    Route::get('/dashboard/gerente/adcproduto', [GerenteController::class, 'adcproduto'])->name('adc.produto');
    Route::post('/dashboard/gerente/adcproduto', [GerenteController::class, 'storeproduto'])->name('adicionar.produto');
    Route::get('/dashboard/gerente/{id}/editProduto', [GerenteController::class, 'editProduto'])->name('edit.produto');
    Route::put('/dashboard/gerente/produto/{id}', [GerenteController::class, 'updateProduto'])->name('update.produto');



});

/// AUTENTICAÇÃO DE BARBEIRO (FUNCIONÁRIO COMUM)
Route::middleware(['autenticacao:barbeiro'])->group(function () {
    Route::get('/dashboard/barbeiro', [BarbeiroController::class, 'index'])->name('barbeiro');
    Route::get('/dashboard/barbeiro/registro', [BarbeiroController::class, 'registro'])->name('barbeiro.registro');
    Route::get('/dashboard/barbeiro/perfil', [BarbeiroController::class, 'perfil'])->name('barbeiro.perfil');
    Route::put('/dashboard/barbeiro/{id}',[BarbeiroController::class, 'update'])->name('barbeiro.update');
    Route::get('/dashboard/barbeiro/{id}/edit',[BarbeiroController::class, 'edit'])->name('barbeiro.edit');
    Route::get('/dashboard/barbeiro/compromisso', [BarbeiroController::class, 'compromisso'])->name('barbeiro.compromisso');
    Route::get('/dashboard/barbeiro/vendas', [BarbeiroController::class, 'vendas'])->name('barbeiro.vendas');
    Route::post('/dashboard/barbeiro/vendas', [BarbeiroController::class, 'vendasCreate'])->name('barbeiro.vendas.create');
});

// AUTENTICAÇÃO DE CLIENTE
// AUTENTICAÇÃO DE CLIENTE
Route::middleware(['autenticacao:cliente'])->group(function () {
    Route::get('/dashboard/cliente', [ClienteController::class, 'index'])->name('cliente');
    Route::get('/dashboard/cliente/compromissos', [ClienteController::class, 'compromissos'])->name('compromissos');
    Route::get('/dashboard/cliente/agendamento',[AgendamentoController::class, 'index'])->name('agendar');
    Route::get('/dashboard/cliente/agendamento/calendario',[AgendamentoController::class, 'calendario'])->name('pagina.calendario');
    Route::get('/dashboard/cliente/perfil', [ClienteController::class, 'perfil'])->name('perfil.cliente');

Route::put('/dashboard/gerente/{id}', [ClienteController::class, 'perfilUpdate'])->name('cliente.update');
Route::get('/dashboard/cliente/{id}/edit', [ClienteController::class, 'perfilEdit'])->name('cliente.edit');
});

Route::get('/sair', function() {
    session()->flush();
    return redirect('/');
})->name('sair');


Route::get('/dashboard/cliente/obterFuncionariosDisponiveis', [AgendamentoController::class, 'obterFuncionariosDisponiveis'])->name('funcs');
Route::get('/funcs3', [AgendamentoController::class, 'calendario'])->name('funcs2');
Route::get('/consultaH', [AgendamentoController::class, 'consultarHorarios'])->name('consultaH');
Route::post('/agendamentos', 'App\Http\Controllers\AgendamentoController@store')->name('agendamentos.store');
Route::put('/agendamentos/{id}', 'App\Http\Controllers\AgendamentoController@update')->name('agendamento.update');

Route::put('/funcionario/desativar/{id}', 'App\Http\Controllers\GerenteController@updateStatusFuncionarioDesativar')->name('funcionario.desativar');
Route::put('/funcionario/ativar/{id}', 'App\Http\Controllers\GerenteController@updateStatusFuncionarioAtivar')->name('funcionario.ativar');
Route::get('/cliente/{id}', [ClienteController::class, 'show'])->name('cliente.show');
Route::get('/servico/show', [ServicoController::class, 'show'])->name('servico.show');


Route::get('/emailFuncionario', [AgendamentoController::class, 'getEmailFunc'])->name('email.func');

Route::get('/emailCliente', [AgendamentoController::class, 'getEmailCli'])->name('email.cliente');

Route::post('/loginApi', [LoginController::class, 'login'])->name('login.api');
Route::get('/agendamento/show/{id}', [AgendamentoController::class, 'show'])->name('show.agendamento');

Route::get('/funcionarios/show', [FuncionarioController::class, 'show'])->name('funcionarios.show');
