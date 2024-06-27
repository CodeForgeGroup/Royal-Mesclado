<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Usuario;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }


    public function index()
    {
        $idCliente = session('id');

        $cliente = Cliente::find($idCliente);

        if(!$cliente){
            abort('404', 'Cliente não encontrado');
        }

        return view('dashboard.cliente.index', compact('cliente'));
    }

    public function compromissos()
    {
    $id = session('id');
    $cliente = Cliente::find($id);

    $dados = Agendamento::where('cliente_id', $id)
    ->where(function ($query) {
        $query->where('statusServico', 'PENDENTE')
              ->orWhere('statusServico', 'CONFIRMADO')
              ->orWhere('statusServico', 'CANCELADO');
    })
    ->get();



    // // Iterar sobre cada agendamento para obter seu status
    // foreach ($dados as $agendamento) {
    // //    dd($dados->find(2));
    //    $agendamento2 = $dados->find(2);
    // //    dd($agendamento2->statusServico);
    // }

    return view('dashboard.cliente.compromissos', ['dados' => $dados], compact('cliente'));
    }

    public function perfil(){
    $id = session('id');
    $cliente = Cliente::find($id);

    return view('dashboard.cliente.perfil', compact('cliente'));
    }

    public function perfilEdit($id)
    {
        $cliente = Cliente::find($id);
        $senha = Usuario::where('tipo_usuario_id', $id)->first();

        if (!$cliente) {
            abort(404, 'cliente não encontrado');
        }

        $numeroFormatado = number_format($cliente->numeroCliente, 0, '', '');

        // Adicione os parênteses e o hífen

        $numeroFormatado = '(' . substr($numeroFormatado, 0, 2) . ') ' . substr($numeroFormatado, 2, 5) . '-' . substr($numeroFormatado, 7);


        return view('dashboard.cliente.edit', compact('cliente', 'numeroFormatado', 'senha'));
    }

    public function perfilUpdate(Request $request, $id)
    {

        // $idFunc = session('id');
        // $ClienteLogado = Cliente::find($idFunc);

        $cliente = Cliente::find($id);



        $request->validate([
            // 'fotoServico' => 'required|max:255',
            'nomeCliente' => 'required|string|max:150',
            'sobrenomeCliente' => 'required|string|max:150',
            'emailCliente' => 'required|email|unique:usuarios,email,' . $cliente->id,
            'telefoneCliente' => 'required|numeric|min:9',
            'enderecoCliente' => 'required',
        ], [
            // 'fotoServico.required' => 'O campo de foto é obrigatório.',

            'nomeCliente.required' => 'O campo nome é obrigatório.',
            'nomeCliente.string' => 'O campo nome deve ser uma string.',
            'nomeCliente.max' => 'O campo nome não pode ter mais de 150 caracteres.',

            'sobrenomeCliente.required' => 'O campo descrição deve ser preenchido.',
            'sobrenomeCliente.max' => 'O campo descrição não pode ter mais de 255 caracteres.',

            'telefoneCliente.required' => 'O campo de valor deve ser preenchido.',
            'telefoneCliente.numeric' => 'O campo de valor deve ser numérico.',
            'telefoneCliente.min' => 'O campo de valor deve ter uma quantidade maior.',

            'emailCliente.required' => 'O campo de email precisa ser preenchido.',
            'emailCliente.email' => 'O campo de email precisa estar em formato de email',

            'enderecoCliente.required' => 'O campo de valor deve ser preenchido.',

        ]);

        $numeroFormatado = $request->dddCliente . $request->telefoneCliente;

        // $testeDDD = $request->dddCliente;
        // $testeNumero = $request->numeroCliente;

        // Substituir a vírgula decimal por um ponto
        // $salarioCliente = str_replace(',', '.', $numero_formatado);


        // dd($request->salarioCliente );


        // Verifica se o funcionário existe
        if ($cliente === null) {
            return response()->json(['error' => 'Impossível realizar a operação. O barbeiro não existe'], 404);
        }

        $usuario = DB::select('SELECT * FROM usuarios WHERE tipo_usuario_id = ?', [$id]);

        // Verifica se o usuário existe
        if ($usuario === null) {
            return response()->json(['error' => 'Impossível realizar a operação. O usuário não existe'], 404);
        }




        // Verifica se um arquivo foi enviado e se é válido
        if ($request->hasFile('fotoCliente') && $request->file('fotoCliente')->isValid()) {
            // Se uma imagem foi enviada, remova a imagem antiga, se existir
            if ($cliente->fotoCliente) {
                Storage::disk('public')->delete($cliente->fotoCliente);
            }

            // Salva a nova imagem
            $imagem = $request->file('fotoCliente');
            $imagem_url = $imagem->store('imagem', 'public');

            // Atualiza o cliente com a nova imagem
            $cliente->update([
                'fotoCliente' => $imagem_url,
            ]);
        } elseif ($cliente->fotoCliente) {
            // Se nenhuma imagem foi enviada, mas uma imagem existente está armazenada no banco de dados,
            // mantenha a mesma imagem
            $imagem_url = $cliente->fotoCliente;
        }

        $numeroCliente = preg_replace('/[^0-9]/', '', $numeroFormatado);

        $cliente->update([
            'fotoCliente' => $imagem_url,
            'nomeCliente' => $request->nomeCliente,
            'sobrenomeCliente' => $request->sobrenomeCliente,
            'telefoneCliente' => $numeroCliente,
            'emailCliente' => $request->emailCliente,
            'statusCliente' => 'ATIVO',
            'enderecoCliente' => $request->enderecoCliente,
        ]);


        DB::table('usuarios')
            ->where('tipo_usuario_id', $id)
            ->update([
                'nome' => $request->nomeCliente,
                'email' => $request->emailCliente,
                'senha' => $request->senhaCliente,

            ]);



        return redirect()->route('login');

    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente === null){
            if (is_null($cliente)) {
                return response()->json(['message' => 'Cliente não encontrado'], 404);
            }
        }

        return response()->json($cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */

    public function updateFoto(Request $request, $id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // // return 'Update';
        // print_r($request->all()); //Dados novos
        // echo '<hr>';
        // print_r($aluno->getAttributes()); // Dados Antigos

        // $aluno->update($request->all());
        // return $aluno;
        $cliente = $this->cliente->find($id);

        // dd($request->nomeAluno);
        // dd($request->file('fotoAluno'));

         if($cliente === null){
             return response()->json(['erro' => 'Impossível realizar a atualização. O cliente não existe!'], 404);
         }

         if($request->method() === 'PATCH') {
            //  return ['teste' => 'PATCH'];

             $dadosDinamico = [];

             foreach ($cliente->Regras() as $input => $regra) {
                 if(array_key_exists($input, $request->all())) {
                     $dadosDinamico[$input] = $regra;
                 }
             }

            //  dd($dadosDinamico);

             $request->validate($dadosDinamico, $this->cliente->Feedback());
         }
         else{
             $request->validate($this->cliente->Regras(), $this->cliente->Feedback());
         }

         if($request->file('fotoCliente')){
            Storage::disk('public')->delete($cliente->fotoCliente);
         }



        $imagem = $request->file('fotoCliente');

        $imagem_url = $imagem->store('imagem','public');

        $cliente->update([
            // 'nomeCliente' => $request->nomeCliente,
            'fotoCliente' => $imagem_url
        ]);


        return response()->json($cliente, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
