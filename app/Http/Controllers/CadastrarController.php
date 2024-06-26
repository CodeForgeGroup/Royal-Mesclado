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
        $request->validate([
            'nomeCadastrar'         => 'required|string|max:100',
            'sobrenomeCadastrar'    => 'required|string|max:200',
            'emailCadastrar'        => 'required|email|unique:clientes,emailCliente|max:250',
            'senhaCadastrar'        => 'required|string|min:6',
            'telefoneCadastrar'     => 'required|string|max:11|min:11',
            'enderecoCadastrar'     => 'required|string|max:255'
        ], [
            'nomeCadastrar.required' => 'O campo de nome precisa ser preenchido',
            'nomeCadastrar.max' => 'O nome excedeu o limite permitido',

            'emailCadastrar.required' => 'O campo de e-mail precisa ser preenchido!',
            'emailCadastrar.unique' => 'O e-mail já está cadastrado!',
            'emailCadastrar.email' => 'O e-mail não contém o formato adequado!',

            'senhaCadastrar.required' => 'O campo de senha precisa ser preenchido!',
            'senhaCadastrar.min' => 'O campo de senha deve ter no mínimo 6 caracteres!',

            'telefoneCadastrar.required' => 'O campo de telefone precisa ser preenchido!',
            'telefoneCadastrar.max' => 'O campo de telefone deve ter no máximo 11 caracteres!',
            'telefoneCadastrar.min' => 'O campo de telefone deve ter ddd e 11 caracteres!',

            'enderecoCadastrar.required' => 'O campo de endereço precisa ser preenchida!',
        ]);

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
