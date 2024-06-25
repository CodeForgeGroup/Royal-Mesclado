@extends('dashboard.layout-dash.layout')

@section('title', 'Gerente - Estoque')


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



.container {

position: relative;
max-width: 1320px;
width: 100%;
background: #fff;
padding: 40px 30px;
box-shadow: 0 0px 0px rgba(0, 0, 0, 0.2);
perspective: 2700px;
}

    </style>

<div class="container d-flex justify-content-end">

<a href="{{ route('gerente.vendas') }}">
    <ion-icon style="font-size:20pt;margin-left:100%;" name="arrow-back-outline"></ion-icon>
</a>
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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

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
