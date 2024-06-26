@extends('dashboard.layout-dash.layout')

@section('title', 'Barbeiro')

@section('conteudo')



<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">



<style>

.topo{
        color: #ff6d24;
    }

</style>


    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="text-black font-weight-bolder  mb-0">Bem vindo, {{ ucfirst(session('nome')) }}!</h6>
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ ucfirst(session('cargo')) }}</li>
                </ol>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-column align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                        {{-- <img src="{{ asset('storage/' . $barbeiro->fotoFuncionario) }}" alt=""> --}}
                        <a class="d-sm-inline d-none" href="{{ url('/login') }}">Sair</a>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->





    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Clientes Mensais</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                            {{ $clientesMensais }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Cortes Feitos</p>
                                    <h5 class=" text-white font-weight-bolder mb-0">
                                        {{ $qntCortes }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Salário</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        R$ {{ $salario }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Lucro mensal</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        R$ {{ $lucro }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="d-flex flex-column h-100">
                                    <p class="mb-1 pt-2 text-bold">Seja Bem Vindo a sua área de trabalho,
                                        {{ ucfirst(session('nome')) }}!</p>
                                    <h5 class="text-white font-weight-bolder">Veja seus compromissos</h5>
                                    <p class="mb-5">Clique em saiba mais e vá ver seus tabalhos de hoje!</p>
                                    <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                        href="{{ url('dashboard/barbeiro/compromisso') }}">
                                        Saiba mais
                                        <i class="fa fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                                <div class="bg-gradient-primary border-radius-lg h-100" style="height:255px !important">
                                    <img class="w-100 position-relative z-index-2 pt-4"
                                        src="../dashboard/img/calendario.svg" alt="rocket" style="height:80%;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card h-100 p-3">
                    <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                        style="background-image: url('../dashboard/img/ivancik.jpg');">
                        <span class="mask bg-gradient-dark"></span>
                        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                            <h5 class="text-white text-white font-weight-bolder mb-4 pt-2">Ajuste seu perfil</h5>
                            <p class="text-white">Edite seu perfil e deixe-o de uma forma que te agrade com as suas
                                caracteristicas!</p>
                            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                href="{{ url('dashboard/barbeiro/perfil') }}">
                                Edite
                                <i class="fa fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6 class="text-white">Suas ultimas vendas!</h6>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                                <div class="dropdown float-lg-end pe-4">
                                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fa fa-ellipsis-v text-secondary"></i>
                                    </a>
                                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                action</a></li>
                                        <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else
                                                here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nome</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Descrição</th>

                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Preço</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            quantidade</th>
                                    </tr>
                                </thead>



                                <tbody>
                                    @foreach ($vendas as $item)
                                    <tr>
                                            <td class="align-middle text-start text-sm">
                                                <span class="text-white font-weight-bold" id="meuInput"
                                                    contenteditable="true">{{ $item->nomeVenda }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold" id="meuInput"
                                                    contenteditable="true">{{ $item->descricaoVenda }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">R${{ number_format((float)$item->valorVenda, 2, ',', '.') }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold">{{ $item->qntVenda }}</span>
                                            </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6 class="text-white">Seus ultimos agendamentos</h6>
                        <p class="text-sm">
                            <span class="font-weight-bold">Confira!</span>
                        </p>
                    </div>
                    @if(isset($mensagem))


                        <div class="card-body p-3">
                            <div class="timeline timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="fa fa-arrow-up"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-white text-dark text-sm font-weight-bold mb-0">
                                            {{ $mensagem }}
                                        </h6>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @else
                        @foreach ($agendamentos as $agendamento)

                        <div class=" p-3">
                            <div class="timeline-one-side">
                                <div class="timeline-block mb-3">
                                    <span class="timeline-step">
                                        <i class="fa fa-check"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <h6 class="text-white text-dark text-sm font-weight-bold mb-0">
                                            {{ ucfirst($agendamento->cliente->nomeCliente) }}, {{ ucfirst($agendamento->servico->nomeServico) }}
                                        </h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">
                                            {{ $agendamento->statusServico }}, agendado para às {{ date('H:i', strtotime($agendamento->horarioInicial)) }} {{ date('d/m/Y', strtotime($agendamento->dataAgendamento)) }}
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach

                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
