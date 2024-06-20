<?php

namespace App\Http\Middleware;

use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Usuario;
use Closure;
use Illuminate\Http\Request;

class AutRoyalMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $tipoUser)
    {
        $email = session('email');

        if ($email) {
            $usuario = Usuario::where('email', $email)->first();

            if (!$usuario) {
                return redirect()->route('login');
            }

            $tipoUsuario = $usuario->tipo_usuario;

            $tipo = null;

            if ($tipoUsuario instanceof Cliente) {
                $tipo = 'cliente';
            } elseif ($tipoUsuario instanceof Funcionario) {
                $tipo = $tipoUsuario->cargoFuncionario;
            }
        }

        if ($tipo == $tipoUser) {
            return $next($request);
        } else {
            return back()->withErrors(['email' => 'Acesso não permitido ao perfil']);
        }
    }
}
