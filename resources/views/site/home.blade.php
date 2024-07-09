@extends('layout.layout')

@section('title', 'Home')

@section('conteudo')

<link rel="shortcut icon" href="/profile/favicon.ico" type="image/x-icon">
<link rel="icon" href="/profile/favicon.ico" type="image/x-icon" >

    <style>
        .media-feature {
            background: transparent !important;
        }

        .playstore-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #000;
            border-radius: 9999px;
            background-color: rgb(255, 255, 255);
            padding: 0.625rem 1.5rem;
            text-align: center;
            color: rgb(0, 0, 0);
            outline: 0;
            transition: all .2s ease;
            text-decoration: none;
        }

        .playstore-button:hover {
            background-color: transparent;
            color: #ff6d25;
            border-color: #ff6d25;
        }

        .icon {
            height: 1.5rem;
            width: 1.5rem;
        }

        .texts {
            margin-left: 1rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            line-height: 1;
        }

        .text-1 {
            margin-bottom: 0.25rem;
            font-size: 0.75rem;
            line-height: 1rem;
        }

        .text-2 {
            font-weight: 600;
        }

        .line {
            height: 2px;
            width: 50px;
            background: #ff6d25;
            display: block;
            margin: 20px auto 20px;
        }

        .line::after {
            content: "";
            position: absolute;
            left: 50%;
            width: 150px;
            height: 2px;
            border-bottom: 2px dashed #ff6d25;
            margin-left: -75px;
        }
    .icon-border{
        padding: 15px;
        border: 2px solid #ff6d26;
        border-radius: 50%;
        font-size: 20px;

    }

    .app h3{
        font-size: 17px;
        color:black;

    }
    .app p{
        font-size:14px;
    }

    </style>

    <section class="site-hero overlay" data-stellar-background-ratio="0.5"
        style="background-image: url(images/banner.jpeg); background-position: 0;">
        <div class="container">
            <div class="row align-items-center site-hero-inner justify-content-center">
                <div class="col-md-8 text-center">

                    <div class="mb-5 element-animate">
                        <img src="images/logo-royalbarberBRANCO.png" alt="Image placeholder" class="img-md-fluid">
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="quick-info element-animate" data-animate-effect="fadeInLeft">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 bgcolor">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="media">
                                <div class="mr-3 icon-wrap"><span class="icon ion-ios-telephone"></span></div>
                                <div class="media-body">
                                    <h5>11 951694143</h5>
                                    <p>Nos ligue 24/7, responderemos o mais rápido possível</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="media">
                                <div class="mr-3 icon-wrap"><span class="icon ion-location"></span></div>
                                <div class="media-body">
                                    <h5>Avenida Marechal Tito, 1500</h5>
                                    <p>São Paulo, São Paulo <br> CEP 08010-090 - Brasil</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="media">
                                <div class="mr-3 icon-wrap"><span class="icon ion-android-time"></span></div>
                                <div class="media-body">
                                    <h5>Diariamente: 8h - 22h</h5>
                                    <p>Segunda a Sábado <br> Domingo: Fechado</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- END section -->


    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 pr-5">

                    <h2 class="mb-3">Serviços</h2>
                    <p class="mb-5"> Nossos especialistas estão aqui para oferecer cortes precisos, tratamentos
                        revitalizantes e uma dose extra de confiança.</p>

                    <div class="mb-3 custom-nav">
                        <a href="#" class="btn btn-primary btn-sm custom-prev mr-2 mb-2"><span
                                class="ion-android-arrow-back"></span></a>
                        <a href="#" class="btn btn-primary btn-sm custom-next mr-2 mb-2"><span
                                class="ion-android-arrow-forward"></span></a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 slider-wrap">
                            <div class="owl-carousel owl-theme no-nav js-carousel-1">

                                <a href="{{ url('/cortes') }}" class="img-bg"
                                    style="background-image: url('images/img_2.jpg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Corte de Cabelo Masculino</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                                <a href="{{ url('/servicos/barba') }}" class="img-bg"
                                    style="background-image: url('images/img_1.jpg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Corte de Barba</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                                <a href="{{ url('/servicos/tratamento') }}" class="img-bg last"
                                    style="background-image: url('images/img_3.jpeg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Tratamentos</h2>
                                        <p>ler mais</p>
                                    </div>
                                </a>

                                <a href="{{ url('/servicos/barba') }}" class="img-bg"
                                    style="background-image: url('images/img_2.jpg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Design de Barba</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                                <a href="{{ url('/servicos/cuidados') }}" class="img-bg"
                                    style="background-image: url('images/img_1.jpg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Tratamento Capilar (hidratação, nutrição, reconstrução)</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                                <a href="{{ url('/servicos/coloracao') }}" class="img-bg last"
                                    style="background-image: url('images/img_3.jpeg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Coloração de Barba e Cabelo</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>
                                <a href="{{ url('/servicos/cortes') }}" class="img-bg"
                                    style="background-image: url('images/img_2.jpg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Tratamento Antiqueda de Cabelo</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                                <a href="{{ url('/servicos/cuidados') }}" class="img-bg"
                                    style="background-image: url('images/img_1.jpg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Barbear Clássico com Toalhas Quentes</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                                <a href="{{ url('/servicos/cuidados') }}" class="img-bg last"
                                    style="background-image: url('images/img_3.jpeg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Tratamento de Couro Cabeludo</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>
                                <a href="#" class="img-bg" style="background-image: url('images/img_2.jpg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Acabamento e Contorno de Barba</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                                <a href="#" class="img-bg" style="background-image: url('images/img_1.jpg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Tratamento de Relaxamento Capilar</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                                <a href="#" class="img-bg last" style="background-image: url('images/img_3.jpeg')">
                                    <div class="text">
                                        <span class="icon custom-icon flaticon-scissors"></span>
                                        <h2>Estilo e Modelagem de Cabelo</h2>
                                        <p>Ler mais</p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END section -->

    <section class="site-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center">
                    <h2>Recursos da Barbearia</h2>
                    <p>Descubra nossos principais recursos e como eles podem melhorar sua experiência conosco. Oferecemos
                        serviços de alta qualidade para garantir que você saia sempre satisfeito.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">


                    <div class="media d-block media-feature text-center">
                        <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-scissors-1"></span></div>
                        <div class="media-body">
                            <h3>Barba e Corte de Cabelo</h3>
                            <p>Desfrute de um serviço completo de barbearia, que inclui um corte de cabelo personalizado e
                                um barbear profissional para manter seu visual sempre impecável.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="media d-block media-feature text-center">
                        <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-cream"></span></div>
                        <div class="media-body">
                            <h3>Creme &amp; Shampoo</h3>
                            <p>Relaxe enquanto cuidamos do seu cabelo com produtos de alta qualidade. Nosso serviço de creme
                                e shampoo deixará seu cabelo limpo, macio e revitalizado.</p>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="media d-block media-feature text-center">
                        <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-moustache"></span></div>
                        <div class="media-body">
                            <h3>Especialista em Bigode</h3>
                            <p>Confie em nossos especialistas para cuidar do seu bigode com maestria. Deixe-nos ajudá-lo a
                                encontrar o estilo perfeito e mantê-lo sempre impecável.</p>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">

                        <div class="media d-block media-feature text-center">
                            <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-scissors"></span></div>
                            <div class="media-body">
                                <h3>Estilista de Corte de Cabelo</h3>
                                <p>Nossos estilistas são especialistas em cortes de cabelo personalizados para atender às
                                    suas necessidades e estilo. Confie em nós para proporcionar uma experiência de corte de
                                    cabelo excepcional.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="media d-block media-feature text-center">
                            <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-razor"></span></div>
                            <div class="media-body">
                                <h3>Lâmina para Barbas</h3>
                                <p>Experimente o conforto e a precisão de uma lâmina de barbear profissional. Nossos
                                    especialistas garantem um barbear suave e preciso para manter sua barba sempre em ordem.
                                </p>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="media d-block media-feature text-center">
                            <div class="mr-3 icon-wrap"><span class="custom-icon flaticon-hair-comb"></span></div>
                            <div class="media-body">
                                <h3>Pente para Cabelo</h3>
                                <p>Desembarace e modele seu cabelo com facilidade usando nosso pente profissional. Tenha um
                                    cabelo sempre arrumado e com um aspecto impecável utilizando de diversas camadas e
                                    volumes</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
    </section>
    <!-- END section -->

    <section class="section-cover cta" data-stellar-background-ratio="0.5"
        style="background-image: url(images/autoestima.png); background-position: 0;">
        <div class="container">
            <div class="row justify-content-center align-items-center intro">
                <div class="col-md-8 text-center element-animate">
                    <h2 class="mb-4"><span>Agende um Corte de Cabelo Hoje e</span> Aumente sua autoestima</h2>
                    <p><a href="{{ url('/contato') }}" class="btn btn-black">Agende Agora</a></p>
                </div>
            </div>
        </div>
    </section>


    <!-- END section -->





    <section class="site-section" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 video-wrap mb-5">
                    <img src="images/img_5.jpeg" alt="Image placeholder" class="img-fluid">
                    <a href="https://www.youtube.com/watch?v=z4BK08pYQE8" class="popup-vimeo btn-video"><span
                            class="fa fa-play"></span></a>
                </div>
                <div class="col-md-6 pl-md-5">
                    <h3>Estilo que Inspira Confiança</h3>
                    <p class="lead">Comece conosco hoje mesmo</p>
                    <p>Na nossa barbearia, oferecemos mais do que apenas cortes de cabelo, oferecemos uma experiência que
                        inspira confiança e estilo. Nossos cabeleireiros profissionais estão prontos para criar o visual
                        perfeito que combina com você.</p>
                    <p>Além disso, oferecemos serviços exclusivos de barbearia, como tratamentos de barba e estilização,
                        garantindo que você saia daqui não apenas com um novo visual, mas também com uma dose extra de
                        confiança.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- END section -->


    <section class="site-section" style="background: white">

        <div class="container app">
            <div class="row">
                <div class="col-md-12">
                    <div class="sectioner-header text-center">
                        <h2 style="color: #000!important">App Royal Barber</h2>
                        <span class="line"></span>
                        <p style="font-size: 18px;">Estamos empolgados em anunciar que agora você pode levar a experiência
                            premium da Royal Barber aonde quer que vá com nosso novo aplicativo!</p>
                    </div>

                    <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="media single-feature">
                            <div class="media-body text-right" style="margin-right:1.5em;">
                                <h3>Agendamentos Rápidos e Fáceis</h3>
                                <p>Marque suas sessões de corte de cabelo e barba de forma simples e rápida, sem precisar ligar ou visitar o salão.</p>
                            </div>

                            <div class="media-right">
                                <i class="fa-solid fa-calendar icon-border" style="color: #ff6d26;"></i>
                            </div>
                        </div>
                        <div class="media single-feature">
                            <div class="media-body text-right" style="margin-right:1.5em;">
                                <h3>Ofertas Exclusivas</h3>
                                <p>Receba promoções especiais e descontos exclusivos diretamente no seu celular, garantindo sempre o melhor custo-benefício.</p>
                            </div>

                            <div class="media-right">
                                <i class="fa-solid fa-calendar icon-border" style="color: #ff6d26;"></i>
                            </div>
                        </div>
                        <div class="media single-feature">
                            <div class="media-body text-right" style="margin-right:1.5em;">
                                <h3>Notificações em Tempo Real</h3>
                                <p>Seja o primeiro a saber sobre novos serviços, lançamentos de produtos e eventos especiais na Royal Barber através de notificações instantâneas.</p>
                            </div>

                            <div class="media-right">
                                <i class="fa-solid fa-calendar icon-border" style="color: #ff6d26;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 d-none d-md-block d-lg-block">

                            <img src="{{ url('images/mobile.png') }}" class="img-fluid" style="width: 350px" alt="">

                    </div>

                    <div class="col-md-4 col-sm-12">
                        <div class="media single-feature">

                            <div class="media-left">
                                <i class="fa-solid fa-calendar icon-border" style="color: #ff6d26;"></i>
                            </div>
                            <div class="media-body text-left" style="margin-left:1.5em;">
                                <h3>Histórico de Serviços</h3>
                                <p>Acesse facilmente o histórico dos seus serviços, permitindo que nossos barbeiros saibam exatamente como você gosta do seu corte e barba.</p>
                            </div>

                        </div>
                        <div class="media single-feature">

                            <div class="media-left">
                                <i class="fa-solid fa-calendar icon-border" style="color: #ff6d26;"></i>
                            </div>

                            <div class="media-body text-left" style="margin-left:1.5em;">
                                <h3>Localização e Horários</h3>
                                <p>Encontre a localização da nossa barbearia com facilidade e confira nossos horários de funcionamento para planejar sua visita.</p>
                            </div>

                        </div>
                        <div class="media single-feature">

                            <div class="media-left">
                                <i class="fa-solid fa-calendar icon-border" style="color: #ff6d26;"></i>
                            </div>

                            <div class="media-body text-left" style="margin-left:1.5em;">
                                <h3>Experiência Personalizada</h3>
                                <p>Aproveite uma experiência totalmente personalizada, com recomendações e serviços adaptados às suas preferências e necessidades.</p>
                            </div>

                        </div>
                    </div>

                </div>

                    <div style="margin-top: 5%;" class="d-flex justify-content-center">
                        <a class="playstore-button" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="icon"
                                viewBox="0 0 512 512">
                                <path
                                    d="M99.617 8.057a50.191 50.191 0 00-38.815-6.713l230.932 230.933 74.846-74.846L99.617 8.057zM32.139 20.116c-6.441 8.563-10.148 19.077-10.148 30.199v411.358c0 11.123 3.708 21.636 10.148 30.199l235.877-235.877L32.139 20.116zM464.261 212.087l-67.266-37.637-81.544 81.544 81.548 81.548 67.273-37.64c16.117-9.03 25.738-25.442 25.738-43.908s-9.621-34.877-25.749-43.907zM291.733 279.711L60.815 510.629c3.786.891 7.639 1.371 11.492 1.371a50.275 50.275 0 0027.31-8.07l266.965-149.372-74.849-74.847z">
                                </path>
                            </svg>
                            <span class="texts">
                                <span class="text-1">Obtenha agora nas</span>
                                <span class="text-2">Google Play</span>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>


    <script src="https://kit.fontawesome.com/f0c3cb5f2a.js" crossorigin="anonymous"></script>


@endsection
