@extends('dashboard.layout-dash.layout')

@section('title', 'Controle de clientes')

@section('conteudo')




<style>

    .container {

        position: relative;
        max-width: 1320px;
        width: 100%;
        background: #fff;
        padding: 40px 30px;
        box-shadow: 0 0px 0px rgba(0, 0, 0, 0.2);
        perspective: 2700px;
    }
        p {
            color: rgba(0, 0, 0, 0.5);
            font-weight: 300;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family: "Roboto", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        a {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
        }

        a,
        a:hover {
            text-decoration: none !important;
        }

        .content {
            padding: 7rem 0;
        }

        h2 {
            font-size: 20px;
            color: #fff;
        }

        .custom-table {
            min-width: 900px;
        }

        .custom-table thead tr,
        .custom-table thead th {
            padding-bottom: 30px;
            border-top: none;
            border-bottom: none !important;
            color: #fff;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .2rem;
        }

        .custom-table tbody th,
        .custom-table tbody td {
            color: #757575;
            font-weight: 400;
            padding-bottom: 20px;
            padding-top: 20px;
            font-weight: 300;
            border: none;
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
            font-weight: 500;
        }

        .custom-table tbody th small,
        .custom-table tbody td small {
            color: rgba(0, 0, 0, 0.3);
            font-weight: 300;
        }

        .custom-table tbody th a,
        .custom-table tbody td a {
            color: rgba(0, 0, 0, 0.3);
        }

        .custom-table tbody th .more,
        .custom-table tbody td .more {
            color: rgba(0, 0, 0, 0.3);
            font-size: 11px;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: .2rem;
        }

        .custom-table tbody tr {
            -webkit-transition: .3s all ease;
            -o-transition: .3s all ease;
            transition: .3s all ease;
        }

        .custom-table tbody tr:hover td,
        .custom-table tbody tr:focus td {
            color: #000000;
            font-weight: 500;
        }

        .custom-table tbody tr:hover td a,
        .custom-table tbody tr:focus td a {
            color: #ff6d24;
        }

        .custom-table tbody tr:hover td .more,
        .custom-table tbody tr:focus td .more {
            color: #ff6d24;
        }

        .custom-table .td-box-wrap {
            padding: 0;
        }

        .custom-table .box {
            background: #fff;
            border-radius: 4px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .custom-table .box td,
        .custom-table .box th {
            border: none !important;
        }

        .custom-table thead tr, .custom-table thead th {
    padding-bottom: 30px;
    border-top: none;
    border-bottom: none !important;
    color: black;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .2rem;
    font-weight: 650;
    }
    .table {
    --bs-table-bg: transparent;
    --bs-table-accent-bg: transparent;
    --bs-table-striped-color: #67748e;
    --bs-table-striped-bg: transparent;
    --bs-table-active-color: #67748e;
    --bs-table-active-bg: rgba(0, 0, 0, 0.1);
    --bs-table-hover-color: #67748e;
    --bs-table-hover-bg: rgba(0, 0, 0, 0.075);
    width: 100%;
    margin-bottom: 1rem;
    color: #67748e;
    vertical-align: top;
    border-color: #e9ecef;
    }






    .wrapper{
    position: relative;
    width: 100%;
    height: 100%;
    }

    button{
    margin-top: 9%;
    font-family: 'Ubuntu', sans-serif;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);

    width: 120px;
    height: 40px;
    line-height: 1;
    font-size: 18px;
    font-weight: bold;
    letter-spacing: 1px;
    border: 3px solid #ff6d24;
    background: #fff;
    color: #ff6d24;
    border-radius: 40px;
    cursor: pointer;
    overflow: hidden;
    transition: all .35s;
    }

    button:hover{
    background: #ff6d24;
    color: #fff;
    }

    button span{
    opacity: 1;
    visibility: visible;
    transition: all .35s;
    }

    .success{
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: #fff;
    border-radius: 50%;
    z-index: 1;
    opacity: 0;
    visibility: hidden;
    transition: all .35s;
    }

    .success svg{
    width: 20px;
    height: 20px;
    fill: yellowgreen;
    transform-origin: 50% 50%;
    transform: translateY(-50%) rotate(0deg) scale(0);
    transition: all .35s;
    }

    button.is_active{
    width: 40px;
    height: 40px;
    }

    button.is_active .success{
    opacity: 1;
    visibility: visible;
    }

    button.is_active .success svg{
    margin-top: 50%;
    transform: translateY(-50%) rotate(720deg) scale(1);
    }

    [data-aos][data-aos][data-aos-duration="400"], body[data-aos-duration="400"] [data-aos] {
    transition-duration: 1s;
    }

    .cssbuttons-io-button {
      background-image: linear-gradient(19deg, #ff6d24 0%, #ff0000 100%);
      color: white;
      font-family: inherit;
      padding: 0.35em;
      padding-left: 1.2em;
      font-size: 17px;
      border-radius: 10em;
      border: none;
      letter-spacing: 0.05em;
      display: flex;
      align-items: center;
      overflow: hidden;
      position: relative;
      height: 2.8em;
      padding-right: 3.3em;
      cursor: pointer;
      text-transform: uppercase;
      font-weight: 500;
      box-shadow: 0 0 0.8em rgba(83, 83, 83, 0.3),0 0 0.8em hsla(0, 0%, 0%, 0.3);
      transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
      margin-top: 0%;
      width:205px;
      margin-left: 40%;
    }

    .cssbuttons-io-button .icon {
      background: white;
      margin-left: 1em;
      position: absolute;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 2.2em;
      width: 2.2em;
      border-radius: 10em;
      right: 0.3em;
      transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
    }

    .cssbuttons-io-button:hover .icon {
      width: calc(100% - 0.6em);
    }

    .cssbuttons-io-button .icon svg {
      width: 1.1em;
      transition: transform 0.3s;
      color: #ff0000;
    }

    .cssbuttons-io-button:hover .icon svg {
      transform: translateX(0.1em);
    }

    .cssbuttons-io-button:active .icon {
      transform: scale(0.9);
    }

    .topo{
        color: #ff6d24
    }

</style>


    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="text-black font-weight-bolder  mb-0">Veja e gerencie seus clientes, {{ session('nome') }}!</h6>
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ session('cargo') }}</li>
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



    <style>
        [data-aos][data-aos][data-aos-duration="400"],
        body[data-aos-duration="400"] [data-aos] {
            transition-duration: 1s;
        }
    </style>

    <div data-aos="fade-left" class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Quant. clientes mensal</p>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Serviço favorito</p>
                                    <h5 class=" text-white font-weight-bolder mb-0">
                                        @php use Illuminate\Support\Str; @endphp

                                        @if ($servicoFav)
                                        {{ Str::limit(ucfirst($servicoFav), 18) }}
                                        @else
                                        Sem registro!
                                        @endif
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Cliente do mês / quantidade</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        @if ($clienteDoMes == null)
                                        Sem registro!@else
                                        {{ ucfirst($clienteDoMes) }} / {{ $totalCliente }}
                                        @endif
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Faturamento</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        R$ {{ number_format($faturamento, 2, ',', '.') }}
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

    </div>

    <div data-aos="fade-left" class="container" style="margin-top: 5%;">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h6 class="section-title bg-white text-center text-primary px-3">Clientes com cadastro na barbearia</h6>
            <h1 class="mb-5">Clientes</h1>
        </div>

        <div style="background:transparent;" class="container-fluid">
            <div class="table-responsive">

                <table class="table table-striped custom-table">
                    <thead>
                        <tr>
                            <th scope="col">Foto</th>
                            <th scope="col">Nome Cliente</th>
                            <th scope="col">Telefone</th>
                            <th scope="col" style="text-align: center;">Email</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Serviços Realizados</th>
                            <th scope="col">Status</th>
                            <th scope="col">Desativar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr scope="row">
                            <td style="padding: 0px;">
                                @if(empty($cliente->fotoCliente) || $cliente->fotoCliente === 'SEM IMAGEM')
                                    <img style="width:50px;border-radius:40px;margin-left:20%;" src="{{ asset('images/icons/adicionar-usuario.png') }}" alt="Imagem Padrão">
                                    @else
                                    <img style="width:50px;border-radius:40px;margin-left:20%;" src="{{ asset('storage/' . $cliente->fotoCliente) }}" alt="Foto do Cliente {{ $cliente->nomeCliente }}">
                                @endif
                            </td>
                            <td style="text-align: center;">{{ ucfirst($cliente->nomeCliente) }} {{ ucfirst($cliente->sobrenomeCliente) }}</td>
                            <td style="text-align: center;">{{ '(' . substr($cliente->telefoneCliente, 0, 2) . ') ' . substr($cliente->telefoneCliente, 2, 5) . '-' . substr($cliente->telefoneCliente, 7); }}</td> <!-- Adicione outras propriedades conforme necessário -->
                            <td style="text-align: center">{{ $cliente->emailCliente }}</td>
                            <td style="text-align: center;">{{ $cliente->enderecoCliente }}</td>
                            <td style="text-align: center;">{{ $cliente->qtdCortesCliente }}</td>
                            <td style="text-align: center;">{{ strtoupper($cliente->statusCliente) }}</td>
                            <td>
                                <div class="wrapper">
                                    @if($cliente->statusCliente === 'DESATIVADO')
                                        <button class="ativar" data-id="{{ $cliente->id }}">
                                            <span>Ativar</span>
                                        </button>
                                    @else
                                        <button class="cancelar" data-id="{{ $cliente->id }}">
                                            <span>Desativar</span>
                                        </button>
                                    @endif
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>


        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".cancelar").click(function() {
                var id = $(this).data("id");
                var status = "DESATIVADO";

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    url: "/cliente/desativar/" + id,
                    type: "PUT",
                    data: {
                        statusCliente: status
                    },
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.href = '/dashboard/gerente/clientes';
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        </script>

        <script>
            $(document).ready(function() {
                $(".ativar").click(function() {
                    var id = $(this).data("id");
                    var status = "ATIVO";

                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                    $.ajax({
                        url: "/cliente/ativar/" + id,
                        type: "PUT",
                        data: {
                            statusCliente: status
                        },
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        success: function(response) {
                            console.log(response);
                            window.location.href = '/dashboard/gerente/clientes';
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });
            </script>
@endsection
