@extends('dashboard.layout-dash.layout')

@section('title', 'Agendamentos registrados')

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

</style>

<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
navbar-scroll="true">
<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
        <h6 class="text-black font-weight-bolder  mb-0">Visualize os agendamentos deste mês, {{ ucfirst(session('nome')) }}!</h6>
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



<div data-aos="fade-left" class="container" style="margin-top: 5%;">
    <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
        <h6 class="section-title bg-white text-center text-primary px-3">Relatório de agendamentos da barbearia</h6>
        <h1 class="mb-5">Agendamentos</h1>
    </div>

    <div style="background:transparent;" class="container-fluid">
        <div class="table-responsive">

            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th scope="col">Foto Serviço</th>
                        <th scope="col">Nome Cliente</th>
                        <th scope="col" style="text-align: center;">Serviço Realizado</th>
                        <th scope="col" style="text-align: center;">Valor</th>
                        <th scope="col">Data</th>
                        <th scope="col">Horario</th>
                        <th scope="col">Status</th>
                        <th scope="col">Cancelar</th>
                        <th scope="col">Desativar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendamento as $dado)
                    <tr scope="row">
                        <td style="padding: 5px;">
                            @if(empty($dado->servico->fotoServico) || $dado->servico->fotoServico === 'SEM IMAGEM')
                                <img style="width:100px;border-radius:40px;margin-left:20%;" src="{{ asset('images/icons/adicionar-usuario.png') }}" alt="Imagem Padrão">
                                @else
                                <img style="width:100px;border-radius:40px;margin-left:20%;" src="{{ asset('storage/' . $dado->servico->fotoServico) }}" alt="Foto do Cliente {{ $dado->servico->nomeServico }}">
                            @endif
                        </td>
                        <td style="text-align: center;">{{ ucfirst($dado->cliente->nomeCliente) }} {{ ucfirst($dado->cliente->sobrenomeCliente) }}</td>
                        <td style="text-align: center;">{{ $dado->servico->nomeServico }}</td> <!-- Adicione outras propriedades conforme necessário -->
                        <td style="text-align: center">R$ {{ number_format($dado->servico->valorServico, 2, ',', '.') }}</td>
                        <td style="text-align: center;">{{ date('d/m/Y', strtotime($dado->dataAgendamento))  }}</td>
                        <td style="text-align: center;">{{ date('H:i', strtotime($dado->horarioInicial)) }}</td>
                        <td style="text-align: center;">{{ strtoupper($dado->statusServico) }}</td>
                        <td>
                            <div class="wrapper">
                                    <button class="ativar" data-id="{{ $dado->id }}">
                                        <span>Cancelar</span>
                                    </button>
                            </div>

                           </td>

                        <td>
                            <div class="wrapper">
                                @if ($dado->statusServico == "Pendente")
                                <button class="cancelar" data-id="{{ $dado->id }}">
                                    <span>Desativar</span>
                                </button>
                                @else
                                <button class="ativar" data-id="{{ $dado->id }}">
                                    <span>Ativar</span>
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




    <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp; margin-top:40px;">
        <h6 class="section-title bg-white text-center text-primary px-3">Gerencie os horários de funcionamento da barbearia</h6>
        <h1 class="mb-5">Horários</h1>
    </div>

    <div class="d-flex justify-content-end">
        <a href="{{ route('adc.horario') }}" class="justify-end">
            <button class="cssbuttons-io-button" style="  margin-bottom:40px;">Adicionar
                <div class="icon">
                    <svg height="24" width="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"
                            fill="currentColor"></path>
                    </svg>
                </div>
            </button>
        </a>
    </div>

    <div style="background:transparent;" class="container">
        <div class="table-responsive">

            <table class="table table-striped custom-table">
                <thead>
                    <tr>
                        <th style="text-align: center;">Horário</th>
                        <th style="text-align: center;">Editar</th>
                        <th style="text-align: center;">Deletar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horarios as $dado)
                    <tr scope="row">
                        <td style="text-align: center;">{{ ucfirst($dado->horarios) }}</td>
                        <td>
                            <div class="wrapper">
                                <form action="{{ route('gerente.editHorario', ['id' => $dado->id]) }}" method="GET" style="display: inline;">
                                    @csrf
                                    <button type="submit" class="cancelar" style=" margin-top:0% !important;">Editar<i class="ri-close-fill" style="color:#fff !important; font-size:13px;"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                        <td>
                            <div class="wrapper">
                                <form action="{{ route('gerente.horario.deletar', ['id' => $dado->id]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="cancelar" style=" margin-top:0% !important;">
                                        Deletar
                                        <i class="ri-close-fill" style="color:#fff !important; font-size:13px;"></i>
                                    </button>
                                </form>
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
            var status = "Desativo";

            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            $.ajax({
                url: "/agendamento/desativar/" + id,
                type: "PUT",
                data: {
                    statusServico: status
                },
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = '/dashboard/gerente/agendamentos';
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
                var status = "Ativo";

                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    url: "/agendamento/ativar/" + id,
                    type: "PUT",
                    data: {
                        statusServico: status
                    },
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        console.log(response);
                        window.location.href = '/dashboard/gerente/agendamentos';
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        </script>


@endsection
