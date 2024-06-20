@extends('dashboard.layout-dash.layout')

@section('title', 'Compromissos barbeiro')

@section('conteudo')


    <style>
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

        .custom-table thead tr,
        .custom-table thead th {
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






        .wrapper {
            position: relative;
            width: 100%;
            height: 100%;
        }

        button {
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

        button:hover {
            background: #ff6d24;
            color: #fff;
        }

        button span {
            opacity: 1;
            visibility: visible;
            transition: all .35s;
        }

        .success {
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

        .success svg {
            width: 20px;
            height: 20px;
            fill: yellowgreen;
            transform-origin: 50% 50%;
            transform: translateY(-50%) rotate(0deg) scale(0);
            transition: all .35s;
        }

        button.is_active {
            width: 40px;
            height: 40px;
        }

        button.is_active .success {
            opacity: 1;
            visibility: visible;
        }

        button.is_active .success svg {
            margin-top: 50%;
            transform: translateY(-50%) rotate(720deg) scale(1);
        }

        [data-aos][data-aos][data-aos-duration="400"],
        body[data-aos-duration="400"] [data-aos] {
            transition-duration: 1s;
        }

        .container {
            max-width: 1500px;
            width: 95%;
        }

        .botao-registro{
            padding:5px 10px;
            border: solid 4px #ff6d24;
            border-radius:15px;
            color: #ff6d24;
            font-weight: bold;
            cursor: pointer;
        }

        .botao-registro:hover{
            background-color: #ff6d24;
            color: white;
            transition: ease-in-out .8s
        }

    </style>


    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="text-black font-weight-bolder  mb-0">Visualize seus compromissos, {{ucfirst(session('nome')) }}!</h6>
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


    <div class="container-fluid py-4">

        <div class="text-end wow fadeInUp" data-wow-delay="0.1s"
            style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <a class="botao-registro" href="{{ route('barbeiro.registro') }}">Todos os registros</a>
        </div>

        <div data-aos="fade-left" class="container" style="margin-top: 5%;">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="section-title bg-white text-center text-primary px-3">Veja todos os compromissos diários!
                </h6>
                <h1 class="mb-5">Compromissos</h1>
            </div>

            <div style="background:transparent;" class="container-fluid">
                <div class="table-responsive">

                    <table class="table table-striped custom-table">
                        <thead>
                            <tr>
                                <th scope="col">Serviço</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Nome do Serviço</th>
                                <th scope="col">Data</th>
                                <th scope="col">Horário</th>
                                <th scope="col">Status</th>
                                <th scope="col">Confirmar</th>
                                <th scope="col">Cancelar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dados as $dado)
                                <tr scope="row">
                                    <td style="padding: 0;"><img style="width:100px; border-radius:60px; margin-top:5%;"
                                            src="{{ asset('storage/' . $dado->servico->fotoServico) }}"
                                            alt="{{ $dado->servico->nomeServico }}"></td>
                                    <td style="padding-left: 2%;">{{ $dado->cliente->nomeCliente }}</td>
                                    <td>{{ $dado->servico->nomeServico }}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d', $dado->dataAgendamento)->format('d/m/Y') }}
                                    </td>
                                    <td><a style="padding-left: 12%;font-size: 10pt;" href="#"
                                            class="more">{{ $dado->horarioInicial }}</a></td>
                                    <td><a style="font-size: 9pt;" href="#" class="more statusAgendamento"
                                            data-status="{{ $dado->statusServico }}">{{ $dado->statusServico }}</a></td>
                                    <td>
                                        <div class="wrapper">
                                            @if ($dado->statusServico == 'CONFIRMADO')
                                                <button class="is_active" data-id="{{ $dado->id }}">
                                                    <span>Confirmar</span>
                                                    <div class="success">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                            viewBox="0 0 29.756 29.756"
                                                            style="enable-background:new 0 0 29.756 29.756;"
                                                            xml:space="preserve">

                                                            <path
                                                                d="M29.049,5.009L28.19,4.151c-0.943-0.945-2.488-0.945-3.434,0L10.172,18.737l-5.175-5.173   c-0.943-0.944-2.489-0.944-3.432,0.001l-0.858,0.857c-0.943,0.944-0.943,2.489,0,3.433l7.744,7.752   c0.944,0.943,2.489,0.943,3.433,0L29.049,8.442C29.991,7.498,29.991,5.953,29.049,5.009z" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            @else
                                                <button class="confirmar" data-id="{{ $dado->id }}">
                                                    <span>Confirmar</span>
                                                    <div class="success">
                                                        <svg xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"
                                                            viewBox="0 0 29.756 29.756"
                                                            style="enable-background:new 0 0 29.756 29.756;"
                                                            xml:space="preserve">

                                                            <path
                                                                d="M29.049,5.009L28.19,4.151c-0.943-0.945-2.488-0.945-3.434,0L10.172,18.737l-5.175-5.173   c-0.943-0.944-2.489-0.944-3.432,0.001l-0.858,0.857c-0.943,0.944-0.943,2.489,0,3.433l7.744,7.752   c0.944,0.943,2.489,0.943,3.433,0L29.049,8.442C29.991,7.498,29.991,5.953,29.049,5.009z" />
                                                        </svg>
                                                    </div>
                                                </button>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        <div class="wrapper">
                                            <button class="cancelar" data-id="{{ $dado->id }}">
                                                <span>Cancelar</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>

        </div>


    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".confirmar, .cancelar").click(function() {
                var id = $(this).data("id");
                var status = $(this).hasClass("confirmar") ? "CONFIRMADO" : "CANCELADO";
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                $.ajax({
                    url: "/agendamentos/" + id,
                    type: "PUT",
                    data: {
                        statusAgendamento: status
                    },
                    headers: {
                        'X-CSRF-TOKEN': token
                    },
                    success: function(response) {
                        // Atualize a interface do usuário conforme necessário
                        console.log(response);
                        window.location.href = '/dashboard/cliente/compromissos';
                        Swal.fire({
                            title: 'Horário',
                            html: `Deu Bom`,
                            icon: 'success',
                            // Defina um z-index alto para garantir que o alerta seja exibido acima de outros elementos
                            customClass: {
                                container: 'my-swal',
                            },
                            didOpen: () => {
                                Swal.getPopup().style.zIndex = '9999';
                            }
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>



@endsection
