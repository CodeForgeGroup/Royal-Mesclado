@extends('dashboard.layout-dash.layout')

@section('title', 'Vendas barbeiro')

<link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">


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

        .nomeProduto select {
            margin-top: 15px;
            height: 100%;
            outline: none;
            border: none;
            padding: 10px;
            font-size: 16px;
            font-weight: 500;
            color: gray;
            transition: all 0.3s ease;
            background-color: transparent;
        }

        .nomeProduto {
            border-bottom: 2px solid rgba(0, 0, 0, 0.2);
            border-color: var(--primary);
            width: 40%
        }

        .topo {
            color: #ff6d24;
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
            box-shadow: 0 0 0.8em rgba(83, 83, 83, 0.3), 0 0 0.8em hsla(0, 0%, 0%, 0.3);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
            margin-top: 0%;
            width: 205px;
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
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="text-black font-weight-bolder  mb-0">Bem vindo ao relatório de vendas,
                    {{ ucfirst(session('nome')) }}!</h6>
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ ucfirst(session('cargo')) }}
                    </li>
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


        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">quantidade vendida</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        {{ $qtdVendas }}

                                        {{-- @if ($porcentagemVendas >= 0)
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $porcentagemVendas }}%</span>
                                        @else
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $porcentagemVendas }}%</span>
                                        @endif --}}
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Func. que mais vendeu</p>
                                    <h5 class=" text-white font-weight-bolder mb-0">
                                       @if ($funcionarioMes == null)
                                        Sem Registro!
                                       @else
                                       {{ $funcionarioMes }} / R$
                                       {{ number_format($comissao, 2, ',', '.') }}

                                       @endif
                                        {{-- @if ($porcentagemCliente >= 0)
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $porcentagemCliente }}%</span>
                                        @else
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $porcentagemCliente }}%</span>
                                        @endif --}}
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">faturamento</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        R$ {{ number_format($faturamento, 2, ',', '.') }}
                                        {{-- @if ($porcentagemComissao >= 0)
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $porcentagemComissao }}%</span>
                                        @else
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $porcentagemComissao }}%</span>
                                        @endif --}}
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Lucro</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        R$ {{ number_format($lucro, 2, ',', '.') }}
                                        {{-- @if ($produtoMaisVendido == null)
                                            Sem vendas!
                                        @else
                                            {{ $produtoMaisVendido->nomeVenda }} / {{ $produtoMaisVendido->totalVendas }}
                                        @endif --}}
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




        <div class="row my-4">

            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6 class="text-white">Ultimas vendas!</h6>
                            </div>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Funcionário</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
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
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold" id="meuInput"
                                                    contenteditable="true">{{ $item->funcionario->nomeFuncionario }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-white font-weight-bold" id="meuInput"
                                                    contenteditable="true">{{ $item->nomeVenda }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold" id="meuInput"
                                                    contenteditable="true">{{ $item->descricaoVenda }}</span>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span
                                                    class="text-xs font-weight-bold">R${{ number_format((float) $item->valorVenda, 2, ',', '.') }}</span>
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

                    <div>
                        <div class="card-header pb-0">
                            <h6 class="text-white">Adicione uma nova venda!</h6>
                        </div>
                        <hr class="horizontal mt-0" style="background-color: orange">

                        <form action="{{ route('gerente.vendas.create') }}" id="formVenda" method="POST">

                            @csrf
                            @method('POST')


                            <div class="formulario">
                                <div class="input-box nomeProduto">
                                    <select value="{{ old('nomeVenda') }}" placeholder="Nome do produto:" id="nomeVenda" name="nomeVenda">
                                        <option value="">Selecione um nome</option>
                                        @foreach ($produtos as $produto)
                                            <option value="{{ $produto->nomeProduto }}">{{ $produto->nomeProduto }}
                                            </option>
                                        @endforeach
                                    </select>

                                </div>
                                @error('nomeVenda')
                                <div class="alert alert-danger" style="color:white;">{{ $message }}</div>
                            @enderror
                                <div class="input-box">
                                    <input type="text" value="{{ old('valorVenda') }}"
                                        placeholder="Valor do produto:" id="valorVenda" name="valorVenda">

                                        @error('valorVenda')
                                        <div class="alert alert-danger" style="color:white;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-box">
                                    <input type="text" value="{{ old('qntVenda') }}"
                                        placeholder="Quantidade vendida:" id="qntVenda" name="qntVenda">

                                        @error('qntVenda')
                                        <div class="alert alert-danger" style="color:white;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-box">
                                    <input type="text" value="{{ old('descricaoVenda') }}"
                                        placeholder="Descrição do produto:" id="descricaoVenda"
                                        name="descricaoVenda">

                                        @error('descricaoVenda')
                                        <div class="alert alert-danger" style="color:white;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="button enviar input-box">
                                    <input type="submit" id="sucessoVenda" value="enviar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">

                <div class="d-flex justify-content-end">
                    <a href="{{ route('produto.esgotado') }}" class="justify-end">
                        <button class="cssbuttons-io-button" style="margin-bottom:55px; margin-top:35px; ">Esgotados
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
                <div class="d-flex justify-content-end">
                    <a href="{{ route('adc.produto') }}" class="justify-end">
                        <button class="cssbuttons-io-button" style="margin-bottom:55px; margin-top:35px; margin-left:30px;">Adicionar
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


            </div>


            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
                    style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <h6 class="section-title bg-white text-center text-primary px-3">Relatório de produtos da barbearia
                    </h6>
                    <h1 class="mb-5">Produtos</h1>
                </div>

                <div style="background:transparent;" class="container-fluid">
                    <div class="table-responsive">

                        <table class="table table-striped custom-table">
                            <thead>
                                <tr>
                                    <th scope="col">Foto Produto</th>
                                    <th scope="col">Nome Produto</th>
                                    <th scope="col" style="text-align: center;">Valor</th>
                                    <th scope="col" style="text-align: center;">Quantidade no estoque</th>
                                    <th scope="col">Descrição produto</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produtos as $dado)
                                    <tr scope="row">
                                        <td style="padding: 5px;">
                                            @if (empty($dado->fotoProduto) || $dado->fotoProduto === 'SEM IMAGEM')
                                                <img style="width:50px;border-radius:40px;margin-left:20%;"
                                                    src="{{ asset('images/icons/adicionar-usuario.png') }}"
                                                    alt="Imagem Padrão">
                                            @else
                                                <img style="width:50px;border-radius:40px;margin-left:20%;"
                                                    src="{{ asset('storage/' . $dado->fotoProduto) }}"
                                                    alt="Foto do Produto {{ $dado->nomeProduto }}">
                                            @endif
                                        </td>
                                        <td style="text-align: center;">{{ ucfirst($dado->nomeProduto) }}</td>
                                        <!-- Adicione outras propriedades conforme necessário -->
                                        <td style="text-align: center">R$
                                            @php
                                                $dado->valorProduto = (float)$dado->valorProduto;

                                            @endphp
                                            {{ number_format($dado->valorProduto, 2, ',', '.') }}</td>
                                        <td style="text-align: center;">{{ $dado->estoqueProduto }}</td>
                                        <td style="text-align: center;">{{ ucfirst($dado->descricaoProduto) }}</td>
                                        <td style="text-align: center;">{{ strtoupper($dado->statusProduto) }}</td>
                                        <td>
                                            <div class="wrapper">
                                                <a href="{{ route('edit.produto', ['id' => $dado->id]) }}">
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
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>


                </div>


            </div>


        </div>


        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Venda realizada com sucesso!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    customClass: {
                        container: 'my-swal',
                    },
                    didOpen: () => {
                        Swal.getPopup().style.zIndex = '9999';
                    }
                });
            </script>
        @endif



    @endsection
