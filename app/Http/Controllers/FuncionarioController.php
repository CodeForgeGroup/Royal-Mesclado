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
    public function showBarbeiros(Funcionario $funcionario)
    {
        $funcionarios = DB::select("SELECT f.id, f.nomeFuncionario, f.sobrenomeFuncionario, f.fotoFuncionario,f.especialidadeFuncionario
        FROM funcionarios f WHERE statusFuncionario = 'ATIVO' AND cargoFuncionario = 'barbeiro'");

        return response()->json($funcionarios);
    }

    public function showHorarios(Request $request){

           // Recebendo os parâmetros do request
            $funcionarioId = $request->input('funcionarioId');
            $dataHorarios = $request->input('dataHorarios');
            $clienteId = $request->input('clienteId');
            $duracaoEmMinutos = $request->input('duracaoEmMinutos');

            // Resgatar o início e fim do expediente do funcionário
            $funcionario = Funcionario::find($funcionarioId);
            // dd($funcionario);
            $inicioExpediente = $funcionario->inicioExpedienteFuncionario;
            $fimExpediente = $funcionario->fimExpedienteFuncionario;

            // Formatar a data
            $dataHorarios = date('Y-m-d', strtotime($dataHorarios));
            $duracaoEmMinutosForm = (strtotime($duracaoEmMinutos) - strtotime('TODAY')) / 60;

            // dd($funcionarioId, $duracaoEmMinutos, $dataHorarios, $clienteId);

        // $dataHorarios = date('Y-m-d', strtotime("2024-$month-$day"));

        $query = "
                SELECT h.id AS horario_id, h.horarios
                FROM horarios h
                LEFT JOIN (
                    SELECT a.horario_id,
                           a.horarioInicial,
                           a.horarioFinal
                    FROM agendamento a
                    JOIN servicos s ON a.servico_id = s.id
                    WHERE a.funcionario_id = ?
                    AND a.dataAgendamento = ?
                    AND a.statusServico != 'CANCELADO'
                    UNION
                    SELECT a.horario_id,
                           a.horarioInicial,
                           a.horarioFinal
                    FROM agendamento a
                    JOIN servicos s ON a.servico_id = s.id
                    WHERE a.cliente_id = ?
                    AND a.dataAgendamento = ?
                    AND a.statusServico != 'CANCELADO'
                ) a ON h.horarios BETWEEN a.horarioInicial AND a.horarioFinal
                WHERE a.horario_id IS NULL
                AND TIME(h.horarios) >= TIME(?)
                AND ADDTIME(TIME(h.horarios), SEC_TO_TIME(? * 60)) <= TIME(?)
                ORDER BY horarios ASC;";

            // Log::info('Consulta SQL:', ['query' => $query]);
// dd($duracaoEmMinutosForm, $funcionarioId, $dataHorarios, $clienteId, $inicioExpediente, $fimExpediente);
            $horariosDisponiveis = DB::select($query, [
                $funcionarioId,
                $dataHorarios,
                $clienteId,
                $dataHorarios,
                $inicioExpediente,
                $duracaoEmMinutosForm,
                $fimExpediente
            ]);

            return response()->json($horariosDisponiveis);
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
