<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('fonts/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">

    <link rel="shortcut icon" href="{{ asset('images/iconroyalbarberBRANCO.png') }}" type="image/x-icon">
    <title>Cadastrar - RoyalBarber</title>
</head>

<body style="background: url(../images/bg-cadastrar.png) no-repeat center">
    <div class="container">
        <div class="login-box">
            <img src="{{ asset('images/logo-royalbarber-preto.png') }}" alt="">
            <h2>Crie sua conta!</h2>
            <form action="{{ route('cadastrar') }}" method="POST" class="login-form">
                @csrf
                <div class="textbox">
                    <input type="text" name="nomeCadastrar" placeholder="Nome:" value="{{ old('nomeCadastrar') }}">
                    @error('nomeCadastrar')
                        <div class="alert alert-danger" style="color:#ff6d24;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="textbox">
                    <input type="text" name="sobrenomeCadastrar" placeholder="Sobrenome:"
                        value="{{ old('sobrenomeCadastrar') }}">
                    @error('sobrenomeCadastrar')
                        <div class="alert alert-danger" style="color:#ff6d24;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="textbox">
                    <input type="text" name="emailCadastrar" placeholder="Email:"
                        value="{{ old('emailCadastrar') }}">
                    @error('emailCadastrar')
                        <div class="alert alert-danger" style="color:#ff6d24;">{{ $message }}</div>
                    @enderror
                </div>

                <div class="textbox">
                    <input type="password" name="senhaCadastrar" placeholder="Senha:"
                        value="{{ old('senhaCadastrar') }}">
                </div>
                @error('senhaCadastrar')
                    <div class="alert alert-danger" style="color:#ff6d24;">{{ $message }}</div>
                @enderror

                <div class="textbox">
                    <input type="text" name="telefoneCadastrar" placeholder="Número:"
                        value="{{ old('telefoneCadastrar') }}">
                    @error('telefoneCadastrar')
                        <div class="alert alert-danger" style="color:#ff6d24;">{{ $message }}</div>
                    @enderror
                </div>
                <div class="textbox">
                    <input type="text" name="enderecoCadastrar" placeholder="Insira o nome de sua rua:"
                        value="{{ old('enderecoCadastrar') }}">
                    @error('enderecoCadastrar')
                        <div class="alert alert-danger" style="color:#ff6d24;">{{ $message }}</div>
                    @enderror
                </div>

                <input type="submit" class="btn" value="Criar">

                <div class="link-cadastrar">
                    <a href="{{ url('/login') }}">Voltar para Login</a>
                </div>

            </form>
        </div>
    </div>


    <script src="{{ asset('../dashboard/js/core/bootstrap.min.js') }}"></script>



</body>


</html>
