<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FuncionarioController extends Controller
{

    public $funcionario;

    public function __construct(Funcionario $funcionario)
    {
        $this->funcionario = $funcionario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        // return 'Presente - Store';
        // dd($request->all());
        // $aluno = Aluno::create($request->all());

        // return $aluno;


         // Para não pegar imagem será apenas isso

        //  $request->validate($this->funcionario->Regras(), $this->funcionario->Feedback());

         $imagem = $request->file('fotoFuncionario');

         $imagem_url = $imagem->store('imagem','public');

         $funcionario = $this->funcionario->create([
            'nomeFuncionario' => $request->nomeFuncionario,
            'sobrenomeFuncionario' => $request->sobrenomeFuncionario,
            'numeroFuncionario' => $request->numeroFuncionario,
            'emailFuncionario' => $request->emailFuncionario,
            'especialidadeFuncionario' => $request->especialidadeFuncionario,
            'inicioExpedienteFuncionario' => $request->inicioExpedienteFuncionario,
            'fimExpedienteFuncionario' => $request->fimExpedienteFuncionario,
            'cargoFuncionario' => $request->cargoFuncionario,
            'qntCortesFuncionario' => $request->qntCortesFuncionario,
            'salarioFuncionario' => $request->salarioFuncionario,
            'statusFuncionario' => $request->statusFuncionario,
            'dataNascFuncionario' => $request->dataNascFuncionario,
            'descricaoFuncionario' => $request->descricaoFuncionario,
            'fotoFuncionario' => $imagem_url
         ]);

         return response()->json($funcionario, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        $funcionarios = DB::select("SELECT f.id, f.nomeFuncionario, f.sobrenomeFuncionario, f.fotoFuncionario,f.especialidadeFuncionario
        FROM funcionarios f WHERE statusFuncionario = 'ATIVO' AND cargoFuncionario = 'barbeiro'");

        return response()->json($funcionarios);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // // return 'Update';
        // print_r($request->all()); //Dados novos
        // echo '<hr>';
        // print_r($aluno->getAttributes()); // Dados Antigos

        // $aluno->update($request->all());
        // return $aluno;
        $funcionario = $this->funcionario->find($id);

        // dd($request->nomeAluno);
        // dd($request->file('fotoAluno'));

         if($funcionario === null){
             return response()->json(['erro' => 'Impossível realizar a atualização. O aluno não existe!'], 404);
         }

         if($request->method() === 'PATCH') {
             // return ['teste' => 'PATCH'];

             $dadosDinamico = [];

             foreach ($funcionario->Regras() as $input => $regra) {
                 if(array_key_exists($input, $request->all())) {
                     $dadosDinamico[$input] = $regra;
                 }
             }

             // dd($dadosDinamico);

             $request->validate($dadosDinamico, $this->funcionario->Feedback());
         }
         else{
             $request->validate($this->funcionario->Regras(), $this->funcionario->Feedback());
         }

         if($request->file('fotoFuncionario')){
            Storage::disk('public')->delete($funcionario->fotoFuncionario);
         }



        $imagem = $request->file('fotoFuncionario');

        $imagem_url = $imagem->store('imagem','public');

        $funcionario->update([
            'nomeFuncionario' => $request->nomeFuncionario,
            'fotoFuncionario' => $imagem_url
        ]);



        return response()->json($funcionario, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        //
    }
}
