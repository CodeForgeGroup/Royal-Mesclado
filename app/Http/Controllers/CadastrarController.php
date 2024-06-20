<?php

namespace App\Http\Controllers;

use App\Models\Cadastrar;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Usuario;
use Illuminate\Http\Request;

class CadastrarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('site.cadastrar');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cadastrar(Request $request)
{

    $regras = [
        'nomeCadastrar'         => 'nullable|string|max:100',
        'sobrenomeCadastrar'    => 'nullable|string|max:200',
        'emailCadastrar'        => 'nullable|email|unique:clientes,emailCliente|max:250',
        'senhaCadastrar'        => 'nullable|string|max:255',
        'telefoneCadastrar'     => 'nullable|string|max:11',
        'enderecoCadastrar'     => 'nullable|string|max:255'
    ];

    $errors = [
        'emailCadastrar.unique' => 'O e-mail já está cadastrado!'
    ];


    $request->validate($regras, $errors);
    
    // Crie um novo cliente
    $cliente = new Cliente();
    $cliente->fotoCliente       = 'SEM IMAGEM';
    $cliente->nomeCliente       = $request->input('nomeCadastrar');
    $cliente->sobrenomeCliente  = $request->input('sobrenomeCadastrar');
    $cliente->emailCliente      = $request->input('emailCadastrar');
    $cliente->telefoneCliente   = $request->input('telefoneCadastrar');
    $cliente->enderecoCliente   = $request->input('enderecoCadastrar');
    $cliente->qtdCortesCliente  = '0';
    $cliente->statusCliente     = 'ativo';
    $cliente->save();

    // Crie um novo usuário associado ao cliente
    $usuario = new Usuario();
    $usuario->nome                = $request->input('nomeCadastrar');
    $usuario->senha               = $request->input('senhaCadastrar');
    $usuario->email               = $request->input('emailCadastrar');
    $usuario->tipo_usuario_id     = $cliente->id; // Atribua o ID do cliente ao tipo_usuario_id
    $usuario->tipo_usuario_type   = 'cliente';
    $usuario->save();

    return redirect()->route('login');
}
}
