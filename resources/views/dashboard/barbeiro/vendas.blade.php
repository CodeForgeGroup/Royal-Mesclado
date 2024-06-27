@extends('dashboard.layout-dash.layout')

@section('title', 'Vendas barbeiro')

<link rel="stylesheet" href="{{ asset('dashboard/css/style.css') }}">

<style>
    .topo{
        color: #ff6d24;
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
</style>

@section('conteudo')
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <h6 class="text-black font-weight-bolder  mb-0">Visualize suas vendas, {{ ucfirst(session('nome')) }}!</h6>
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ucfirst(session('cargo')) }}</li>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">quantidade de produto</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        {{ $vendasTotal }}

                                        @if ($porcentagemVendas >= 0)
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $porcentagemVendas }}%</span>
                                        @else
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $porcentagemVendas }}%</span>
                                        @endif
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Quantidade de Registros</p>
                                    <h5 class=" text-white font-weight-bolder mb-0">
                                        {{ $clientesTotal }}
                                        @if ($porcentagemCliente >= 0)
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $porcentagemCliente }}%</span>
                                        @else
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $porcentagemCliente }}%</span>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Comissão</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        R$ {{ number_format($comissao, 2, ',', '.') }}
                                        @if ($porcentagemComissao >= 0)
                                            <span
                                                class="text-success text-sm font-weight-bolder">{{ $porcentagemComissao }}%</span>
                                        @else
                                            <span
                                                class="text-danger text-sm font-weight-bolder">{{ $porcentagemComissao }}%</span>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold topo">Mais vendido / quantidade</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        @if ($produtoMaisVendido == null)
                                            Sem vendas!
                                        @else
                                            {{ $produtoMaisVendido->nomeVenda }} / {{ $produtoMaisVendido->totalVendas }}
                                        @endif
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
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Registro</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Nome</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Descrição</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Preço</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            quantidade</th>
                                    </tr>
                                </thead>



                                <tbody>
                                    @foreach ($vendas as $item)
                                        <tr>
                                            <td class="align-middle text-center text-sm">
                                                <span class="text-xs font-weight-bold" id="meuInput"
                                                    contenteditable="true">{{ $item->id }}</span>
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

                        <form action="{{ route('barbeiro.vendas.create') }}" id="formVenda" method="POST">

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
