<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login');
    }


    public function autenticar(Request $request)
    {

        $regras = [
            'email' => 'required|email',
            'password' => 'required|max:20'
        ];

        $msg = [
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O e-mail informado não é válido!.',
            'password.required' => 'O campo de senha é obrigatório!'
        ];

        $request->validate($regras, $msg);

        $email = $request->get('email');
        $password = $request->get('password');



        $usuario = Usuario::where('email', $email)->first();


        if (!$usuario) {
            return back()->withErrors(['email' => 'O email informado não está cadastrado.']);
        }

        if ($usuario->senha != $password) {
            return back()->withErrors(['password' => 'Senha incorreta.']);
        }

        $tipoUsuario = $usuario->tipo_usuario;

        session([
            'email' => $usuario->email,
        ]);


        if ($tipoUsuario instanceof Cliente) {

            session([
                'id' => $tipoUsuario->id,
                'nome' => $tipoUsuario->nomeCliente,
                'cargo' => 'cliente'
            ]);

            return redirect()->route('compromissos');

        }
        elseif ($tipoUsuario instanceof Funcionario){
            if ($tipoUsuario->cargoFuncionario == 'gerente') {

                session([
                    'id'    => $tipoUsuario->id,
                    'nome'  => $tipoUsuario->nomeFuncionario,
                    'sobrenome' => $tipoUsuario->sobrenomeFuncionario,
                    'fotoFuncionario' => $tipoUsuario->fotoFuncionario,
                    'cargo' => 'gerente'
                ]);

                return redirect()->route('gerente');

            } elseif ($tipoUsuario->cargoFuncionario == 'barbeiro') {

                session([
                    'id'    => $tipoUsuario->id,
                    'nome'  => $tipoUsuario->nomeFuncionario,
                    'sobrenome' => $tipoUsuario->sobrenomeFuncionario,
                    'fotoFuncionario' => $tipoUsuario->fotoFuncionario,
                    'cargo' => 'barbeiro'
                ]);

                return redirect()->route('barbeiro');
            }

        }else{
            // dd($tipoUsuario);
            echo 'TEM ALGO ERRADO!!!';
        }


    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = Usuario::where('email', $credentials['email'])->where('senha', $credentials['senha'])->first();

        if ($usuario && $usuario->tipo_usuario_type === 'cliente') {
            $cliente = $usuario->tipo_usuario()->first();
            if ($cliente) {
                $token = $usuario->createToken('Token de acesso')->plainTextToken;

                return response()->json([
                    'message' => 'Login com sucesso!',
                    'usuario' => [
                        'id' => $usuario->id,
                        'nome' => $usuario->nome,
                        'email' => $usuario->email,
                        'tipo_usuario' => $usuario->tipo_usuario_type,
                        'dados_cliente' => [
                            'id' => $cliente->id,
                            'nome' => $cliente->nomeCliente,
                            'email' => $cliente->emailCliente,
                        ],
                    ],
                    'acess_token' => $token,
                    'token_type' => 'Bearer',
                ]);
            }
        }

        return response()->json(['message' => 'Credenciais invalidas ou usuario não é um cliente'], 401);
    }

}
