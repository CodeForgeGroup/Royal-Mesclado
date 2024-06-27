@extends('dashboard.layout-dash.layout')

@section('title', 'Cliente - Agendar')

@section('conteudo')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link rel="stylesheet" href="{{ asset('dashboard/css/styleCalendario.css') }}">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

<style>
    body {
    margin: 0;
    font-family: "Open Sans", sans-serif;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #ffffff;
    background-color: #000;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
}
.c-calendar__style {
    background-color: transparent;
    margin: 20px;
    box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.18);
    -webkit-box-shadow: 0 0 30px 0 rgba(0, 0, 0, 0.18);
    border-radius: 6px;
    -webkit-border-radius: 6px;
}
.o-btn {
    display: inline-block;
    padding: 0 10px;
    line-height: 30px;
    height: 30px;
    background-color: ;
    text-transform: uppercase;
    letter-spacing: 2px;
    border-radius: 15px;
    -webkit-border-radius: 15px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    -webkit-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    color: gainsboro;
    font-weight: 400;
}

.c-cal__cel p {
    position: absolute;
    margin: 0;
    top: 50%;
    left: 50%;
    width: 40px;
    height: 40px;
    line-height: 40px;
    background: #333;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    border-radius: 50%;
    -webkit-border-radius: 50%;
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    -webkit-transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}
header {
    height: 80px;
    width: 100%;
    z-index: 50;
    background: transparent;
}

header .wrapper {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 20px;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    color: black;
    letter-spacing: 2px;
    font-size: 13px;
    padding: 0%;
    margin: 0% 2%;
}

.c-month .prev, .c-month .next {
    position: absolute;
    display: block;
    top: 50%;
    width: 30px;
    height: 30px;
    padding: 9px 12px;
    background-color: #ff6d24;
    cursor: pointer;
    z-index: 10;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    transform: translatey(-50%);
    -webkit-transform: translatey(-50%);
    border-radius: 50%;
    -webkit-border-radius: 50%;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    -webkit-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}


.c-aside__day {
    font-size: 28px;
    margin: 50px 0;
    color: black
}

.c-cal__cel.disabled {
    opacity: 0.5; /* Reduz a opacidade para indicar que está desabilitado */
    pointer-events: none; /* Impede que os cliques sejam registrados nos elementos */
    cursor: default; /* Altera o cursor para o padrão */
}

.c-cal__cel:nth-child(1) p {
    background: #333;
}

.c-cal__cel:nth-child(6) p {
    background: #C81B00;
}

.c-cal__cel:nth-child(7) p {
    background: #C81B00;
}

.o-btn {
    display: inline-block;
    padding: 0 10px;
    line-height: 30px;
    height: 30px;
    background-color: #ff6d24;
    text-transform: uppercase;
    letter-spacing: 2px;
    border-radius: 15px;
    -webkit-border-radius: 15px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    -webkit-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.c-month .prev, .c-month .next {
    position: absolute;
    display: block;
    top: 50%;
    width: 30px;
    height: 30px;
    padding: 9px 12px;
    background-color: #ff6d24;
    cursor: pointer;
    z-index: 10;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    transform: translatey(-50%);
    -webkit-transform: translatey(-50%);
    border-radius: 50%;
    -webkit-border-radius: 50%;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    -webkit-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    color: white;
}

.c-cal__cel.isSelected {
    background-color: gray;
}

.c-cal__cel.isSelected p {
    background: black;
}

.c-aside__day h2{
    color: black;
}
[data-aos][data-aos][data-aos-duration="400"], body[data-aos-duration="400"] [data-aos] {
    transition-duration: 1s;
    }
</style>

<script>
    // fill the month table with column headings
  function day_title(day_name) {
      document.write("<div class='c-cal__col'>" + day_name + "</div>");
    }
    // fills the month table with numbers
  function fill_table(month, month_length, indexMonth) {
    var today = new Date();  // Obter a data atual
    var currentDay = today.getDate();
    var currentMonth = today.getMonth() + 1;  // Mês é baseado em zero, então adicione 1
    var currentYear = today.getFullYear();
      day = 1;
      // begin the new month table
      document.write("<div class='c-main c-main-" + indexMonth + "'>");
      //document.write("<b>"+month+" "+year+"</b>")

      // column headings
      document.write("<div class='c-cal__row'>");
      day_title("Sun");
      day_title("Mon");
      day_title("Tue");
      day_title("Wed");
      day_title("Thu");
      day_title("Fri");
      day_title("Sat");
      document.write("</div>");

      // pad cells before first day of month
      document.write("<div class='c-cal__row'>");
      for (var i = 1; i < start_day; i++) {
        if (start_day > 7) {
        } else {
          document.write("<div class='c-cal__cel c-day'></div>");
        }
      }

      // fill the first week of days
      for (var i = start_day; i < 8; i++) {
        document.write(
          "<div data-day='2022-" +
            indexMonth +
            "-0" +
            day +
            "'class='c-cal__cel'><p>" +
            day +
            "</p></div>"
        );
        day++;
      }
      document.write("</div>");

      // fill the remaining weeks
      while (day <= month_length) {
        document.write("<div class='c-cal__row'>");
        for (var i = 1; i <= 7 && day <= month_length; i++) {
          if (day >= 1 && day <= 9) {
            document.write(
              "<div data-day='2022-" +
                indexMonth +
                "-0" +
                day +
                "'class='c-cal__cel'><p>" +
                day +
                "</p></div>"
            );
            day++;
          } else {
            document.write(
              "<div data-day='2022-" +
                indexMonth +
                "-" +
                day +
                "' class='c-cal__cel'><p>" +
                day +
                "</p></div>"
            );
            day++;
          }
        }
        document.write("</div>");
        // the first day of the next month
        start_day = i;
      }

      document.write("</div>");
    }
  </script>
  <div data-aos="fade-left" style="display:">
<header>
    <div class="wrapper">
      <div class="c-monthyear">
      <div class="c-month">
          <span id="prev" class="prev fa fa-chevron-left" aria-hidden="true"></span>
          <div id="c-paginator">
            <span class="c-paginator__month" style="left: 900%;">OUTUBRO</span>
            <span class="c-paginator__month" style="left: 1000%;">NOVEMBRO</span>
            <span class="c-paginator__month" style="left: 1100%;">DEZEMBRO</span>
            <span class="c-paginator__month" style="left: 0%;">JANEIRO</span>
            <span class="c-paginator__month" style="left: 100%;">FEVEREIRO</span>
            <span class="c-paginator__month" style="left: 200%;">MARÇO</span>
            <span class="c-paginator__month" style="left: 300%;">ABRIL</span>
            <span class="c-paginator__month" style="left: 400%;">MAIO</span>
            <span class="c-paginator__month" style="left: 500%;">JUNHO</span>
            <span class="c-paginator__month" style="left: 600%;">JULHO</span>
            <span class="c-paginator__month" style="left: 700%;">AGOSTO</span>
            <span class="c-paginator__month" style="left: 800%;">SETEMBRO</span>
          </div>
          <span id="next" class="next fa fa-chevron-right" aria-hidden="true"></span>
        </div>
        <span class="c-paginator__year">2024</span>
      </div>
      <div class="c-sort">
        <a onclick="window.dialog.showModal();" class="primary o-btn funcs" href="javascript:;">FUNCIONARIOS</a>
        <style>
            dialog {
	    padding: 1rem 3rem;
	    background: white;
	    max-width: 400px;
	    padding-top: 2rem;
	    border-radius: 20px;
	    border: 0;
	    box-shadow: 0 5px 30px 0 rgb(0 0 0 / 10%);
	    animation: fadeIn 1s ease both;
	    &::backdrop {
	    	animation: fadeIn 1s ease both;
	    	background: rgb(255 255 255 / 40%);
	    	z-index: 2;
	    	backdrop-filter: blur(20px);
	    }
    }
	.x {
		filter: grayscale(1);
		border: none;
		background: none;
		position: absolute;
		top: 15px;
		right: 10px;
		transition: ease filter, transform 0.3s;
		cursor: pointer;
		transform-origin: center;
		&:hover {
			filter: grayscale(0);
			transform: scale(1.1);
		}
	}
    button.primary {
	display: inline-block;
	font-size: 0.8rem;
	color: #fff !important;
	background: rgb(var(--vs-primary) / 100%);
	padding: 13px 25px;
	border-radius: 17px;
	transition: background-color 0.1s ease;
	box-sizing: border-box;
	transition: all 0.25s ease;
	border: 0;
	cursor: pointer;
	box-shadow: 0 10px 20px -10px rgb(var(--vs-primary) / 50%);
	&:hover {
		box-shadow: 0 20px 20px -10px rgb(var(--vs-primary) / 50%);
		transform: translateY(-5px);
	}
}

@keyframes fadeIn {
	from {
		opacity: 0;
	}
	to {
		opacity: 1;
	}
}


.container {
  width: 100%;
  display: flex;
  justify-content: center;
  height: 500px;
  gap: 10px;
  margin-top: 3%;
  > div {
    flex: 0 0 120px;
    border-radius: 0.5rem;
    transition: 0.5s ease-in-out;
    cursor: pointer;
    box-shadow: 1px 5px 15px #1e0e3e;
    position: relative;
    overflow: hidden;
    background-position: top;

    /* &:nth-of-type(1) {
      background: url("https://images.pexels.com/photos/1845208/pexels-photo-1845208.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260")
        no-repeat 50% / cover;
    }
    &:nth-of-type(2) {
      background: url("https://images.pexels.com/photos/36469/woman-person-flowers-wreaths.jpg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260")
        no-repeat 50% / cover;
    }
    &:nth-of-type(3) {
      background: url("https://images.pexels.com/photos/1468379/pexels-photo-1468379.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260")
        no-repeat 50% / cover;
    }
    &:nth-of-type(4) {
      background: url("https://images.pexels.com/photos/247322/pexels-photo-247322.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260")
        no-repeat 50% / cover;
    } */


    .content {
      font-size: 1.5rem;
      color: #fff;
      display: flex;
      align-items: center;
      padding: 15px;
      opacity: 0;
      flex-direction: column;
      height: 100%;
      justify-content: flex-end;
      background: rgb(46, 32, 2);
      background: linear-gradient(
        0deg,
        rgba(255, 153, 0, 0.062) 0%,
        rgba(255, 153, 0, 0) 100%
      );
      transform: translatey(100%);
      transition: opacity 0.5s ease-in-out, transform 0.5s 0.2s;
      visibility: hidden;

      span {
        display: block;
        margin-top: 5px;
        font-size: 1.2rem;
      }
    }

    &:hover {
      flex: 0 0 250px;
      box-shadow: 1px 3px 15px #ff6d24
      transform: translatey(-30px);
    }

    &:hover .content {
      opacity: 1;
      transform: translatey(0%);
      visibility: visible;
    }
  }
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
        <dialog style="z-index: -11;" class="container-xxl" id="dialog">
            <h2 style="text-align: center">Funcionarios & Horarios</h2>
            <div style="display: flex;">
                <div class="container modalFunc" id="funcionariosContainer">

                </div>

            </div>

            <div id="teste">
            <h2 id="h2Horarios" style="text-align: center;margin-top:5%;"></h2>
            <div id="horariosContainer" style="margin-top:1%;display: flex;flex-wrap: wrap;justify-content: center;">

            </div>
            </div>
            <button onclick="window.dialog.close();" aria-label="close" class="x" id="fecharModal">❌</button>
        </dialog>
        <a id="agendarBTN" onclick="cadastrarAgendamento();" class="o-btn" style="display: none;" href="javascript:;">AGENDAR</a>
      </div>
    </div>
  </header>
<div class="c-calendar">
    <div class="c-calendar__style c-aside">
      <h2 style="color: black; font-weight:600;">Agendamento</h2>
      <div class="c-aside__day">
        <h2>Data</h2><span class="c-aside__num"></span> <span class="c-aside__month"></span>
      </div>
      <div style="display: block" class="c-aside__day" id="c-aside-day">
        {{-- <span>{{ request()->get('id_servico') }}</span> <!-- Exemplo com o ID do serviço --> --}}
        <div><h2>Serviço</h2><span>{{ request()->get('nome_servico') }}</span></div> <br> <!-- Exemplo com o nome do serviço -->
        <div><h2>Valor</h2><span> R${{ request()->get('valor_servico') }}</span></div> <br>
        @php
           // Supondo que $item->duracaoServico contenha a duração no formato HH:MM:SS
        $duracao = \Carbon\CarbonInterval::createFromFormat('H:i:s', request()->get('duracao_servico'));
        $formattedDuracao = $duracao->format('%H:%I');
        @endphp

        <div><h2>Duração</h2><span>{{ $formattedDuracao }} Hr.</span></div>

    </div>
    </div>
    <div class="c-cal__container c-calendar__style">
      <script>

      // CAHNGE the below variable to the CURRENT YEAR
      year = 2024;

      // first day of the week of the new year
      today = new Date("January 1, " + year);
      start_day = today.getDay() + 1;
      fill_table("January", 31, "01");
      fill_table("February", 28, "02");
      fill_table("March", 31, "03");
      fill_table("April", 30, "04");
      fill_table("May", 31, "05");
      fill_table("June", 30, "06");
      fill_table("July", 31, "07");
      fill_table("August", 31, "08");
      fill_table("September", 30, "09");
      fill_table("October", 31, "10");
      fill_table("November", 30, "11");
      fill_table("December", 31, "12");
      </script>
    </div>
  </div>

  <div class="c-event__creator c-calendar__style js-event__creator">
    <a href="javascript:;" class="o-btn js-event__close">CLOSE <span class="fa fa-close"></span></a>
    <form id="addEvent">
      <input placeholder="Event name" type="text" name="name">
      <input type="date" name="date">
      <textarea placeholder="Notes" name="notes" cols="30" rows="10"></textarea>
      <select name="tags">
          <option value="event">event</option>
          <option value="important">important</option>
          <option value="birthday">birthday</option>
          <option value="festivity">festivity</option>
        </select>
    </form>
    <br>
    <a href="javascript:;" class="o-btn js-event__save">SAVE <span class="fa fa-save"></span></a>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="{{ asset('dashboard/js/scriptCalendario.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</div>

<script>


document.addEventListener('DOMContentLoaded', function() {
    const funcionariosButton = document.querySelector('.funcs');
    funcionariosButton.addEventListener('click', function() {
        console.log('Botão de funcionários clicado!');

        // Limpa o contêiner de funcionários antes de adicionar novos
        const container = document.getElementById('funcionariosContainer');
        container.innerHTML = '';

        // Recupera a data selecionada
        const asideDay = document.querySelector('.c-aside__day');
        const day = asideDay.querySelector('.c-aside__num').textContent;
        const month = asideDay.querySelector('.c-aside__month').textContent;

        // Enviar a data selecionada para o controlador usando AJAX
        $.ajax({
            url: '{{ route('funcs2') }}',
            method: 'GET',
            data: {
                day: day,
                month: month
            },
            success: function(response) {
                // Chamada da função para preencher os funcionários com base na resposta
                preencherFuncionarios(response);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

// Função para preencher os funcionários e horários
function preencherFuncionarios(funcionarios) {
    // Seleciona o contêiner de funcionários
    const container = document.getElementById('funcionariosContainer');

    // Itera sobre os funcionários recebidos
    funcionarios.forEach(function(funcionario) {
        // Cria um novo bloco de funcionário
        const divFuncionario = document.createElement('div');
        divFuncionario.classList.add('funcionario'); // Adiciona a classe 'funcionario' para identificar os elementos dos funcionários
        console.log(funcionario.fotoFuncionario);
        if(funcionario.fotoFuncionario == 'SEM IMAGEM'){
            divFuncionario.style.backgroundImage = 'url({{ asset('images/royalBarberFunc.png') }})';
        }else{
        divFuncionario.style.backgroundImage = 'url(/storage/' + funcionario.fotoFuncionario + ')';
        }
        divFuncionario.setAttribute('data-funcionario-id', funcionario.id);

        // Cria o conteúdo do bloco de funcionário
        const divContent = document.createElement('div');
        divContent.classList.add('content');
        divContent.classList.add('funcionario-selecionado');
        divContent.setAttribute('data-funcionario-id', funcionario.id); // Adiciona o ID do funcionário como um atributo de dados
        const h2 = document.createElement('h2');
        h2.classList.add('nomeFuncionario');
        const h3 = document.createElement('h3');
        h2.style.color = 'gainsboro';
        h2.textContent = funcionario.nomeFuncionario + ' ' + funcionario.sobrenomeFuncionario;
        h3.style.color = 'gainsboro';
        h3.textContent = 'Especialidade: ' + funcionario.especialidadeFuncionario;
        // Adiciona o nome do funcionário ao bloco
        divContent.appendChild(h2);
        divContent.appendChild(h3);
        divFuncionario.appendChild(divContent);

        // Adiciona o bloco de funcionário ao contêiner
        container.appendChild(divFuncionario);
    });
}


// Evento de clique da div do funcionário
document.addEventListener('click', function(event) {
    if (event.target.classList.contains('content')) {
        // Recupera o ID do funcionário associado a esta div
        const funcionarioId = event.target.getAttribute('data-funcionario-id');
        console.log('Funcionário clicado - ID:', funcionarioId);
        const urlParams = new URLSearchParams(window.location.search);
        const servicoId = urlParams.get('id_servico');

        // Recupera o nome do funcionário clicado
        const nomeFuncionario = event.target.querySelector('h2').textContent;

        // Recupera a data selecionada
        const asideDay = document.querySelector('.c-aside__day');
        const day = asideDay.querySelector('.c-aside__num').textContent;
        const month = asideDay.querySelector('.c-aside__month').textContent;

        // Envia uma solicitação AJAX para o servidor para obter os horários disponíveis para o funcionário e data selecionados
        $.ajax({
            url: '{{ route('consultaH') }}',
            method: 'GET',
            data: {
                funcionario_id: funcionarioId,
                day: day,
                month: month,
                nome_funcionario: nomeFuncionario,
                idServico: servicoId
            },
            success: function(response) {
            // Chamada da função para preencher a estrutura de horários com base na resposta
            preencherHorarios(response);
            // Chama a função para capturar o horário selecionado pelo usuário
            capturarHorarioSelecionado(response); // Passando o objeto de resposta para capturarHorarioSelecionado
            cadastrarAgendamento(response);
        },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
});


function preencherHorarios(dados, nomeFuncionario) {

    // Seleciona o contêiner de horários
    const h2Horarios = document.getElementById('h2Horarios');
    h2Horarios.textContent = 'Horários'

    const horariosContainer = document.getElementById('horariosContainer');

    // Limpa o conteúdo existente dentro do contêiner
    horariosContainer.innerHTML = '';

    // Verifica se horariosDisponiveis é um array
    // Suponha que 'dados' seja o objeto JSON retornado
    if (Array.isArray(dados.horarios_disponiveis)) {
        // Itera sobre os horários disponíveis recebidos
        dados.horarios_disponiveis.forEach(function(horario) {
            // Cria um novo bloco de horário
            const divHorario = document.createElement('div');
            divHorario.textContent = horario.horarios;
            divHorario.style.fontSize = '13pt';
            divHorario.classList.add('btn', 'btn-outline-primary', 'm-2', 'selecaoHorario');
            // Define o ID do horário como um atributo no elemento HTML
            divHorario.setAttribute('horario-id', horario.horario_id); // Adiciona o ID do horário como atributo
            // Adiciona o bloco de horário ao contêiner
            horariosContainer.appendChild(divHorario);
        });
    } else {
        console.error('horariosDisponiveis não é um array:', dados.horarios_disponiveis);
    }

}



    // Evento de clique da div do funcionário
    divFuncionario.addEventListener('click', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const servicoId = urlParams.get('id_servico');
        // Recupera o ID do funcionário associado a esta div
        const funcionarioId = this.getAttribute('data-funcionario-id');
        console.log('Funcionário clicado - ID:', funcionarioId);
        const idHorario = event.target.getAttribute('horario-id');
        const asideDay = document.querySelector('.c-aside__day');
            const day = asideDay.querySelector('.c-aside__num').textContent;
            const month = asideDay.querySelector('.c-aside__month').textContent;
            console.log(day);
            console.log(month);

        // Recupera a data selecionada (você já possui esse código)

        // Envia uma solicitação AJAX para o servidor para obter os horários disponíveis para o funcionário e data selecionados
        $.ajax({
            url: '{{ route('consultaH') }}', // Substitua 'URL_PARA_SUA_ROTA_SQL' pela URL do seu endpoint que executa a consulta SQL
            method: 'GET',
            data: {
                funcionario_id: funcionarioId,
                day:day,
                month:month,
                nome_funcionario: nomeFuncionario,
                idServico: servicoId
            },
            success: function(response) {
            // Chamada da função para preencher a estrutura de horários com base na resposta
            preencherHorarios(response);
            // Chama a função para capturar o horário selecionado pelo usuário
            capturarHorarioSelecionado(response); // Passando o objeto de resposta para capturarHorarioSelecionado
            cadastrarAgendamento(response);
        },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });

    function capturarHorarioSelecionado(dados) {
    const horariosDisponiveis = document.querySelectorAll('.selecaoHorario');
    horariosDisponiveis.forEach(function(horario) {
        horario.addEventListener('click', function() {

            var clienteId = {{ $cliente->id }};
            const horarioSelecionado = this.textContent;
            const funcionarioSelecionado = document.querySelector('.funcionario-selecionado');
            const nomeFuncionario = dados.nome_funcionario;
            const idFunc = dados.funcionario_id;
            const idHorario = this.getAttribute('horario-id');

            console.log(dados.email_funcionario);
            console.log('idFuncionario: ' + dados.funcionario_id);
            console.log('Nome: '+dados.nome_funcionario);
            console.log('IdFuncData: ' + dados.funcionario_id);


            // localStorage.setItem('horarioSelecionado', horarioSelecionado);
            // localStorage.setItem('funcionarioSelecionado', funcionarioSelecionado);
            // localStorage.setItem('nomeFunc', nomeFuncionario);
            // localStorage.setItem('idFunc', idFunc);

            console.log('iDFuncionario: ' + idFunc);
            console.log('iDHorario: ' + idHorario);
            console.log('iDCliente: ' + clienteId);

            const asideDay = document.getElementById('c-aside-day');

            // Crie novos elementos para adicionar as informações do funcionário e do horário
            const divFuncionarioHorario = document.createElement('div');
            const divFuncionario = document.createElement('div');
            const divHorario = document.createElement('div');
            const dividFunc = document.createElement('div');
            const dividHorario = document.createElement('div');

            // Adicione as classes necessárias aos novos elementos
            divFuncionarioHorario.classList.add('funcionario-horario');
            divFuncionario.classList.add('funcionario-info');
            divHorario.classList.add('horario-info');
            dividFunc.classList.add('id-info');
            dividHorario.classList.add('id-horario');


            // Insira as informações do funcionário e do horário nos novos elementos
            divFuncionario.innerHTML = `<br><h2>Funcionário</h2><span>${nomeFuncionario}</span><br>`;
            divHorario.innerHTML = `<br><h2>Horário</h2><span class="horarioSelecionado">${horarioSelecionado}</span>`;
            dividFunc.innerHTML = `<br><h2 style="display:none;">${idFunc}</h2>`;
            dividHorario.innerHTML = `<br><h2 style="display:none;">${idHorario}</h2>`

            // Adicione os novos elementos à coluna existente
            divFuncionarioHorario.appendChild(divFuncionario);
            divFuncionarioHorario.appendChild(divHorario);
            divFuncionarioHorario.appendChild(dividFunc);
            divFuncionarioHorario.appendChild(dividHorario);
            asideDay.appendChild(divFuncionarioHorario);
            Swal.fire({
                title: 'Horário Selecionado!',
                html: `Funcionário: ${nomeFuncionario}<br>Horário: ${horarioSelecionado}`,
                icon: 'success',
                // Defina um z-index alto para garantir que o alerta seja exibido acima de outros elementos
                customClass: {
                    container: 'my-swal',
                },
                didOpen: () => {
                    Swal.getPopup().style.zIndex = '9999';
                }
            });
            window.dialog.close();
            const agendarBtn = document.getElementById('agendarBTN');
            agendarBtn.style.display = 'inline-block';
        });
    });
}


// Definir a função cadastrarAgendamento com o parâmetro 'dados'
function cadastrarAgendamento(dados) {

    $(document).on('click', '#agendarBTN', function() {
    // Mostrar o loading
    Swal.fire({
        title: 'Aguarde...',
        html: 'Estamos processando seu agendamento.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });
});

    var clienteId = {{ $cliente->id }};
    const urlParams = new URLSearchParams(window.location.search);
    const servicoId = urlParams.get('id_servico');
    let $idFunc = document.querySelector('.id-info').textContent.trim();  // trim() para remover espaços em branco
    let $idHorario = document.querySelector('.id-horario').textContent.trim();  // trim() para remover espaços em branco

    const asideDay = document.querySelector('.c-aside__day');
    let day = asideDay.querySelector('.c-aside__num').textContent.trim();  // trim() para remover espaços em branco
    let monthM = asideDay.querySelector('.c-aside__month').textContent.trim();  // trim() para remover espaços em branco

    let horarioSelecionado = document.querySelector('.horarioSelecionado').textContent.trim();  // trim() para remover espaços em branco

    // Converter os meses para números
    const monthMap = {
        'Abril': 4,
        'Maio': 5,
        'Junho': 6,
        'Julho': 7,
        'Agosto': 8,
        'Setembro': 9,
        'Outubro': 10,
        'Novembro': 11,
        'Dezembro': 12
    };
    let $mes = monthMap[monthM];
    let $dia = day;

    console.log(clienteId, servicoId, $idFunc, $idHorario, $dia, $mes, horarioSelecionado);

    // Criar uma nova instância de data usando o ano fixo '2024', mês e dia
    let dataHorarios = new Date(`2024-${$mes}-${$dia}`);

    // Formatar a data como 'YYYY-MM-DD'
    dataHorarios = dataHorarios.toISOString().slice(0, 10);

    console.log(dataHorarios);

    const dadosAgendamento = {
        funcionario_id: $idFunc,
        cliente_id: clienteId,
        servico_id: servicoId,
        horario_id: $idHorario,
        dataAgendamento: dataHorarios,
        horarioSelecionado: horarioSelecionado
    };

    // Obter o token CSRF do meta tag
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    console.log(dadosAgendamento);

    // Enviar uma solicitação POST para a rota de armazenamento
    $.ajax({
        url: '{{ route('agendamentos.store') }}', // URL da rota de armazenamento
        method: 'POST',
        data: dadosAgendamento,
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function(response) {
            console.log(response);


            $.ajax({
                url: '{{ route('email.cliente') }}',
                method: 'POST',
                data: { cliente_id: clienteId },
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(response) {
                    console.log('E-mail enviado para o cliente:', response);
                },
                error: function(xhr) {
                    console.error('Erro ao enviar e-mail para o cliente:', xhr.responseText);
                }
            });

            if ($idFunc) {

                $.ajax({
                    url: '{{ route('email.func') }}',
                    method: 'GET',
                    data: { funcionario_id: $idFunc },
                    success: function(response) {
                        console.log(response.emailFuncionario);
                        var emailFuncionario = response.emailFuncionario;



                        Swal.fire({
                        title: 'Agendamento Confirmado!',
                        html: 'Seu agendamento foi realizado com sucesso. Acesse seu e-mail para mais informações!',
                        icon: 'success',
                        customClass: {
                        container: 'my-swal',
                        },
                        didOpen: () => {
                            Swal.getPopup().style.zIndex = '9999';
                        }
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Redirecionar para outra página após o usuário clicar em "Ok"
                            window.location.href = '{{ route('compromissos') }}'; // Substitua '/outra-pagina' pela URL desejada
                        }});




                    },
                    error: function(xhr) {
                        console.error('Erro ao recuperar o e-mail do funcionário:', xhr.responseText);
                    }
                });
            } else {
                console.error('ID do funcionário inválido');
            }
        },
        error: function(xhr, status, error) {
            console.error('Erro ao cadastrar agendamento:', error, xhr.responseText);
        }
    });
}



// Selecionar o botão de agendamento
const buttonAgendar = document.getElementById('agendarBTN');

// Adicionar um evento de clique ao botão de agendamento
buttonAgendar.addEventListener('click', function() {
    // Chamando a função cadastrarAgendamento e passando 'dados' como argumento
    cadastrarAgendamento(dados);
});



</script>



@endsection
