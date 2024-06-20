<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['auth:sanctum', 'cliente'])->group(function (){
    Route::apiResource('login', LoginController::class);
    Route::post('/loginApi', [LoginController::class, 'login'])->name('login.api');
});


Route::apiResource('agendamento','App\Http\Controllers\AgendamentoController');
Route::apiResource('servico','App\Http\Controllers\ServicoController');
Route::apiResource('funcionario','App\Http\Controllers\FuncionarioController');
Route::apiResource('cliente','App\Http\Controllers\ClienteController');
// Route::apiResource('login','App\Http\Controllers\LoginController');



