<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicoController extends Controller
{

    public $servico;

    public function __construct(Servico $servico)
    {
        $this->servico = $servico;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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

         $request->validate($this->servico->Regras(), $this->servico->Feedback());

         $imagem = $request->file('fotoServico');

         $imagem_url = $imagem->store('imagem','public');

         $servico = $this->servico->create([
            'nomeServico' => $request->nomeServico,
            'valorServico' => $request->valorServico,
            'duracaoServico' => $request->duracaoServico,
            'descricaoServico' => $request->descricaoServico,
            'fotoServico' => $imagem_url
         ]);

         return response()->json($servico, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show(Servico $servico)
    {
        $servicos = Servico::all()->map(function($servico) {
            $servico->fotoServico = url('storage/imagem/' . $servico->fotoServico);  // Ajustar caminho da imagem
            return $servico;
        });
        return response()->json($servicos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit(Servico $servico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servico  $servico
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
        $servico = $this->servico->find($id);

        // dd($request->nomeAluno);
        // dd($request->file('fotoAluno'));

         if($servico === null){
             return response()->json(['erro' => 'Impossível realizar a atualização. O serviço não existe!'], 404);
         }

         if($request->method() === 'PATCH') {
             // return ['teste' => 'PATCH'];

             $dadosDinamico = [];

             foreach ($servico->Regras() as $input => $regra) {
                 if(array_key_exists($input, $request->all())) {
                     $dadosDinamico[$input] = $regra;
                 }
             }

             // dd($dadosDinamico);

             $request->validate($dadosDinamico, $this->servico->Feedback());
         }
         else{
             $request->validate($this->servico->Regras(), $this->servico->Feedback());
         }

         if($request->file('fotoServico')){
            Storage::disk('public')->delete($servico->fotoServico);
         }



        $imagem = $request->file('fotoServico');

        $imagem_url = $imagem->store('imagem','public');

        $servico->update([
            'nomeServico' => $request->nomeServico,
            'valorServico' => $request->valorServico,
            'duracaoServico' => $request->duracaoServico,
            'descricaoServico' => $request->descricaoServico,
            'fotoServico' => $imagem_url
        ]);



        return response()->json($servico, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico)
    {
        //
    }
}
