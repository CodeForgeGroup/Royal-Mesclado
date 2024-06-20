@extends('dashboard.layout-dash.layout')

@section('title', 'Perfil barbeiro')

@section('conteudo')
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="text-black font-weight-bolder  mb-0">Visualize seu perfil, {{ ucfirst(session('nome')) }}!</h6>
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ ucfirst(session('cargo')) }}</li>
                </ol>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-column align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                        <img src="" alt="">
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

    <div class="container-fluid">
        <div class="page-header min-height-300 border-radius-xl mt-4"
            style="background-image: url('{{ asset('../dashboard/img/fundoPerfil.png') }}'); background-position-y: 50%;">
        </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">

                        <img src="{{ asset('storage/' . $barbeiro->fotoFuncionario) }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>

                </div>
                <div class="col-auto my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ session('nome') . " " . $barbeiro->sobrenomeFuncionario }}
                        </h5>
                        <p class="mb-0 font-weight-bold text-sm">
                            {{ ucfirst(session('cargo')) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12 col-xl-6">

                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0 text-orange">Informações pessoais</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('barbeiro.edit', ['id' => $barbeiro->id]) }}">
                                    <i class="fa fa-user text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <p class="text-sm text-light">
                            {{ $barbeiro->descricaoFuncionario }}
                        </p>
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm text-light"><strong class="text-white">Nome
                                    completo:</strong>
                                &nbsp; {{ session('nome') . ' ' . $barbeiro->sobrenomeFuncionario }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Número:</strong>
                                &nbsp;
                                {{ '(' . substr($barbeiro->numeroFuncionario, 0, 2) . ') ' . substr($barbeiro->numeroFuncionario, 2, 5) . '-' . substr($barbeiro->numeroFuncionario, 7); }}
                            </li>
                            <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Email:</strong>
                                &nbsp;
                                {{ $barbeiro->emailFuncionario }}</li>
                                <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Nascimento:</strong>
                                    &nbsp; {{ $nascimento }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm text-light"><strong
                                    class="text-white">Especialidade:</strong>
                                &nbsp; {{ $barbeiro->especialidadeFuncionario }}</li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-12 col-xl-6">

                <div class="card h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0 text-orange">Informações profissionais</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Cargo:</strong>
                            &nbsp; {{ ucfirst($barbeiro->cargoFuncionario) }}</li>
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm text-light"><strong class="text-white">Início
                                    expediente:</strong>
                                &nbsp; {{ $barbeiro->inicioExpedienteFuncionario }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Fim
                                    expediente:</strong>
                                &nbsp;
                                {{ $barbeiro->fimExpedienteFuncionario }}
                            </li>
                            <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Salário:</strong>
                                &nbsp;
                                R${{ number_format($barbeiro->salarioFuncionario, 2, ',', '.') }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Contratado:</strong>
                                &nbsp; {{ $barbeiro->created_at->format('d/m/Y') }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Ultima
                                    atualização:</strong>
                                &nbsp; {{ $barbeiro->updated_at->format('d/m/Y') }}</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>



    @endsection
