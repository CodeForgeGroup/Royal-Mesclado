<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Horario;
use App\Models\Produtos;
use App\Models\Servico;
use App\Models\Usuario;
use App\Models\Vendas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;



class GerenteController extends Controller
{

    public $funcionario;
    public $cliente;
    public $usuario;
    public $servico;

    public function __construct(Funcionario $funcionario, Cliente $cliente, Usuario $usuario, Servico $servico)
    {
        $this->funcionario = $funcionario;
        $this->cliente = $cliente;
        $this->usuario = $usuario;
    }


    public function index()
    {
        $idFuncionario = session('id');
        $funcionario = Funcionario::find($idFuncionario);
        $mesAtual = date('m');
        $diaAtual = date('d');

        if (!$funcionario) {
            abort(404, 'Funcionário não encontrado');
        }


        //============================================VENDAS==============================================


        $vendas = Vendas::whereMonth('vendas.created_at', $mesAtual)
            ->orderBy('vendas.created_at', 'desc')
            ->take(10)
            ->get();


        $qntVenda = Vendas::whereMonth('created_at', $mesAtual)->sum('qntVenda');

        $lucroVendas = Vendas::whereMonth('created_at', $mesAtual)->sum('valorVenda');


        //============================================Receita==============================================


        $faturamento = Agendamento::whereMonth('agendamento.created_at', $mesAtual)
            ->join('servicos', 'agendamento.servico_id', '=', 'servicos.id')
            ->sum('servicos.valorServico');

        $totalFaturamento = $faturamento + $lucroVendas;


        //============================================SALÁRIO==============================================


        $salario = Funcionario::sum('salarioFuncionario');


        //============================================CLIENTES==============================================


        $clientesMensais = Funcionario::whereMonth('created_at', now()->month)
            ->whereMonth('created_at', $mesAtual)
            ->sum('qntCortesFuncionario');


        //============================================LUCRO==============================================


        $lucroMensal = $totalFaturamento - $salario;


        //============================================AGENDAMENTO==============================================

        $agendamentos = Agendamento::with(['cliente', 'servico', 'funcionario'])
        ->whereDay('dataAgendamento', $diaAtual)
        ->where('statusServico', 'CONFIRMADO')
        ->orderBy('dataAgendamento', 'asc')->get();

        // dd($agendamentos);



        return view('dashboard.gerente.index', compact('funcionario', 'vendas', 'lucroVendas', 'qntVenda', 'clientesMensais', 'totalFaturamento', 'lucroMensal', 'agendamentos'));
    }

    public function listFuncionarios()
    {
        $idFuncionario = session('id');

        $funcionario = Funcionario::find($idFuncionario);

        $funcionarios = Funcionario::all();

        $anoAtual = Carbon::now()->year;

        $mesAtual = Carbon::now()->month;

        $inicioExpediente = Carbon::parse($funcionario->inicioExpedienteFuncionario)->format('H:i');

        $fimExpediente = Carbon::parse($funcionario->fimExpedienteFuncionario)->format('H:i');

        if (!$funcionario) {
            abort(404, 'Funcionário não encontrado');
        }



        $servicosFeitos = Agendamento::whereYear('agendamento.dataAgendamento', $anoAtual)
            ->whereMonth('agendamento.dataAgendamento', $mesAtual)
            ->where('statusServico', 'CONFIRMADO')
            ->count('cliente_id');


        $funcionarioDoMes = Agendamento::select('funcionario_id', DB::raw('count(funcionario_id) as total'))
            ->whereYear('dataAgendamento', $anoAtual)
            ->whereMonth('dataAgendamento', $mesAtual)
            ->where('statusServico', 'CONFIRMADO')
            ->groupBy('funcionario_id')
            ->orderBy('total', 'desc')
            ->first();


        if ($funcionarioDoMes == null) {

            $totalFuncionario = '0';
        } else {;
            $totalfuncionario = $funcionarioDoMes->total;
        }


        if ($funcionarioDoMes) {
            $funcionarioMes = Funcionario::find($funcionarioDoMes->funcionario_id);
            $funcionarioDoMes = $funcionarioMes->nomeFuncionario;
        } else {
            $funcionarioDoMes == null;
        }


        $total = $totalFuncionario;



        $funcionarioFaturamento = Agendamento::join('servicos', 'agendamento.servico_id', '=', 'servicos.id')
            ->select('agendamento.funcionario_id', DB::raw('SUM(servicos.valorServico) as total_faturamento'))
            ->whereYear('agendamento.dataAgendamento', $anoAtual)
            ->whereMonth('agendamento.dataAgendamento', $mesAtual)
            ->where('agendamento.statusServico', 'CONFIRMADO')
            ->groupBy('agendamento.funcionario_id')
            ->orderBy('total_faturamento', 'desc')
            ->first();

        // dd($funcionarioFaturamento);

        if (!$funcionarioFaturamento) {
            $funcionarioFaturamento = null;
        } else {
            $funcionarioFaturamento = 'R$ ' . number_format($funcionarioFaturamento->total_faturamento, 2, ',', '.');
        }

        $salarios = Funcionario::where('statusFuncionario', 'ativo')
            ->sum('salarioFuncionario');


        $faturamento = Agendamento::join('servicos', 'agendamento.servico_id', '=', 'servicos.id')
            ->whereMonth('agendamento.dataAgendamento', $mesAtual)
            ->whereYear('agendamento.dataAgendamento', $anoAtual)
            ->where('servicos.statusServico', 'CONFIRMADO')
            ->sum('servicos.valorServico');





        return view('dashboard.gerente.funcionarios', compact('funcionario', 'funcionarios', 'inicioExpediente', 'fimExpediente', 'funcionarioDoMes', 'total', 'servicosFeitos', 'salarios', 'faturamento', 'funcionarioFaturamento', 'funcionarioFaturamento'));
    }

    public function adicionarFunc()
    {
        $idFuncionario = session('id');

        $funcionario = Funcionario::find($idFuncionario);

        if (!$funcionario) {
            abort(404, 'Funcionário não encontrado');
        }

        return view('dashboard.gerente.adicionar', compact('funcionario'));
    }

    public function perfil()
    {

        $id = session('id');

        $gerente = Funcionario::find($id);

        $nascimento = date('d/m/Y', strtotime($gerente->dataNascFuncionario));



        return view('dashboard.gerente.perfil', compact('gerente', 'nascimento'));
    }


    public function perfilEdit($id)
    {
        $gerente = Funcionario::find($id);
        $senha = Usuario::where('tipo_usuario_id', $id)->first();

        if (!$gerente) {
            abort(404, 'Gerente não encontrado');
        }

        $numeroFormatado = number_format($gerente->numeroFuncionario, 0, '', '');

        // Adicione os parênteses e o hífen

        $numeroFormatado = '(' . substr($numeroFormatado, 0, 2) . ') ' . substr($numeroFormatado, 2, 5) . '-' . substr($numeroFormatado, 7);


        return view('dashboard.gerente.edit', compact('gerente', 'numeroFormatado', 'senha'));
    }



    public function perfilUpdate(Request $request, $id)
{
    $gerente = Funcionario::find($id);

    // Verifica se o funcionário existe
    if ($gerente === null) {
        return response()->json(['error' => 'Impossível realizar a operação. O barbeiro não existe'], 404);
    }

    $usuario = DB::table('usuarios')->where('tipo_usuario_id', $id)->first();

    // Verifica se o usuário existe
    if ($usuario === null) {
        return response()->json(['error' => 'Impossível realizar a operação. O usuário não existe'], 404);
    }

    // Remove formatação e converte para inteiro
    $salarioFuncionario = (int) str_replace(['.', ','], '', $request->salarioFuncionario);

    $request->merge([
        'numeroFuncionario' => str_replace('-', '', $request->numeroFuncionario),
        'salarioFuncionario' => $salarioFuncionario,
        'dddFuncionario' => str_replace(['(', ')'], '', $request->dddFuncionario),
    ]);



    $request->validate([
        'nomeFuncionario' => 'required|string|max:255',
        'sobrenomeFuncionario' => 'required|string|max:255',
        'especialidadeFuncionario' => 'required|string|max:255',
        'inicioExpedienteFuncionario' => 'required|date_format:H:i:s',
        'fimExpedienteFuncionario' => 'required|date_format:H:i:s|after:inicioExpedienteFuncionario',
        'salarioFuncionario' => 'required|numeric|min:0',
        'emailFuncionario' => 'required|email|max:255|unique:usuarios,email,' . $gerente->id,
        'senhaFuncionario' => 'required|string|min:6',
        'dddFuncionario' => 'required|digits:2',
        'numeroFuncionario' => 'required|digits:9',
        'dataNascFuncionario' => 'required|date',
        'descricaoFuncionario' => 'required|max:255',
        // 'cargoFuncionario' => 'required|string|in:barbeiro,gerente',
        // 'statusFuncionario' => 'required|string|in:ATIVO,DESATIVO',
    ], [
        'nomeFuncionario.required' => 'O campo Nome é obrigatório.',
        'nomeFuncionario.string' => 'O campo Nome deve ser uma string.',
        'nomeFuncionario.max' => 'O campo Nome não pode ter mais de 255 caracteres.',
        'sobrenomeFuncionario.required' => 'O campo Sobrenome é obrigatório.',
        'sobrenomeFuncionario.string' => 'O campo Sobrenome deve ser uma string.',
        'sobrenomeFuncionario.max' => 'O campo Sobrenome não pode ter mais de 255 caracteres.',
        'especialidadeFuncionario.required' => 'O campo de especialidade é obrigatório.',
        'especialidadeFuncionario.string' => 'O campo de especialidade deve ser uma string.',
        'especialidadeFuncionario.max' => 'O campo de especialidade não pode ter mais de 255 caracteres.',
        'inicioExpedienteFuncionario.required' => 'O campo de início de expediente é obrigatório.',
        'inicioExpedienteFuncionario.date_format' => 'O campo de início de expediente deve estar no formato "hora:minuto:segundo".',
        'fimExpedienteFuncionario.required' => 'O campo de fim de expediente é obrigatório.',
        'fimExpedienteFuncionario.date_format' => 'O campo de fim de expediente deve estar no formato "hora:minuto:segundo".',
        'fimExpedienteFuncionario.after' => 'O campo de fim de expediente deve ser uma hora após o início do expediente.',
        'salarioFuncionario.required' => 'O campo de salário é obrigatório.',
        'salarioFuncionario.numeric' => 'O campo de salário deve ser numérico.',
        'salarioFuncionario.min' => 'O campo de salário deve ser no mínimo 0.',
        'emailFuncionario.required' => 'O campo de email é obrigatório.',
        'emailFuncionario.email' => 'O campo de email deve ser um email válido.',
        'emailFuncionario.max' => 'O campo de email não pode ter mais de 255 caracteres.',
        'emailFuncionario.unique' => 'Este email já está em uso.',
        'senhaFuncionario.required' => 'O campo de senha é obrigatório.',
        'senhaFuncionario.string' => 'O campo de senha deve ser uma string.',
        'senhaFuncionario.min' => 'O campo de senha deve ter no mínimo 6 caracteres.',
        'dddFuncionario.required' => 'O campo de DDD é obrigatório.',
        'dddFuncionario.digits' => 'O campo de DDD deve ter 2 dígitos.',
        'numeroFuncionario.required' => 'O campo de número é obrigatório.',
        'numeroFuncionario.digits' => 'O campo de número deve ter 9 dígitos.',
        'dataNascFuncionario.required' => 'O campo de data de nascimento é obrigatório.',
        'dataNascFuncionario.date' => 'O campo de data de nascimento deve ser uma data válida.',
        'descricaoFuncionario.required' => 'O campo de descrição é obrigatório.',
        'descricaoFuncionario.max' => 'O campo de descrição não pode ter mais de 255 caracteres.',
    ]);



    $numeroFormatado = $request->dddFuncionario . $request->numeroFuncionario;

    $imagem_url = $gerente->fotoFuncionario;

    if ($request->hasFile('fotoFuncionario') && $request->file('fotoFuncionario')->isValid()) {
        // Remover a imagem antiga, se existir
        if ($gerente->fotoFuncionario) {
            Storage::disk('public')->delete($gerente->fotoFuncionario);
        }

        // Salvar a nova imagem
        $imagem = $request->file('fotoFuncionario');
        $imagem_url = $imagem->store('imagem', 'public');
    } else {
        // Mantém a imagem antiga
        $imagem_url = $gerente->fotoFuncionario;
    }

    $numeroFuncionario = preg_replace('/[^0-9]/', '', $numeroFormatado);

    $gerente->update([
        'fotoFuncionario' => $imagem_url,
        'nomeFuncionario' => $request->nomeFuncionario,
        'sobrenomeFuncionario' => $request->sobrenomeFuncionario,
        'numeroFuncionario' => $numeroFuncionario,
        'emailFuncionario' => $request->emailFuncionario,
        'especialidadeFuncionario' => $request->especialidadeFuncionario,
        'descricaoFuncionario' => $request->descricaoFuncionario,
        'dataNascFuncionario' => $request->dataNascFuncionario,
        'inicioExpedienteFuncionario' => $request->inicioExpedienteFuncionario,
        'fimExpedienteFuncionario' => $request->fimExpedienteFuncionario,
        'cargoFuncionario' => $request->cargoFuncionario,
        'descricaoFuncionario' => $request->descricaoFuncionario,
        'salarioFuncionario' => $salarioFuncionario,
        'statusFuncionario' => $request->statusFuncionario
    ]);

    DB::table('usuarios')
        ->where('tipo_usuario_id', $id)
        ->where('tipo_usuario_type', 'funcionario')
        ->update([
            'nome' => $request->nomeFuncionario,
            'email' => $request->emailFuncionario,
            'senha' => $request->senhaFuncionario,
        ]);

    if ($request->emailFuncionario != $gerente->emailFuncionario) {
        return redirect()->route('login');
    }

    return redirect()->route('gerente.perfil');
}



    public function updateFuncionario(Request $request, $id)
    {

        $gerente = Funcionario::find($id);

        // Verifica se o funcionário existe
        if ($gerente === null) {
            return response()->json(['error' => 'Impossível realizar a operação. O barbeiro não existe'], 404);
        }

        $usuario = DB::select('SELECT * FROM usuarios WHERE tipo_usuario_id = ?', [$id]);

        // Verifica se o usuário existe
        if ($usuario === null) {
            return response()->json(['error' => 'Impossível realizar a operação. O usuário não existe'], 404);
        }


        $request->merge([
            'telefoneFuncionario' => str_replace('-', '', $request->telefoneFuncionario),
            'dddFuncionario' => str_replace(['(', ')'], '', $request->dddFuncionario),
        ]);


    $salarioFuncionario = str_replace(['.', ','], [ '', ''], $request->salarioFuncionario);


    // dd($gerente);


        $request->validate([
            'nomeFuncionario' => 'required|string|max:255',
            'sobrenomeFuncionario' => 'required|string|max:255',
            'especialidadeFuncionario' => 'required|string|max:255',
            'inicioExpedienteFuncionario' => 'required|date_format:H:i:s',
            'fimExpedienteFuncionario' => 'required|date_format:H:i:s|after:inicioExpedienteFuncionario',
            'salarioFuncionario' => 'required|numeric',
            'emailFuncionario' => 'required|email|max:255|unique:usuarios,email,' . $id,
            'senhaFuncionario' => 'required|string|min:6',
            'dddFuncionario' => 'required|digits:2',
            'telefoneFuncionario' => 'required|digits:9',
            'dataNascFuncionario' => 'required|date',
            'descricaoFuncionario' => 'required|max:255',
            // 'cargoFuncionario' => 'required|string|in:barbeiro,gerente',
            // 'statusFuncionario' => 'required|string|in:ATIVO,DESATIVO',
        ], [

            'nomeFuncionario.required' => 'O campo Nome é obrigatório.',
            'nomeFuncionario.string' => 'O campo Nome deve ser uma string.',
            'nomeFuncionario.max' => 'O campo Nome não pode ter mais de 255 caracteres.',

            'sobrenomeFuncionario.required' => 'O campo Sobrenome é obrigatório.',
            'sobrenomeFuncionario.string' => 'O campo Sobrenome deve ser uma string.',
            'sobrenomeFuncionario.max' => 'O campo Sobrenome não pode ter mais de 255 caracteres.',

            'especialidadeFuncionario.required' => 'O campo de especialidade é obrigatório.',
            'especialidadeFuncionario.string' => 'O campo de especialidade deve ser uma string.',
            'especialidadeFuncionario.max' => 'O campo de especialidade não pode ter mais de 255 caracteres.',

            'inicioExpedienteFuncionario.required' => 'O campo de início de expediente é obrigatório.',
            'inicioExpedienteFuncionario.date_format' => 'O campo de início de expediente deve estar no formato "hora:minuto:segundo".',

            'fimExpedienteFuncionario.required' => 'O campo de fim de expediente é obrigatório.',
            'fimExpedienteFuncionario.date_format' => 'O campo de fim de expediente deve estar no formato "hora:minuto:segundo".',
            'fimExpedienteFuncionario.after' => 'O campo de fim de expediente deve ser uma hora após o início do expediente.',

            'salarioFuncionario.required' => 'O campo de salário é obrigatório.',
            'salarioFuncionario.numeric' => 'O campo de salário deve ser numérico.',

            'emailFuncionario.required' => 'O campo de email é obrigatório.',
            'emailFuncionario.email' => 'O campo de email deve ser um email válido.',
            'emailFuncionario.max' => 'O campo de email não pode ter mais de 255 caracteres.',
            'emailFuncionario.unique' => 'Este email já está em uso.',

            'senhaFuncionario.required' => 'O campo de senha é obrigatório.',
            'senhaFuncionario.string' => 'O campo de senha deve ser uma string.',
            'senhaFuncionario.min' => 'O campo de senha deve ter no mínimo 6 caracteres.',

            'dddFuncionario.required' => 'O campo de DDD é obrigatório.',
            'dddFuncionario.digits' => 'O campo de DDD deve ter 2 dígitos.',

            'telefoneFuncionario.required' => 'O campo de telefone é obrigatório.',
            'telefoneFuncionario.digits' => 'O campo de telefone deve ter 9 dígitos.',

            'dataNascFuncionario.required' => 'O campo de data de nascimento é obrigatório.',
            'dataNascFuncionario.date' => 'O campo de data de nascimento deve ser uma data válida.',

            'descricaoFuncionario.required' => 'O campo de descrição é obrigatório.',
            'descricaoFuncionario.max' => 'O campo de descrição não pode ter mais de 255 caracteres.',

        ]);





        $numeroFormatado = $request->dddFuncionario . $request->telefoneFuncionario;

        // $testeDDD = $request->dddFuncionario;
        // $testeNumero = $request->numeroFuncionario;



        // dd($request->salarioFuncionario );


        if ($request->hasFile('fotoFuncionario') && $request->file('fotoFuncionario')->isValid()) {
            // Remover a imagem antiga, se existir
            if ($gerente->fotoFuncionario) {
                Storage::disk('public')->delete($gerente->fotoFuncionario);
            }

            // Salvar a nova imagem
            $imagem = $request->file('fotoFuncionario');
            $imagem_url = $imagem->store('imagem', 'public');
        } else {
            // Mantém a imagem antiga
            $imagem_url = $gerente->fotoFuncionario;
        }


        $numeroFuncionario = preg_replace('/[^0-9]/', '', $numeroFormatado);


        $gerente->update([
            'fotoFuncionario' => $imagem_url,
            'nomeFuncionario' => $request->nomeFuncionario,
            'sobrenomeFuncionario' => $request->sobrenomeFuncionario,
            'numeroFuncionario' => $numeroFuncionario,
            'emailFuncionario' => $request->emailFuncionario,
            'especialidadeFuncionario' => $request->especialidadeFuncionario,
            'descricaoFuncionario' => $request->descricaoFuncionario,
            'dataNascFuncionario' => $request->dataNascFuncionario,
            'inicioExpedienteFuncionario' => $request->inicioExpedienteFuncionario,
            'fimExpedienteFuncionario' => $request->fimExpedienteFuncionario,
            'cargoFuncionario' => $request->cargoFuncionario,
            'descricaoFuncionario' => $request->descricaoFuncionario,
            'salarioFuncionario' => $salarioFuncionario,
            'statusFuncionario' => $request->statusFuncionario
        ]);


        DB::table('usuarios')
            ->where('tipo_usuario_id', $id)
            ->where('tipo_usuario_type', 'funcionario')
            ->update([
                'nome' => $request->nomeFuncionario,
                'email' => $request->emailFuncionario,
                'senha' => $request->senhaFuncionario,

            ]);



        return redirect()->route('list.func');
    }

    // CLIENTE


    public function cliente()
    {
        $anoAtual = Carbon::now()->year;
        $mesAtual = Carbon::now()->month;


        $clientes = Cliente::all();

        if (!$clientes) {
            abort(404, 'Cliente não encontrado');
        }


        $clientesMensais = Agendamento::whereYear('agendamento.dataAgendamento', $anoAtual)
            ->whereMonth('agendamento.dataAgendamento', $mesAtual)
            ->where('statusServico', 'CONFIRMADO')
            ->distinct('cliente_id')
            ->count('cliente_id');

        $servicoFav = Agendamento::select('servico_id', DB::raw('count(servico_id) as total'))
            ->whereYear('dataAgendamento', $anoAtual)
            ->whereMonth('dataAgendamento', $mesAtual)
            ->where('statusServico', 'CONFIRMADO')
            ->groupBy('servico_id')
            ->orderBy('total', 'desc')
            ->first();

        // dd($servicoFav);

        if ($servicoFav) {
            $servico = Servico::find($servicoFav->servico_id);
            //     if ($servico) {
            $servicoFav = $servico->nomeServico;
        } else {
            $servicoFav = null;
        }

        $clienteDoMes = Agendamento::select('cliente_id', DB::raw('count(cliente_id) as total'))
            ->whereYear('dataAgendamento', $anoAtual)
            ->whereMonth('dataAgendamento', $mesAtual)
            ->where('statusServico', 'CONFIRMADO')
            ->groupBy('cliente_id')
            ->orderBy('total', 'desc')
            ->first();

        if ($clienteDoMes == null) {

            $totalCliente = '0';
        } else {;
            $totalCliente = $clienteDoMes->total;
        }

        if ($clienteDoMes) {
            $clienteMes = Cliente::find($clienteDoMes->cliente_id);
            $clienteDoMes = $clienteMes->nomeCliente;
        } else {
            $clienteDoMes == null;
        }



        $faturamento = Agendamento::join('servicos', 'agendamento.servico_id', '=', 'servicos.id')
            ->whereMonth('agendamento.dataAgendamento', $mesAtual)
            ->whereYear('agendamento.dataAgendamento', $anoAtual)
            ->where('agendamento.statusServico', 'CONFIRMADO')
            ->sum('servicos.valorServico');



        if ($faturamento == null) {
            $faturamento = '0';
        }
        //   dd($faturamento);

        // dd($servicoFav);



        return view('dashboard.gerente.clientes', compact('clientesMensais', 'clientes', 'servicoFav', 'clienteDoMes', 'totalCliente', 'faturamento'));
    }



    public function vendas()
    {

        $anoAtual = Carbon::now()->year;
        $mesAtual = Carbon::now()->month;

        $qtdVendas = Vendas::whereMonth('created_at', $mesAtual)
            ->whereYear('created_at', $anoAtual)
            ->count('id');

        $vendas = Vendas::whereMonth('vendas.created_at', $mesAtual)
            ->orderBy('vendas.created_at', 'desc')
            ->take(10)
            ->get();

        $produtos = Produtos::where('statusProduto', 'ativo')->where('estoqueProduto', '>', 0)->get();



        $funcionarioDoMes = Vendas::select('idFuncionario', DB::raw('count(idFuncionario) as total'))
            ->whereYear('created_at', $anoAtual)
            ->whereMonth('created_at', $mesAtual)
            ->groupBy('idFuncionario')
            ->orderBy('total', 'desc')
            ->first();

        if ($funcionarioDoMes) {
            $funcionarioDoMes = Funcionario::find($funcionarioDoMes->idFuncionario);
            $funcionarioMes = $funcionarioDoMes->nomeFuncionario;
        } else {
            $funcionarioDoMes == null;
            $funcionarioMes = $funcionarioDoMes;
        }


        $faturamento = Vendas::whereMonth('created_at', $mesAtual)
            ->whereYear('created_at', $anoAtual)
            ->sum('valorVenda');

        if ($funcionarioMes) {
            $faturamentoF = Vendas::whereMonth('created_at', $mesAtual)
                ->whereYear('created_at', $anoAtual)
                ->where('idFuncionario', $funcionarioDoMes->id)
                ->sum('valorVenda');
        } else {
            $faturamentoF = '0';
        }

        $comissao = $faturamentoF * 0.30;

        $lucro = $faturamento - $comissao;

        return view('dashboard.gerente.vendas', compact('qtdVendas', 'funcionarioMes', 'faturamento', 'comissao', 'lucro', 'vendas',  'produtos'));
    }


    public function vendasCreate(Request $request)
    {

        $id = session('id'); // Suponho que você esteja recuperando um ID de usuário válido

        // Valida os dados da requisição usando as regras e mensagens de erro do modelo Vendas
        // $validator = Validator::make($request->all(), (new Vendas)->rules(), (new Vendas)->feedback());

        // Trata erros de validação
        // if ($validator->fails()) {
        //     return back()->withErrors($validator); // Redireciona de volta com os erros
        // }


        // dd($id);
        // Cria uma nova instância de Vendas
        //  $testeNome = $request->nomeVenda;



        $request->validate([
            // 'fotoServico' => 'required|max:255',
            'nomeVenda' => 'required',
            'valorVenda' => 'required|numeric|min:1',
            'qntVenda' => 'required|numeric|min:1',
            'descricaoVenda' => 'required|string|max:200',
        ], [
            // 'fotoServico.required' => 'O campo de foto é obrigatório.',

            'nomeVenda.required' => 'O campo nome é obrigatório.',

            'valorVenda.required' => 'O campo de valor deve ser preenchido.',
            'valorVenda.numeric' => 'O campo de valor deve ser numérico.',
            'valorVenda.min' => 'O campo de valor deve ter uma quantidade maior.',

            'qntVenda.required' => 'O campo de valor deve ser preenchido.',
            'qntVenda.numeric' => 'O campo de quantidade deve ser numérico.',

            'descricaoVenda.required' => 'O campo descrição deve ser preenchido.',
            'descricaoVenda.max' => 'O campo descrição não pode ter mais de 200 caracteres.',

        ]);







        $valorVenda = $request->valorVenda * $request->qntVenda;

        $venda = new vendas;

        // Define as propriedades de 'venda' com os dados da requisição
        $venda->nomeVenda = $request->nomeVenda;
        $venda->valorVenda = $valorVenda;
        $venda->qntVenda = $request->qntVenda;
        $venda->descricaoVenda = $request->descricaoVenda;
        $venda->idFuncionario = $id;
        // Cria o registro de venda no banco de dados
        // dd($venda->valorVenda);
        $venda->save();

        $produto = Produtos::where('nomeProduto', $request->nomeVenda)->first();

        // dd($produto);

        $estoque = $produto->estoqueProduto - $request->qntVenda;

        if ($estoque > 0) {

            $produto->update([
                'estoqueProduto' => $estoque,
            ]);
        } else {

            $produto->update([
                'estoqueProduto' => $estoque,
                'statusProduto' => 'inativo',
            ]);
        }



        // 2. Redirecionamento com mensagem flash (adequado para aplicações web)
        return Redirect::back()->with('success', 'Venda registrada!');
    }


    public function adcProduto()
    {

        $produtos = Produtos::get();

        return view('dashboard.gerente.adcProduto', compact('produtos'));
    }


    public function storeProduto(Request $request)
    {


        $request->validate([
            'fotoProduto' => 'required|max:255',
            'nomeProduto' => 'required|string|max:150',
            'descricaoProduto' => 'required|string|max:255',
            'valorProduto' => 'required|numeric|min:1',
            'estoqueProduto' => 'required|numeric|min:1',
            'statusProduto' => 'required',
        ], [
            // 'fotoServico.required' => 'O campo de foto é obrigatório.',

            'fotoProduto.required' => 'O campo de foto é obrigatório.',

            'nomeProduto.required' => 'O campo de nome é obrigatório.',
            'nomeProduto.string' => 'O campo de nome deve ser uma string.',
            'nomeProduto.max' => 'O campo de nome não pode ter mais de 150 caracteres.',

            'descricaoProduto.required' => 'O campo de descrição deve ser preenchido.',
            'descricaoProduto.max' => 'O campo de descrição não pode ter mais de 255 caracteres.',

            'valorProduto.required' => 'O campo de valor deve ser preenchido.',
            'valorProduto.numeric' => 'O campo de valor deve ser numérico.',
            'valorProduto.min' => 'O campo de valor deve ter uma quantidade maior.',

            'estoqueProduto.required' => 'O campo de quantidade deve ser preenchido.',
            'estoqueProduto.numeric' => 'O campo de quantidade deve ser numérico',
            'estoqueProduto.min' => 'O campo de quantidade deve ser maior do que o preenchido',

            'statusProduto.required' => 'O campo de valor deve ser preenchido.',

        ]);

        $imagem = $request->file('fotoProduto');

        if ($imagem == null) {
            $imagem_url = 'SEM IMAGEM';
        } else {
            $imagem_url = $imagem->store('imagem', 'public');
        }

        $produto = new Produtos();
        $produto->fotoProduto = $imagem_url;
        $produto->nomeProduto = $request->input('nomeProduto');
        $produto->valorProduto = $request->input('valorProduto');
        $produto->estoqueProduto = $request->input('estoqueProduto');
        $produto->descricaoProduto = $request->input('descricaoProduto');
        $produto->statusProduto = $request->input('statusProduto');
        $produto->save();

        return redirect()->route('gerente.vendas');
    }

    public function produtoEsgotado()
    {
        $produtos = Produtos::where('statusProduto', 'inativo')->where('estoqueProduto', '<=', 0)->get();
        return view('dashboard.gerente.esgotado', compact('produtos'));
    }


    public function editProduto($id)
    {

        $produto = Produtos::findOrFail($id);

        return view('dashboard.gerente.updateProduto', compact('produto'));
    }


    public function updateProduto(Request $request, $id)
    {


        // dd($request->file('fotoProduto'));

        $produto = Produtos::find($id);
        // dd($produto);

        // Verifica se o funcionário existe


        // dd($request->file('fotoProduto'));


        $request->validate([
            // 'fotoProduto' => 'required|max:255',
            'nomeProduto' => 'required|string|max:150',
            'descricaoProduto' => 'required|string|max:255',
            'valorProduto' => 'required|numeric|min:1',
            'estoqueProduto' => 'required|numeric|min:1',
            'statusProduto' => 'required',
        ], [
            // 'fotoServico.required' => 'O campo de foto é obrigatório.',

            // 'fotoProduto.required' => 'O campo de foto é obrigatório.',

            'nomeProduto.required' => 'O campo de nome é obrigatório.',
            'nomeProduto.string' => 'O campo de nome deve ser uma string.',
            'nomeProduto.max' => 'O campo de nome não pode ter mais de 150 caracteres.',

            'descricaoProduto.required' => 'O campo de descrição deve ser preenchido.',
            'descricaoProduto.max' => 'O campo de descrição não pode ter mais de 255 caracteres.',

            'valorProduto.required' => 'O campo de valor deve ser preenchido.',
            'valorProduto.numeric' => 'O campo de valor deve ser numérico.',
            'valorProduto.min' => 'O campo de valor deve ter uma quantidade maior.',

            'estoqueProduto.required' => 'O campo de quantidade deve ser preenchido.',
            'estoqueProduto.numeric' => 'O campo de quantidade deve ser numérico',
            'estoqueProduto.min' => 'O campo de quantidade deve ser maior do que o preenchido',

            'statusProduto.required' => 'O campo de valor deve ser preenchido.',

        ]);


        $imagem_url = $produto->fotoServico; // Manter a URL da imagem antiga se não houver nova imagem



        if ($request->file('fotoProduto') == null) {
            $imagem_url = "SEM IMAGEM";
        } else {
            if ($produto === null) {
                return response()->json(['error' => 'Impossível realizar a operação. O produto não existe'], 404);
            }

            // dd($request->file('fotoProduto'));

            if ($request->hasFile('fotoProduto') && $request->file('fotoProduto')->isValid()) {
                // Remover a imagem antiga, se existir
                if ($produto->fotoProduto) {
                    Storage::disk('public')->delete($produto->fotoProduto);
                }

                // Salvar a nova imagem
                $imagem = $request->file('fotoProduto');
                $imagem_url = $imagem->store('imagem', 'public');
            }


            // dd($request->input('fotoFuncionario'));
            // Salvar a nova imagem
            // dd($request->file('fotoProduto'));

            $imagem = $request->file('fotoProduto');
            $imagem_url = $imagem->store('imagem', 'public');
        }
        // dd($produto);
        $produto->update([
            'fotoProduto' => $imagem_url,
            'nomeProduto' => $request->nomeProduto,
            'valorProduto' => $request->valorProduto,
            'estoqueProduto' => $request->estoqueProduto,
            'descricaoProduto' => $request->descricaoProduto,
            'statusProduto' => $request->statusProduto
        ]);


        return redirect()->route('gerente.vendas');
    }


    public function listAgendamentos()
    {
        $anoAtual = Carbon::now()->year;
        $mesAtual = Carbon::now()->month;

        $idFuncionario = session('id');
        $funcionario = Funcionario::find($idFuncionario);

        $agendamento = Agendamento::whereYear('dataAgendamento', $anoAtual)
            ->whereMonth('dataAgendamento', $mesAtual)
            ->orderBy('dataAgendamento', 'asc')
            ->orderBy('horarioInicial', 'asc')
            ->get();

        $horarios = Horario::orderBy('horarios', 'asc')->get();


        if (!$agendamento) {
            abort(404, 'Agendamento não encontrado');
        }



        return view('dashboard.gerente.agendamentos', compact('funcionario', 'agendamento', 'horarios'));
    }

    public function horarioDeletar($id)
    {
        $horario = Horario::find($id);
        $horario->delete();

        return view('dashboard.gerente.agendamentos');
    }

    public function horarioEditar($id)
    {
        $horario = Horario::find($id);

        return view('dashboard.gerente.editHorario', compact('horario'));
    }

    public function adcHorario()
    {
        $horario = Horario::all();

        return view('dashboard.gerente.adcHorario', compact('horario'));
    }

    public function storeHorario(Request $request)
    {

        $request->validate([
            'horarios' => 'required|date_format:H:i'
        ], [
            'horarios.required' => 'O campo de horário precisa ser preenchido!',
            'horarios.date_format' => 'O horário precisa estar no formato "hora:minuto"'
        ]);


        $horario = new Horario();
        $horario->horarios = $request->input('horarios');
        $horario->save();

        return redirect()->route('gerente.agendamento', compact('horario'));
    }

    public function horarioUpdate(Request $request, $id)
    {
        $horario = Horario::find($id);

        $request->validate([
            'horarios' => 'required|date_format:H:i'
        ], [
            'horarios.required' => 'O campo de horário precisa ser preenchido!',
            'horarios.date_format' => 'O horário precisa estar no formato "hora:minuto"'
        ]);

        $horario->update([
            'horarios' => $request->horarios,
        ]);

        return redirect()->route('gerente.agendamento');
    }


    public function editFuncionario($id)
    {

        $funcionario = Funcionario::findOrFail($id);

        $senha = Usuario::where('tipo_usuario_id', $id)->first();






        return view('dashboard.gerente.editFunc', compact('funcionario', 'senha'));
    }


    public function servicos()
    {

        $servico = Servico::where('statusServico', 'ativo')->get();


        return view('dashboard.gerente.servicos', compact('servico'));
    }

    public function adicionarServico()
    {

        return view('dashboard.gerente.adicionar-servico');
    }

    public function servicosInativos()
    {
        $servico = Servico::where('statusServico', 'inativo')->get();

        return view('dashboard.gerente.servInativos', compact('servico'));
    }


    public function editServico($id)
    {

        $servico = Servico::find($id);
        return view('dashboard.gerente.editServico', compact('servico'));
    }

    public function updateServico(Request $request, $id)
    {
        $servico = Servico::find($id);

        if ($servico === null) {
            return response()->json(['error' => 'Impossível realizar a operação. O serviço não existe'], 404);
        }





        $request->validate([
            // 'fotoServico' => 'required|max:255',
            'nomeServico' => 'required|string|max:150',
            'descricaoServico' => 'required|string|max:255',
            'valorServico' => 'required|numeric|min:1',
            'duracaoServico' => 'required|date_format:H:i:s',
            'statusServico' => 'required',
        ], [
            // 'fotoServico.required' => 'O campo de foto é obrigatório.',

            'nomeServico.required' => 'O campo nome é obrigatório.',
            'nomeServico.string' => 'O campo nome deve ser uma string.',
            'nomeServico.max' => 'O campo nome não pode ter mais de 150 caracteres.',

            'descricaoServico.required' => 'O campo descrição deve ser preenchido.',
            'descricaoServico.max' => 'O campo descrição não pode ter mais de 255 caracteres.',

            'valorServico.required' => 'O campo de valor deve ser preenchido.',
            'valorServico.numeric' => 'O campo de valor deve ser numérico.',
            'valorServico.min' => 'O campo de valor deve ter uma quantidade maior.',

            'duracaoServico.required' => 'O campo de valor deve ser preenchido.',
            'duracaoServico.date_format' => 'O campo de duracao precisa estar no formato "hora:minuto:segundo"',

            'statusServico.required' => 'O campo de valor deve ser preenchido.',

        ]);





 // Manter a URL da imagem antiga se não houver nova imagem

        if ($request->hasFile('fotoServico') && $request->file('fotoServico')->isValid()) {
            // Remover a imagem antiga, se existir
            if ($servico->fotoServico) {
                Storage::disk('public')->delete($servico->fotoServico);
            }

            // Salvar a nova imagem
            $imagem = $request->file('fotoServico');
            $imagem_url = $imagem->store('imagem', 'public');
        }else{
            $imagem_url = $servico->fotoServico;
        }

        // Atualizar o serviço com os novos dados, incluindo a URL da imagem
        $servico->update([
            'fotoServico' => $imagem_url,
            'nomeServico' => $request->input('nomeServico'),
            'valorServico' => $request->input('valorServico'),
            'descricaoServico' => $request->input('descricaoServico'),
            'duracaoServico' => $request->input('duracaoServico'),
            'statusServico' => $request->input('statusServico'),
        ]);

        return redirect()->route('gerente.servicos')->with('success', 'Serviço atualizado com sucesso.');
    }


    public function updateStatusServicoDesativar(Request $request, $id)
    {

        $servico = Servico::find($id);

        if ($servico === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O servico não existe!'], 404);
        }

        // dd($request->statusServico);

        $servico->update([
            'statusServico' => $request->statusServico
        ]);

        return redirect()->route('gerente.servicos')->with('success', 'Serviço atualizado com sucesso.');
    }
    public function updateStatusServicoAtivar(Request $request, $id)
    {
        $servico = Servico::find($id);

        if ($servico === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O servico não existe!'], 404);
        }
        // dd($request->statusServico);


        $servico->update([
            'statusServico' => $request->statusServico
        ]);

        return redirect()->route('gerente.servInativos')->with('success', 'Serviço atualizado com sucesso.');;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeServico(Request $request)
    {


        $request->validate([
            'fotoServico' => 'required|max:255',
            'nomeServico' => 'required|string|max:150',
            'descricaoServico' => 'required|string|max:255',
            'valorServico' => 'required|numeric|min:1',
            'duracaoServico' => 'required|date_format:H:i:s',
            'statusServico' => 'required',
        ], [
            'fotoServico.required' => 'O campo de foto é obrigatório.',

            'nomeServico.required' => 'O campo nome é obrigatório.',
            'nomeServico.string' => 'O campo nome deve ser uma string.',
            'nomeServico.max' => 'O campo nome não pode ter mais de 150 caracteres.',

            'descricaoServico.required' => 'O campo descrição deve ser preenchido.',
            'descricaoServico.max' => 'O campo descrição não pode ter mais de 255 caracteres.',

            'valorServico.required' => 'O campo de valor deve ser preenchido.',
            'valorServico.numeric' => 'O campo de valor deve ser numérico.',
            'valorServico.min' => 'O campo de valor deve ter uma quantidade maior.',

            'duracaoServico.required' => 'O campo de valor deve ser preenchido.',
            'duracaoServico.date_format' => 'O campo de duracao precisa estar no formato "hora:minuto:segundo"',

            'statusServico.required' => 'O campo de valor deve ser preenchido.',

        ]);


        $imagem = $request->file('fotoServico');

        if ($imagem == null) {
            $imagem_url = 'SEM IMAGEM';
        } else {
            $imagem_url = $imagem->store('imagem', 'public');
        }

        $servico = new Servico();
        $servico->fotoServico = $imagem_url;
        $servico->nomeServico = $request->input('nomeServico');
        $servico->descricaoServico = $request->input('descricaoServico');
        $servico->valorServico = $request->input('valorServico');
        $servico->duracaoServico = $request->input('duracaoServico');
        $servico->statusServico = $request->input('statusServico');
        $servico->save();

        return redirect()->route('gerente.servicos');
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
        // return 'Presente - Store';
        // dd($request->all());
        // $aluno = Aluno::create($request->all());

        // return $aluno;


        // Para não pegar imagem será apenas isso

        //  $request->validate($this->funcionario->Regras(), $this->funcionario->Feedback());

        //  $imagem = $request->input('fotoFuncionario');



        $request->validate([
            'fotoFuncionario' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nomeFuncionario' => 'required|string|max:255',
            'sobrenomeFuncionario' => 'required|string|max:255',
            'especialidadeFuncionario' => 'required|string|max:255',
            'inicioExpedienteFuncionario' => 'required|date_format:H:i',
            'fimExpedienteFuncionario' => 'required|date_format:H:i|after:inicioExpedienteFuncionario',
            'salarioFuncionario' => 'required|numeric|min:0',
            'emailFuncionario' => 'required|email|max:255|unique:usuarios,email',
            'senhaFuncionario' => 'required|string|min:6|confirmed',
            'dddFuncionario' => 'required|digits:2',
            'telefoneFuncionario' => 'required|digits:9',
            'dataNascFuncionario' => 'required|date',
            'descricaoFuncionario' => 'required|max:255',
            'cargoFuncionario' => 'required|string|in:barbeiro,gerente',
            'statusFuncionario' => 'required|string|in:ATIVO,DESATIVO',
        ], [
            // Mensagens de erro personalizadas
            'fotoFuncionario.image' => 'O arquivo deve ser uma imagem.',
            'fotoFuncionario.mimes' => 'A imagem deve ser dos tipos: jpeg, png, jpg, gif.',
            'fotoFuncionario.max' => 'A imagem não pode ser maior que 2MB.',

            'nomeFuncionario.required' => 'O campo Nome é obrigatório.',
            'nomeFuncionario.string' => 'O campo Nome deve ser uma string.',
            'nomeFuncionario.max' => 'O campo Nome não pode ter mais de 255 caracteres.',

            'sobrenomeFuncionario.required' => 'O campo Sobrenome é obrigatório.',
            'sobrenomeFuncionario.string' => 'O campo Sobrenome deve ser uma string.',
            'sobrenomeFuncionario.max' => 'O campo Sobrenome não pode ter mais de 255 caracteres.',

            'especialidadeFuncionario.required' => 'O campo de especialidade é obrigatório.',
            'especialidadeFuncionario.string' => 'O campo de especialidade deve ser uma string.',
            'especialidadeFuncionario.max' => 'O campo de especialidade não pode ter mais de 255 caracteres.',

            'inicioExpedienteFuncionario.required' => 'O campo de início de expediente é obrigatório.',
            'inicioExpedienteFuncionario.date_format' => 'O campo de início de expediente deve estar no formato "hora:minuto".',

            'fimExpedienteFuncionario.required' => 'O campo de fim de expediente é obrigatório.',
            'fimExpedienteFuncionario.date_format' => 'O campo de fim de expediente deve estar no formato "hora:minuto".',
            'fimExpedienteFuncionario.after' => 'O campo de fim de expediente deve ser uma hora após o início do expediente.',

            'salarioFuncionario.required' => 'O campo de salário é obrigatório.',
            'salarioFuncionario.numeric' => 'O campo de salário deve ser numérico.',
            'salarioFuncionario.min' => 'O campo de salário deve ser no mínimo 0.',

            'emailFuncionario.required' => 'O campo de email é obrigatório.',
            'emailFuncionario.email' => 'O campo de email deve ser um email válido.',
            'emailFuncionario.max' => 'O campo de email não pode ter mais de 255 caracteres.',
            'emailFuncionario.unique' => 'Este email já está em uso.',

            'senhaFuncionario.required' => 'O campo de senha é obrigatório.',
            'senhaFuncionario.string' => 'O campo de senha deve ser uma string.',
            'senhaFuncionario.min' => 'O campo de senha deve ter no mínimo 6 caracteres.',
            'senhaFuncionario.confirmed' => 'A confirmação da senha não coincide.',

            'dddFuncionario.required' => 'O campo de DDD é obrigatório.',
            'dddFuncionario.digits' => 'O campo de DDD deve ter 2 dígitos.',

            'telefoneFuncionario.required' => 'O campo de telefone é obrigatório.',
            'telefoneFuncionario.digits' => 'O campo de telefone deve ter 9 dígitos.',

            'dataNascFuncionario.required' => 'O campo de data de nascimento é obrigatório.',
            'dataNascFuncionario.date' => 'O campo de data de nascimento deve ser uma data válida.',

            'descricaoFuncionario.required' => 'O campo de descrição é obrigatório.',
            'descricaoFuncionario.max' => 'O campo de descrição não pode ter mais de 255 caracteres.',

            'cargoFuncionario.required' => 'O campo de cargo é obrigatório.',
            'cargoFuncionario.in' => 'O campo de cargo deve ser "barbeiro" ou "gerente".',

            'statusFuncionario.required' => 'O campo de status é obrigatório.',
            'statusFuncionario.in' => 'O campo de status deve ser "ATIVO" ou "DESATIVO".',
        ]);





        $dddFuncionario = $request->input('dddFuncionario');
        $telefoneFuncionario = $request->input('telefoneFuncionario');
        $numeroFuncionario = "$dddFuncionario$telefoneFuncionario";

        //  dd($request->file('fotoFuncionario'));

        $imagem = $request->file('fotoFuncionario');
        if ($imagem == null) {
            $imagem_url = 'SEM IMAGEM';
        } else {
            $imagem_url = $imagem->store('imagem', 'public');
        }
        //  dd($imagem_url);

        //  $imagem_url = $imagem->store('imagem','public');
        $funcionario = $this->funcionario;
        $funcionario->fotoFuncionario = $imagem_url;
        $funcionario->nomeFuncionario = $request->input('nomeFuncionario');
        $funcionario->sobrenomeFuncionario = $request->input('sobrenomeFuncionario');
        $funcionario->numeroFuncionario = $numeroFuncionario;
        $funcionario->emailFuncionario = $request->input('emailFuncionario');
        $funcionario->especialidadeFuncionario = $request->input('especialidadeFuncionario');
        $funcionario->inicioExpedienteFuncionario = $request->input('inicioExpedienteFuncionario');
        $funcionario->fimExpedienteFuncionario = $request->input('fimExpedienteFuncionario');
        $funcionario->salarioFuncionario = $request->input('salarioFuncionario');
        $funcionario->cargoFuncionario = $request->input('cargoFuncionario');
        $funcionario->statusFuncionario = $request->input('statusFuncionario');
        $funcionario->dataNascFuncionario = $request->input('dataNascFuncionario');
        $funcionario->descricaoFuncionario = $request->input('descricaoFuncionario');
        $funcionario->qntCortesFuncionario = '0';
        $funcionario->save();

        $usuario = $this->usuario;
        $usuario->nome = $request->input('nomeFuncionario');
        $usuario->senha = $request->input('senhaFuncionario');
        $usuario->email = $request->input('emailFuncionario');
        $usuario->tipo_usuario_id = $funcionario->id;
        $usuario->tipo_usuario_type = 'funcionario';
        $usuario->email_verificado_em = $funcionario->created_at;
        $usuario->token_lembrete = '000';
        $usuario->save();

        //     'nomeFuncionario' => $request->nomeFuncionario,
        //     'sobrenomeFuncionario' => $request->sobrenomeFuncionario,
        //     'numeroFuncionario' => $request->numeroFuncionario,
        //     'emailFuncionario' => $request->emailFuncionario,
        //     'especialidadeFuncionario' => $request->especialidadeFuncionario,
        //     'inicioExpedienteFuncionario' => $request->inicioExpedienteFuncionario,
        //     'fimExpedienteFuncionario' => $request->fimExpedienteFuncionario,
        //     'cargoFuncionario' => $request->cargoFuncionario,
        //     'qntCortesFuncionario' => '0',
        //     'salarioFuncionario' => $request->salarioFuncionario,
        //     'statusFuncionario' => $request->statusFuncionario,
        //     'fotoFuncionario' => $imagem_url
        //  ]);


        //     'nome' => $request->nomeFuncionario,
        //     'email' => $request->emailFuncionario,
        //     'senha' => $request->senhaFuncionario,
        //     'tipo_usuario_id' => $funcionario->id,
        //     'tipo_usuario_type' => 'funcionario',
        //     'email_verificado_em' => $funcionario->created_at,
        //     'token_lembrete' => 'NULO',
        //  ]);

        return redirect()->route('list.func');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        //
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
    public function update(Request $request, Funcionario $funcionario)
    {
        //
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

    public function updateStatusFuncionarioDesativar(Request $request, $id)
    {
        $funcionario = $this->funcionario->find($id);

        if ($funcionario === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O funcionario não existe!'], 404);
        }

        $funcionario->update([
            'statusFuncionario' => $request->statusFuncionario
        ]);
    }
    public function updateStatusFuncionarioAtivar(Request $request, $id)
    {
        $funcionario = $this->funcionario->find($id);

        if ($funcionario === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O funcionario não existe!'], 404);
        }

        $funcionario->update([
            'statusFuncionario' => $request->statusFuncionario
        ]);
    }

    public function updateFotoFuncionario(Request $request, $id)
    {
        $funcionario = $this->funcionario->find($id);

        if ($funcionario === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O funcionario não existe!'], 404);
        }

        if ($request->method() === 'PATCH') {
            //  return ['teste' => 'PATCH'];

            $dadosDinamico = [];

            foreach ($funcionario->Regras() as $input => $regra) {
                if (array_key_exists($input, $request->all())) {
                    $dadosDinamico[$input] = $regra;
                }
            }

            //  dd($dadosDinamico);

            $request->validate($dadosDinamico, $this->funcionario->Feedback());
        } else {
            $request->validate($this->funcionario->Regras(), $this->funcionario->Feedback());
        }

        if ($request->file('fotoCliente')) {
            Storage::disk('public')->delete($funcionario->fotoFuncionario);
        }



        $imagem = $request->file('fotoFuncionario');

        $imagem_url = $imagem->store('imagem', 'public');

        $funcionario->update([
            // 'nomeFuncionario' => $request->nomeFuncionario,
            'fotoFuncionario' => $imagem_url
        ]);


        return response()->json($funcionario, 200);
    }


    // public function listClientes()
    // {
    //     $idFuncionario = session('id');

    //     $funcionario = Funcionario::find($idFuncionario);

    //     $clientes = Cliente::all();


    //     if(!$clientes){
    //         abort(404, 'Cliente não encontrado');
    //     }

    //     return view('dashboard.gerente.clientes', compact('funcionario','clientes'));
    // }


    // Funções de ativar e desativar status:


    public function updateStatusClienteDesativar(Request $request, $id)
    {
        $cliente = $this->cliente->find($id);

        if ($cliente === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O cliente não existe!'], 404);
        }

        $cliente->update([
            'statusCliente' => $request->statusCliente
        ]);
    }
    public function updateStatusClienteAtivar(Request $request, $id)
    {
        $cliente = $this->cliente->find($id);

        if ($cliente === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O cliente não existe!'], 404);
        }

        $cliente->update([
            'statusCliente' => $request->statusCliente
        ]);
    }
}
