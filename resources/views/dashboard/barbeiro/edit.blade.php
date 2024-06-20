@extends('dashboard.layout-dash.layout')

@section('title', 'Editar Barbeiro')

@section('conteudo')

<link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">
<link rel="stylesheet" href="{{ asset ('fonts/fontawesome/css/font-awesome.min.css') }}">


    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="text-black font-weight-bolder  mb-0">altere suas informações, {{ session('nome') }}!</h6>
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


        <form action="{{ route('barbeiro.update', $barbeiro->id) }}" method="POST" class="formBody">

            @csrf
            @method('PUT')

            <div class="container">
                <div class="cover">
                    <div class="front">
                        <img src="{{ asset('../dashboard/img/fundoEdit.svg') }}" alt="">
                        <div class="text">
                            <span class="text-1">Informações que não<br>podem ser alteradas</span>
                            <br>
                            <span class="text-2">Ini. Expediente: {{ $barbeiro->inicioExpedienteFuncionario }}</span>
                            <span class="text-2">Fim Expediente: {{ $barbeiro->fimExpedienteFuncionario }}</span>
                            <span class="text-2">Salário:  R${{ number_format($barbeiro->salarioFuncionario, 2, ',', '.') }}</span>
                            <span class="text-2">Email: {{ $barbeiro->emailFuncionario }}</span>
                            <span class="text-2">Cargo: {{ $barbeiro->cargoFuncionario }}</span>
                            <span class="text-2">Especialidade: {{ $barbeiro->especialidadeFuncionario }}</span>
                        </div>
                    </div>
                </div>
                <div class="forms">
                    <div class="form-content">
                        <div class="login-form">
                            <div class="title">Editar</div>
                            <form action="{{ route('barbeiro.update', ['id' => $barbeiro->id]) }}" method="POST">

                                @csrf
                                @method('PUT')


                                <div class="input-boxes">
                                    <div class="input-box">
                                        <i class="fa-solid fa-signature"></i>
                                        <input type="text" value="{{ $barbeiro->nomeFuncionario }}"
                                            placeholder="Edite seu nome" required
                                            @error('nomeFuncionario') is-invalid @enderror id="nomeFuncionario"
                                            name="nomeFuncionario" required maxlength="100">
                                        @error('nomeFuncionario')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-box">
                                        <i class="fa-solid fa-signature"></i>
                                        <input type="text" value="{{ $barbeiro->sobrenomeFuncionario }}"
                                            placeholder="Edite seu sobrenome" required
                                            @error('sobrenomeFuncionario') is-invalid @enderror id="sobrenomeFuncionario"
                                            name="sobrenomeFuncionario" required maxlength="100">
                                        @error('sobrenomeFuncionario')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-box">
                                        <i class="fa-solid fa-phone"></i>
                                        <input type="text" value="{{ $numeroFormatado }}"
                                            placeholder="Edite seu número" required
                                            @error('numeroFuncionario') is-invalid @enderror id="numeroFuncionario"
                                            name="numeroFuncionario" required maxlength="100">
                                        @error('numeroFuncionario')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-box">
                                        <i class="fas fa-envelope"></i>
                                        <input type="text" value="{{ $barbeiro->emailFuncionario }}"
                                            placeholder="Edite seu email" required
                                            @error('emailFuncionario') is-invalid @enderror id="emailFuncionario"
                                            name="emailFuncionario" required maxlength="100">
                                        @error('emailFuncionario')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="input-box">
                                        <i class="fa-solid fa-ranking-star"></i>
                                        <input type="text" value="{{ $barbeiro->especialidadeFuncionario }}"
                                            placeholder="Edite sua especialidade" required
                                            @error('especialidadeFuncionario') is-invalid @enderror
                                            id="especialidadeFuncionario" name="especialidadeFuncionario" required
                                            maxlength="100">
                                        @error('especialidadeFuncionario')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="button input-box">
                                        <input type="submit" value="enviar">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </form>


    </div>

@endsection
