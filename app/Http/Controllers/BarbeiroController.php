<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Agendamento;
use App\Models\Funcionario;
use App\Models\Materiais;
use App\Models\Produtos;
use App\Models\Servico;
use App\Models\Trabalhos;
use App\Models\Usuario;
use App\Models\Vendas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BarbeiroController extends Controller
{


    public function index()
    {
        $idBarbeiro = session('id');
        $barbeiro = Funcionario::find($idBarbeiro);
        $mesAtual = date('m');

        //============================================VENDAS==============================================

        $vendas = Vendas::where('idFuncionario', $idBarbeiro)
                        ->whereMonth('created_at', $mesAtual)
                        ->orderBy('created_at', 'desc')
                        ->take(10)
                        ->get();



        if($vendas == null){
            $lucroVendas = '0';
        }else{
            $lucroVendas = Vendas::where('idFuncionario', $idBarbeiro)->whereMonth('created_at', $mesAtual)->sum('valorVenda');
        }

        //============================================CLIENTES==============================================

        $clienteMensais = Funcionario::where('id', $idBarbeiro)
        ->whereMonth('created_at', now()->month)
        ->value('qntCortesFuncionario');

        //============================================SALÁRIO==============================================

        $salario = $barbeiro->salarioFuncionario;
        $salarioFuncionario = number_format($salario, 2, ',', '.');


        //============================================AGENDAMENTO==============================================

        $agendamentos = Agendamento::where('funcionario_id', $idBarbeiro)->with(['cliente', 'servico'])->orderBy('dataAgendamento', 'asc')->get();


        $agendamentosFuturos = $agendamentos->filter(function ($agendamento) {
            $dataHoraAgendamento = Carbon::parse($agendamento->dataAgendamento . ' ' . $agendamento->horarioInicial);
            return $dataHoraAgendamento->gt(now());
        });



        //============================================FATURAMENTO==============================================


        $faturamento = Agendamento::where('funcionario_id', $idBarbeiro)
        ->join('servicos', 'agendamento.servico_id', '=', 'servicos.id')
        ->whereMonth('agendamento.created_at', $mesAtual)
        ->sum('servicos.valorServico');


        if($faturamento == null){
            $faturamento ='0';
        }

        $totalFaturamento = $faturamento + $lucroVendas;

        $lucro = $totalFaturamento - $salario;




        if ($agendamentosFuturos->isEmpty()) {
            $mensagem = 'Não há agendamentos futuros';
            return view('dashboard.barbeiro.index', [
                'salario' => $salarioFuncionario,
                'qntCortes' => $clienteMensais,
                'clientesMensais' => $clienteMensais,
                'vendas' => $vendas,
                'mensagem' => $mensagem,
                'lucro'  => $lucro,

            ]);
        }

        return view('dashboard.barbeiro.index', [
            'salario' => $salarioFuncionario,
            'qntCortes' => $clienteMensais,
            'clientesMensais' => $clienteMensais,
            'vendas' => $vendas,
            'agendamentos' => $agendamentosFuturos,
            'lucro'  => $lucro,
        ]);

    }


    public function perfil()
    {
        $idBarbeiro = session('id');

        $barbeiro = Funcionario::find($idBarbeiro);

        $nascimento = date('d/m/Y', strtotime($barbeiro->dataNascFuncionario));

        // dd($barbeiro->dataNascFuncionario);

        return view('dashboard.barbeiro.perfil', compact('barbeiro', 'nascimento'));
    }



    public function edit($id)
    {

        $barbeiro = Funcionario::find($id);
        $senha = Usuario::find($id);

        if (!$barbeiro) {
            abort(404, 'Barbeiro não encontrado');
        }

        $numeroFormatado = number_format($barbeiro->numeroFuncionario, 0, '', '');

        // Adicione os parênteses e o hífen

        $numeroFormatado = '(' . substr($numeroFormatado, 0, 2) . ') ' . substr($numeroFormatado, 2, 5) . '-' . substr($numeroFormatado, 7);


        return view('/dashboard/barbeiro/edit', compact('barbeiro', 'numeroFormatado', 'senha'));
    }




    public function update(Request $request, $id)
    {

        // Encontra o funcionário pelo ID
        $barbeiro = Funcionario::find($id);

        // Verifica se o funcionário existe
        if ($barbeiro === null) {
            return response()->json(['error' => 'Impossível realizar a operação. O barbeiro não existe'], 404);
        }

        $usuario = DB::select('SELECT * FROM usuarios WHERE tipo_usuario_id = ?', [$id]);

        // Verifica se o usuário existe
        if ($usuario === null) {
            return response()->json(['error' => 'Impossível realizar a operação. O usuário não existe'], 404);
        }
            // Define as regras de validação dinâmicas

        // dd($request->all());

        // $request->validate($barbeiro->RegrasUpdate(), $barbeiro->Feedback());

        $numero = $request->dddFuncionario . $request->numeroFuncionario;



        // dd($request->all());

        // Verifica se um novo arquivo de imagem foi enviado
        if ($request->hasFile('fotoFuncionario') && $request->file('fotoFuncionario')->isValid()) {
            // Exclui a foto antiga
            Storage::disk('public')->delete($barbeiro->fotoFuncionario);
            // Salva a nova imagem
            $imagem = $request->file('fotoFuncionario');
            $imagem_url = $imagem->store('imagem', 'public');
            $barbeiro->fotoFuncionario = $imagem_url;
        }



        $numeroFuncionario = preg_replace('/[^0-9]/', '', $numero);

        // dd($numeroFuncionario);



        $barbeiro->update([
            'nomeFuncionario' => $request->nomeFuncionario,
            'sobrenomeFuncionario' => $request->sobrenomeFuncionario,
            'numeroFuncionario' => $numeroFuncionario,
            'emailFuncionario' => $request->emailFuncionario,
            'especialidadeFuncionario' => $request->especialidadeFuncionario,
            'fotoFuncionario' => $barbeiro->fotoFuncionario,

            'descricaoFuncionario' => $barbeiro->descricaoFuncionario,
            'dataNascFuncionario' => $barbeiro->dataNascFuncionario,
            'inicioExpedienteFuncionario' => $barbeiro->inicioExpedienteFuncionario,
            'fimExpedienteFuncionario' => $barbeiro->fimExpedienteFuncionario,
            'cargoFuncionario' => $barbeiro->cargoFuncionario,
            'qntCortesFuncionario' => $barbeiro->qntCortesFuncionario,
            'salarioFuncionario' => $barbeiro->salarioFuncionario,
            'statusFuncionario' => $barbeiro->statusFuncionario
        ]);

        DB::table('usuarios')
        ->where('tipo_usuario_id', $id)
        ->update([
        'nome' => $request->nomeFuncionario,
        'email' => $request->emailFuncionario,

        ]);




        return redirect()->route('login');
    }



    // -----------------------------Vendas-----------------------------------------



    public function vendas()
    {
        $idBarbeiro = session('id');
        $barbeiro = Funcionario::find($idBarbeiro);

        $mesAtual = date('m');
        $mesAnterior = date('m') - 1;
        $produtos = Produtos::where('statusProduto', 'ativo')->where('estoqueProduto', '>', 0)->get();


        $vendas = Vendas::where('idFuncionario', '=', $idBarbeiro)
            ->whereMonth('created_at', $mesAtual)
            ->orderBy('created_at', 'asc')
            ->take(8)
            ->get();


        //------------------------------------------------------------------------


        $produtoMaisVendido = Vendas::select('nomeVenda', DB::raw('SUM(qntVenda) AS totalVendas'))
            ->groupBy('nomeVenda')
            ->orderByDesc('totalVendas')
            ->whereMonth('created_at', $mesAtual)
            ->where('idFuncionario', '=', $idBarbeiro)
            ->first();


        // -------------------------------------------------------------------------
        $vendasTotal = Vendas::where('idFuncionario', '=', $idBarbeiro)
            ->whereMonth('created_at', $mesAtual)
            ->sum('qntVenda');

        $vendasMesAnterior = Vendas::where('idFuncionario', '=', $idBarbeiro)
            ->whereMonth('created_at', $mesAnterior)
            ->sum('qntVenda');

        $porcentagemVendas = 0; // Initialize variable

        if ($vendasMesAnterior > 0) {
            $porcentagemVendas = (($vendasTotal - $vendasMesAnterior) / $vendasMesAnterior) * 100;
        }

        $porcentagemVendas = number_format($porcentagemVendas, 2);

        // ---------------------------------------------------------------------------


        $clientesTotal = Vendas::where('idFuncionario', '=', $idBarbeiro)
            ->whereMonth('created_at', $mesAtual)
            ->count();

        $clientesMesAnterior = Vendas::where('idFuncionario', '=', $idBarbeiro)
            ->whereMonth('created_at', $mesAnterior)
            ->count();
        // dd($clientesMesAnterior);


        $porcentagemCliente = 0; // Initialize variable

        if ($clientesMesAnterior > 0) {
            $porcentagemCliente = (($clientesTotal - $clientesMesAnterior) / $clientesMesAnterior) * 100;
        }

        $porcentagemCliente = number_format($porcentagemCliente, 2);


        // ----------------------------------------------------------------------------


        $receitaProduto = Vendas::where('idFuncionario', '=', $idBarbeiro)
            ->whereMonth('created_at', $mesAtual)
            ->sum('valorVenda');

        $receitaProdutoAnterior = Vendas::where('idFuncionario', '=', $idBarbeiro)
            ->whereMonth('created_at', $mesAnterior)
            ->sum('valorVenda');

        $comissao = $receitaProduto - (30 / 100) * $receitaProduto;

        $comissao = $receitaProduto - $comissao;

        $comissaoMesAnterior = $receitaProdutoAnterior - (30 / 100) * $receitaProdutoAnterior;

        $porcentagemComissao = 0; // Initialize variable

        if ($receitaProdutoAnterior > 0) {
            $porcentagemComissao = (($comissao - $comissaoMesAnterior) / $comissaoMesAnterior) * 100;
        }



        $porcentagemComissao = number_format($porcentagemComissao, 2);


        return view('dashboard.barbeiro.vendas', compact(
            'barbeiro',
            'vendas',
            'produtoMaisVendido',
            'vendasTotal',
            'clientesTotal',
            'comissao',
            'porcentagemComissao',
            'porcentagemCliente',
            'porcentagemVendas',
            'produtos'
        ));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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




        $venda = new vendas;

        // Define as propriedades de 'venda' com os dados da requisição
        $venda->nomeVenda = $request->nomeVenda;
        $venda->valorVenda = $request->valorVenda;
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





    // -------------------------------------Compromissos-------------------------------------------




    public function compromisso()
    {

        $idBarbeiro = session('id');
        $dados = Agendamento::where('funcionario_id', $idBarbeiro)->whereDate('dataAgendamento', Carbon::today())->orderBy('horarioInicial', 'asc')->get();



        return view('dashboard.barbeiro.compromisso', compact('dados'));
    }

    public function registro()
    {
        $idBarbeiro = session('id');
        $dados = Agendamento::where('funcionario_id', $idBarbeiro)->orderBy('dataAgendamento', 'asc')->orderBy('horarioInicial', 'asc')->get();


        return view('dashboard.barbeiro.registros', compact('dados'));
    }




}
