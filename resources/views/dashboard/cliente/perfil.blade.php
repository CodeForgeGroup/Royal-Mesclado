@extends('dashboard.layout-dash.layout')

@section('title', 'Cliente - Agendar')

@section('conteudo')

<style>
     [data-aos][data-aos][data-aos-duration="400"], body[data-aos-duration="400"] [data-aos] {
    transition-duration: 1s;
    }
</style>

<div data-aos="fade-left" class="container-fluid">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('http://127.0.0.1:8000/../dashboard/img/fundoPerfil.png'); background-position-y: 50%;">
    </div>
    <div class="card card-body blur shadow-blur mx-4 mt-n6 overflow-hidden">
        <div class="row gx-4">
            <div class="col-auto">
                <div style="cursor: pointer;" class="avatar avatar-xl position-relative">
                    @if (empty($cliente->fotoCliente) || $cliente->fotoCliente === "SEM IMAGEM")
                        <label for="profileImageUpload">
                            <img src="{{ asset('images/icons/adicionar-usuario.png') }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </label>
                    @else
                        <label for="profileImageUpload">
                            <img src="{{ asset('storage/' . $cliente->fotoCliente) }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                        </label>
                    @endif
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ ucfirst($cliente->nomeCliente) }} {{ ucfirst($cliente->sobrenomeCliente) }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                       Agendamentos realizados: {{ $cliente->qtdCortesCliente }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div data-aos="fade-left" class="container-fluid py-4">

    <div class="row">
        <div class="">

            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 style="color: white;" class="mb-0 text-orange">Informações pessoais</h6>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{ route('cliente.edit', ['id' => $cliente->id]) }}">
                                <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="" aria-hidden="true" data-bs-original-title="Editar" aria-label="Editar"></i><span class="sr-only">Editar</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <hr class="horizontal white my-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm text-light"><strong class="text-white">Nome
                                completo:</strong>
                            &nbsp;  {{ ucfirst($cliente->nomeCliente) }} {{ ucfirst($cliente->sobrenomeCliente) }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Número:</strong>
                            &nbsp;
                            {{ '(' . substr($cliente->telefoneCliente, 0, 2) . ') ' . substr($cliente->telefoneCliente, 2, 5) . '-' . substr($cliente->telefoneCliente, 7) }}
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Email:</strong>
                            &nbsp;
                            {{ $cliente->emailCliente }}</li>
                        <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Endereço:</strong>
                            &nbsp; {{ $cliente->enderecoCliente }}</li>
                            <li class="list-group-item border-0 ps-0 text-sm text-light">
                                <strong class="text-white">Cadastro:</strong>
                                &nbsp; {{ $cliente->created_at->format('d/m/Y') }}
                            </li>
                    </ul>
                </div>
            </div>

        </div>

        <div style="display: none;" class="">

            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-8 d-flex align-items-center">
                            <h6 style="color: white;" class="mb-0 text-orange">Informações profissionais</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <p class="text-sm text-light">

                    </p>
                    <hr class="horizontal gray-light my-4">
                    <ul class="list-group">
                        <li class="list-group-item border-0 ps-0 pt-0 text-sm text-light"><strong class="text-white">Início
                                expediente:</strong>
                            &nbsp; 10:00:00</li>
                        <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Fim
                                expediente:</strong>
                            &nbsp;
                            18:00:00
                        </li>
                        <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Salário:</strong>
                            &nbsp;
                            R$1.400,00</li>
                        <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Contratado:</strong>
                            &nbsp; 10/05/2024</li>
                        <li class="list-group-item border-0 ps-0 text-sm text-light"><strong class="text-white">Ultima
                                atualização:</strong>
                            &nbsp; 10/05/2024</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>



    </div>

@endsection
