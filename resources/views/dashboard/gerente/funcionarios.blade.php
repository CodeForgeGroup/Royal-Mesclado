@extends('dashboard.layout-dash.layout')

@section('title', 'Funcionários')

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
        color: #ff6d24;
    }

</style>



<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
navbar-scroll="true">
<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
        <h6 class="text-black font-weight-bolder  mb-0">Visualize seus funcionários, {{ ucfirst(session('nome')) }}!</h6>
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

<div data-aos="fade-left" class="container-fluid py-4">
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Quant. de serviços feitos</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                    {{ $servicosFeitos }}

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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Func. do mês / realizou</p>
                                <h5 class=" text-white font-weight-bolder mb-0">

                                    @if ($funcionarioDoMes)
                                    {{ ucfirst($funcionarioDoMes) }} / {{ $total }} / {{ $funcionarioFaturamento }}
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
                                <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Salários</p>
                                <h5 class="text-white font-weight-bolder mb-0">
                                   R$ {{ number_format($salarios, 2, ',', '.') }}
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
        <h6 class="section-title bg-white text-center text-primary px-3">Adicione um novo funcionario e edite seus funcionarios</h6>
        <h1 class="mb-5">Funcionarios</h1>
    </div>

    <a href="{{ route('adicionar.func') }}">
    <button class="cssbuttons-io-button"> Funcionarios
        <div class="icon">
          <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h24v24H0z" fill="none"></path><path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z" fill="currentColor"></path></svg>
        </div>
    </button>
    </a>

    <div style="background:transparent;" class="container-fluid">
        <div class="table-responsive">

            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th scope="col">Foto</th>
                        <th scope="col">Nome Funcionario</th>
                        <th scope="col">Telefone</th>
                        <th scope="col" style="text-align: center;">Email</th>
                        <th scope="col">Inicio Expediente</th>
                        <th scope="col">Fim Expediente</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Salario</th>
                        <th scope="col">Cortes Realizados</th>
                        <th scope="col">Status</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Cancelar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionarios as $funcionario)
                    <tr scope="row">
                        <td style="padding: 0px;">
                            @if(empty($funcionario->fotoFuncionario) || $funcionario->fotoFuncionario === 'SEM IMAGEM')
                                <img style="width:50px;border-radius:40px;margin-left:20%;" src="{{ asset('images/icons/adicionar-usuario.png') }}" alt="Imagem Padrão">
                                @else
                                <img style="width:50px;border-radius:40px;margin-left:20%;" src="{{ asset('storage/' . $funcionario->fotoFuncionario) }}" alt="Foto do Funcionario {{ $funcionario->nomeFuncionario }}">
                            @endif
                        </td>
                        <td style="text-align: center;">{{ ucfirst($funcionario->nomeFuncionario) }} {{ ucfirst($funcionario->sobrenomeFuncionario) }}</td>
                        <td style="text-align: center;">{{ '(' . substr($funcionario->numeroFuncionario, 0, 2) . ') ' . substr($funcionario->numeroFuncionario, 2, 5) . '-' . substr($funcionario->numeroFuncionario, 7); }}</td> <!-- Adicione outras propriedades conforme necessário -->
                        <td style="text-align: center">{{ $funcionario->emailFuncionario }}</td> <!-- Continue com outras colunas conforme necessário -->
                        <td id="horaCompleta" style="text-align: center;">{{ $inicioExpediente }}</td>
                        <td id="fimExpediente" style="text-align: center;">{{ $fimExpediente }}</td>
                        <td style="text-align: center;">{{ ucfirst($funcionario->cargoFuncionario) }}</td>
                        <td style="text-align: center;">R$ {{  number_format($funcionario->salarioFuncionario, 2, ',', '.') }}</td>
                        <td style="text-align: center;">{{ $funcionario->qntCortesFuncionario }}</td>
                        <td style="text-align: center;">{{ $funcionario->statusFuncionario }}</td>
                        <td>
                            <div class="wrapper">
                                <a href="{{ route('funcionario.edit', ['id' => $funcionario->id]) }}">
                                    <button class="">
                                        <span>Editar</span>
                                        <div class="success">
                                            <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 29.756 29.756" style="enable-background:new 0 0 29.756 29.756;" xml:space="preserve">
                                                <path d="M29.049,5.009L28.19,4.151c-0.943-0.945-2.488-0.945-3.434,0L10.172,18.737l-5.175-5.173 c-0.943-0.944-2.489-0.944-3.432,0.001l-0.858,0.857c-0.943,0.944-0.943,2.489,0,3.433l7.744,7.752 c0.944,0.943,2.489,0.943,3.433,0L29.049,8.442C29.991,7.498,29.991,5.953,29.049,5.009z"/>
                                            </svg>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="wrapper">
                                @if($funcionario->statusFuncionario === 'DESATIVADO')
                                    <button class="ativar" data-id="{{ $funcionario->id }}">
                                        <span>Ativar</span>
                                    </button>
                                @else
                                    <button class="cancelar" data-id="{{ $funcionario->id }}">
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
                url: "/funcionario/desativar/" + id,
                type: "PUT",
                data: {
                    statusFuncionario: status
                },
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = '/dashboard/gerente/funcionarios';
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
                    url: "/funcionario/ativar/" + id,
                    type: "PUT",
                    data: {
                        statusFuncionario: status
                    },
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.href = '/dashboard/gerente/funcionarios';
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        </script>


@endsection
