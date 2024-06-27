<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Http\Controllers\Controller;
use App\Mail\ClienteAgendamento;
use App\Models\Cliente;
use App\Models\Funcionario;
use App\Models\Horario;
use App\Models\Servico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\FuncionarioAgendamento;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AgendamentoController extends Controller
{

    public $servico;
    public $funcionarios;
    public $agendamento;

    public function __construct(Agendamento $agendamento)
    {
        $this->agendamento = $agendamento;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = session('id');
        $cliente = Cliente::find($id);
        $servico = Servico::all();

        return view('dashboard.agendar.index', compact('servico', 'cliente'));
    }
    // public function obterFuncionariosDisponiveis(Request $request)
    // {
    //     $this->day = $request->input('day');
    //     $this->month = $request->input('month');

    //     if ($this->month == 'Abril') {
    //         $this->month = '04';
    //     }

    //     // Aqui você executa a consulta SQL com base na data recebida
    //     // e retorna os funcionários disponíveis

    //     // Exemplo de consulta (não inclui a execução real da consulta)


    //     // return response()->json(['funcionarios' => $funcionarioAJAX]);
    //     $this->funcionarios = $funcionarioAJAX;
    //     //dd($this->funcionarios, 'Cheguei');
    // }


    public $day;
    public $month;





    public function calendario(Request $request){


        $servico = Servico::all();
        $idCliente = session('id');

        $cliente = Cliente::find($idCliente);


        if($request->json() && $request->has('day','month')){
            $this->day = $request->day;
            $this->month = $request->month;
            if($this->month == 'Abril'){
                $this->month = '4';
            }

            // $funcionarioAJAX = Funcionario::whereDoesntHave('agendamento', function ($query) use ($day, $month) {
            //     $query->whereMonth('data', '=', $month)
            //     ->whereDay('data', '=', $day);
            // })->get();

            $funcionarios = DB::select("SELECT f.id, f.nomeFuncionario, f.sobrenomeFuncionario, f.fotoFuncionario,f.especialidadeFuncionario
            FROM funcionarios f WHERE statusFuncionario = 'ATIVO' AND cargoFuncionario = 'barbeiro'");

            return response()->json($funcionarios);
        }


        return view('dashboard.agendar.calendario', compact('servico','cliente'));
    }



    public function consultarHorarios(Request $request) {
        if ($request->json() && $request->has('day', 'month')) {
            $day = $request->day;
            $month = $request->month;
            $monthMap = [
                'Janeiro' => '1', 'Fevereiro' => '2', 'Março' => '3', 'Abril' => '4',
                'Maio' => '5', 'Junho' => '6', 'Julho' => '7', 'Agosto' => '8',
                'Setembro' => '9', 'Outubro' => '10', 'Novembro' => '11', 'Dezembro' => '12'
            ];
            $month = $monthMap[$month] ?? $month;

            $dataHorarios = date('Y-m-d', strtotime("2024-$month-$day"));

            // Log the date being processed
            Log::info('Data Horarios:', ['dataHorarios' => $dataHorarios]);

            $funcionarioId = $request->input('funcionario_id');
            $nomeFunc = $request->input('nome_funcionario');
            $idServico = $request->input('idServico');
            $clienteId = $request->input('cliente_id'); // Supondo que você está recebendo o cliente_id no request

            $servico = Servico::find($idServico);
            $duracaoServico = $servico->duracaoServico;

            $funcionario = Funcionario::find($funcionarioId);
            $inicioExpediente = $funcionario->inicioExpedienteFuncionario;
            $fimExpediente = $funcionario->fimExpedienteFuncionario;

            // Log the service duration and working hours
            Log::info('Duracao em Minutos:', ['duracaoEmMinutos' => $duracaoServico]);
            Log::info('Inicio Expediente:', ['inicioExpediente' => $inicioExpediente]);
            Log::info('Fim Expediente:', ['fimExpediente' => $fimExpediente]);

            // Converte a duração do serviço para minutos
            $duracaoEmMinutos = (strtotime($duracaoServico) - strtotime('TODAY')) / 60;

            // Log the converted service duration
            Log::info('Duracao em Minutos Convertida:', ['duracaoEmMinutos' => $duracaoEmMinutos]);

            // Executa a consulta SQL para obter os horários disponíveis considerando a disponibilidade do cliente e do funcionário
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

            Log::info('Consulta SQL:', ['query' => $query]);

            $horariosDisponiveis = DB::select($query, [$funcionarioId, $dataHorarios, $clienteId, $dataHorarios, $inicioExpediente, $duracaoEmMinutos, $fimExpediente]);

            // Log the available schedules
            Log::info('Horarios Disponiveis:', ['horariosDisponiveis' => $horariosDisponiveis]);

            foreach ($horariosDisponiveis as $horario) {
                $horarioId = $horario->horario_id;
                $horario->horario_id = (int)$horarioId; // Garante que o ID do horário seja inteiro
            }

            $dados = [
                'funcionario_id' => $funcionarioId,
                'horarios_disponiveis' => $horariosDisponiveis,
                'nome_funcionario' => $nomeFunc,
                'data_horario' => $dataHorarios,
            ];

            return response()->json($dados);
        } else {
            return response()->json(['error' => 'Os parâmetros "day" e "month" são obrigatórios.'], 400);
        }
    }




       public function getEmailFunc(Request $request)
       {
           $funcionarioId = $request->input('funcionario_id');

           // Verifique se o ID do funcionário está presente e válido
           if (!$funcionarioId) {
               return response()->json(['error' => 'ID do funcionário não fornecido.'], 400);
           }

           // Obtenha o e-mail do funcionário
           $emailFuncionario = DB::table('funcionarios')
               ->where('id', $funcionarioId)
               ->value('emailFuncionario');

           // Verifique se o funcionário foi encontrado
           if (!$emailFuncionario) {
               return response()->json(['error' => 'Funcionário não encontrado.'], 404);
           }

           return response()->json(['emailFuncionario' => $emailFuncionario]);
       }



       public function getEmailCli(Request $request)
       {
           $clienteId = $request->input('cliente_id');

           // Verifique se o ID do cliente está presente e válido
           if (!$clienteId) {
               return response()->json(['error' => 'ID do Cliente não fornecido.'], 400);
           }

           // Obtenha o e-mail do Cliente
           $emailCliente = DB::table('clientes')
               ->where('id', $clienteId)
               ->value('emailCliente');

           // Verifique se o Cliente foi encontrado
           if (!$clienteId) {
               return response()->json(['error' => 'Cliente não encontrado.'], 404);
           }

           return response()->json(['emailFuncionario' => $emailCliente]);
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

     public function formatarTelefone($telefone)
{
    $telefone = preg_replace('/\D/', '', $telefone);

    if (strlen($telefone) === 11) {

        return "(".substr($telefone, 0, 2).") ".substr($telefone, 2, 5)."-".substr($telefone, 7);
    } elseif (strlen($telefone) === 10) {

        return "(".substr($telefone, 0, 2).") ".substr($telefone, 2, 4)."-".substr($telefone, 6);
    }

    return $telefone;
}






public function store(Request $request)
{
    $duracaoServico = $this->getDuracaoServico($request->servico_id);
    $horaInicial = $request->horarioSelecionado;

    $duracaoEmSegundos = strtotime($duracaoServico) - strtotime('TODAY');


    $horaInicialEmSegundos = strtotime($horaInicial) - strtotime('TODAY');

    $horaFinalEmSegundos = $horaInicialEmSegundos + $duracaoEmSegundos;


    $horaFinalEmSegundos -= 1;


    $horaFinal = date('H:i:s', strtotime('TODAY') + $horaFinalEmSegundos);



     $agendamento = $this->agendamento->create([
         'funcionario_id' => $request->funcionario_id,
         'cliente_id' => $request->cliente_id,
         'servico_id' => $request->servico_id,
         'horario_id' => $request->horario_id,
         'dataAgendamento' => $request->dataAgendamento,
         'horarioInicial' => $horaInicial,
         'horarioFinal' => $horaFinal,
         'statusServico' => 'PENDENTE'
     ]);

    $emailFuncionario = $this->getEmailFuncionario($request->funcionario_id);
    $nomeCliente = $this->getNomeCliente($request->cliente_id);
    $sobrenomeCliente = $this->getSobrenomeCliente($request->cliente_id);
    $telefoneCliente = $this->getTelefoneCliente($request->cliente_id);
    $telefoneFuncionario = $this->getTelefoneFuncionario($request->cliente_id);
    $emailCliente = $this->getEmailCliente($request->cliente_id);
    $nomeServico = $this->getNomeServico($request->servico_id);
    $descricaoServico = $this->getDescricaoServico($request->servico_id);
    $nomeFuncionario = $this->getNomeFuncionario($request->funcionario_id);
    $sobrenomeFuncionario = $this->getSobrenomeFuncionario($request->funcionario_id);
    $dataAgendamento = $request->dataAgendamento;
    $dataFormatada = date('d/m/Y', strtotime($dataAgendamento));
    $horaInformal = $request->horarioSelecionado;
    $horamensagem = date("H:i", strtotime($horaInformal));


    $telefoneFormatado = $this->formatarTelefone($telefoneCliente);
    // $telefoneFormatado = $this->formatarTelefone($telefoneFuncionario);
    $telefoneFormatadoF = $this->formatarTelefone($telefoneFuncionario);


    $dadosAgendamento = [
        'cliente_nome' => $nomeCliente,
        'cliente_sobrenome' => $sobrenomeCliente,
        'telefoneCliente' => $telefoneFormatado,
        'emailCliente' => $emailCliente,
        'descricao_servico' => $descricaoServico,
        'servico_nome' => $nomeServico,
        'dataAgendamento' => $dataFormatada,
        'horarioSelecionado' => $horamensagem,
        'nomeFuncionario' => $nomeFuncionario,
    ];

    $dadosAgendamentoCliente = [
        'nomeCliente' => $nomeCliente,
        'nomeFuncionario' => $nomeFuncionario,
        'funcionario_sobrenome' => $sobrenomeFuncionario,
        'telefoneFuncionario' => $telefoneFormatadoF,
        'emailFuncionario' => $emailFuncionario,
        'descricao_servico' => $descricaoServico,
        'servico_nome' => $nomeServico,
        'dataAgendamento' => $dataFormatada,
        'horarioSelecionado' => $horamensagem,
    ];


    $this->enviarEmailFuncionario($emailFuncionario, $dadosAgendamento);
    $this->enviarEmailCliente($emailCliente, $dadosAgendamentoCliente);


    return response()->json($agendamento, 200);
}





    public function getEmailFuncionario($funcionarioId)
    {
        $funcionario = DB::table('funcionarios')->where('id', $funcionarioId)->first();
        return $funcionario->emailFuncionario;
    }

    public function getNomeCliente($clienteId)
    {
        $cliente = DB::table('clientes')->where('id', $clienteId)->first();
        return $cliente->nomeCliente;
    }

    public function getEmailCliente($clienteId)
    {
        $cliente = DB::table('clientes')->where('id', $clienteId)->first();
        return $cliente->emailCliente;
    }

    public function getTelefoneCliente($clienteId)
    {
        $cliente = DB::table('clientes')->where('id', $clienteId)->first();
        return $cliente->telefoneCliente;
    }
    public function getTelefoneFuncionario($funcionarioId)
    {
        $funcionario = DB::table('funcionarios')->where('id', $funcionarioId)->first();
        return $funcionario->numeroFuncionario;
    }
    public function getSobrenomeCliente($clienteId)
    {
        $cliente = DB::table('clientes')->where('id', $clienteId)->first();
        return $cliente->sobrenomeCliente;
    }

    public function getNomeServico($servicoId)
    {
        $servico = DB::table('servicos')->where('id', $servicoId)->first();
        return $servico->nomeServico;
    }

    public function getDescricaoServico($servicoId)
    {
        $servico = DB::table('servicos')->where('id', $servicoId)->first();
        return $servico->descricaoServico;
    }
    public function getDuracaoServico($servicoId)
    {
        $servico = DB::table('servicos')->where('id', $servicoId)->first();
        return $servico->duracaoServico;
    }

    public function getNomeFuncionario($funcionarioId){
        $funcionario = DB::table('funcionarios')->where('id', $funcionarioId)->first();
        return $funcionario->nomeFuncionario;
    }

    public function getSobrenomeFuncionario($funcionarioId){
        $funcionario = DB::table('funcionarios')->where('id', $funcionarioId)->first();
        return $funcionario->sobrenomeFuncionario;
    }


    public function enviarEmailFuncionario($emailFuncionario, $dadosAgendamento)
    {
        Mail::to($emailFuncionario)->send(new FuncionarioAgendamento($dadosAgendamento));
    }







    public function enviarEmailCliente($emailCliente, $dadosAgendamentoCliente)
    {
        Mail::to($emailCliente)->send(new ClienteAgendamento($dadosAgendamentoCliente));
    }












    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
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



        $agendamentos = Agendamento::with(['servico', 'funcionario'])
        ->where("cliente_id", $id)
        ->where(function ($query){
            $query->where('statusServico', 'PENDENTE')
                  ->orWhere('statusServico', 'CONFIRMADO')
                  ->orWhere('statusServico', 'CANCELADO');
        })->get();

    return response()->json($agendamentos);
    }

    public function cancelarAgendamento(Request $request, $id){

    $agendamento = $this->agendamento->find($id);

    if($agendamento === null){
        return response()->json(['erro' => 'Impossível realizar a atualização. O agendamento não existe!'], 404);
    }

    $agendamento->update([
        'statusServico' => $request->statusAgendamento
    ]);

    return response()->json($agendamento, 200);
    }


    public function showStatus(){

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Agendamento $agendamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
{
    $agendamento = $this->agendamento->find($id);

    if($agendamento === null){
        return response()->json(['erro' => 'Impossível realizar a atualização. O agendamento não existe!'], 404);
    }

    $agendamento->update([
        'statusServico' => $request->statusAgendamento
    ]);

    return response()->json($agendamento, 200);
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
        //
    }
}
