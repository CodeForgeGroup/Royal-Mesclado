@extends('dashboard.layout-dash.layout')


@section('title', 'Cliente - Agendar')

@section('conteudo')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css"
        integrity="sha512-OQDNdI5rpnZ0BRhhJc+btbbtnxaj+LdQFeh0V9/igiEPDiWE2fG+ZsXl0JEH+bjXKPJ3zcXqNyP4/F/NegVdZg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        small {
            color: black;
        }

        [data-aos][data-aos][data-aos-duration="400"],
        body[data-aos-duration="400"] [data-aos] {
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

    <link rel="stylesheet" href="{{ asset('dashboard/css/styleServico.css') }}">

    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="text-black font-weight-bolder  mb-0">Gerencie os serviços disponíveis, {{ ucfirst(session('nome')) }}!</h6>
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

    <div data-aos="fade-left" class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s"
                style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                <h6 class="section-title bg-white text-center text-primary px-3">Serviços</h6>
                <h1 class="mb-5">Cortes e Designs Populares</h1>
            </div>


            <div class="d-flex justify-content-end">

                <div class="d-flex justify-content-end">
                    <a href="{{ route('gerente.servInativos') }}" class="justify-end">
                        <button class="cssbuttons-io-button" style="  margin-bottom:40px;">Desativados
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
                    <a href="{{ route('adc.servico') }}" class="justify-end">
                        <button class="cssbuttons-io-button" style="  margin-bottom:40px; margin-left:100px;">Adicionar
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


            <div class="row g-4 justify-content-center">
                @foreach ($servico as $item)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s"
                        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <div style="border-radius: 20px;" class="course-item bg-light">

                            <div class="d-flex justify-content-end" style="margin-bottom: -40px;">
                                <a href="{{ route('gerente.editServico', ['id' => $item->id]) }}"
                                    style="z-index:1 !important; margin-right:-14px; cursor: pointer">
                                    <i class="ri-pencil-fill icone"
                                        style="background-color:#ff6d24; color:#fff!important ;padding:20px; border-radius:50%; font-size: 24px;"></i>
                                </a>

                            </div>

                            <div class="position-relative overflow-hidden">
                                <!-- Exibir a imagem do serviço -->

                                <img class="img-fluid" src="{{ asset('storage/' . $item->fotoServico) }}"
                                    alt="{{ $item->nomeServico }}">
                                    <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4 align-items-center">
                                        @if ($item->statusServico === 'ativo')
                                        <form action="{{ route('gerente.servico.desativar', ['id' => $item->id, 'statusServico' => 'inativo']) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px; background-color:#ff0000; color:#fff !important;">
                                                Desativar
                                                <i class="ri-close-fill" style="color:#fff !important; font-size:13px;"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('gerente.servico.ativar', ['id' => $item->id, 'statusServico' => 'ativo']) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 30px 30px 30px 30px; background-color:#green; color:#fff !important;">
                                                Ativar
                                                <i class="ri-close-fill" style="color:#fff !important; font-size:13px;"></i>
                                            </button>
                                        </form>
                                    @endif

                                    </div>

                            </div>

                            <div class="text-center p-4 pb-0">
                                <h3 class="mb-0">R${{ $item->valorServico }}</h3>
                                <div class="mb-3">
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small class="fa fa-star text-primary"></small>
                                    <small>(123)</small>
                                </div>
                                <h5 class="mb-4"> {{ $item->nomeServico }}</h5>
                            </div>

                            <div class="d-flex border-top">
                                <!-- Formatando a duração do serviço para exibir apenas a hora e os minutos -->
                                @php
                                    // Verificar se duracaoServico está no formato 'HH:MM'
                                    if (preg_match('/^\d{2}:\d{2}$/', $item->duracaoServico)) {
                                        $formattedDuracao = $item->duracaoServico;
                                    } else {
                                        // Converter a string para um objeto Carbon
                                        $formattedDuracao = \Carbon\Carbon::createFromFormat(
                                            'H:i:s',
                                            $item->duracaoServico,
                                        )->format('H:i');
                                    }
                                @endphp
                                <small class="flex-fill text-center border-end py-2">
                                    <i style="color: black;"
                                        class="fa fa-clock text-primary me-2"></i>{{ $formattedDuracao }}
                                    Hrs.
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('dashboard/js/mainServico.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@endsection




@section('calendario')

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
            background-color: #263441;
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
            color: #ffffff;
            letter-spacing: 2px;
            font-size: 13px;
            padding: 0%;
            margin: 0% 2%;
        }
    </style>

    <script>
        // fill the month table with column headings
        function day_title(day_name) {
            document.write("<div class='c-cal__col'>" + day_name + "</div>");
        }
        // fills the month table with numbers
        function fill_table(month, month_length, indexMonth) {
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
                if (start_day > 7) {} else {
                    document.write("<div class='c-cal__cel'></div>");
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
    <div style="display:">
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
                    <a class="o-btn c-today__btn" href="javascript:;">TODAY</a>
                </div>
            </div>
        </header>
        <div class="c-calendar">
            <div class="c-calendar__style c-aside">
                <a class="c-add o-btn js-event__add" href="javascript:;">add event <span class="fa fa-plus"></span></a>
                <div class="c-aside__day">
                    <span class="c-aside__num"></span> <span class="c-aside__month"></span>
                </div>
                <div class="c-aside__eventList">
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
    </div>
@endsection
