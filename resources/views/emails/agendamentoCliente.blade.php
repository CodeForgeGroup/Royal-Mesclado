<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dados de seu agendamento - {{ $dadosAgendamentoCliente['nomeCliente'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        h1 {
            color: #333;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        ul li {
            margin-bottom: 10px;
        }
        p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Prezado(a) {{ $dadosAgendamentoCliente['nomeCliente'] }},</h1>
    <p style="font-size: 11pt;color:black;">Espero que esteja bem. Gostaria de informar que você possui um novo agendamento em sua agenda. Seguem os detalhes:</p>
    <ul>
        <li style="font-size: 13pt;color:black;"><strong>Funcionário:</strong> {{ $dadosAgendamentoCliente['nomeFuncionario'] }} {{ $dadosAgendamentoCliente['funcionario_sobrenome'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Telefone do Funcionário (Para contato):</strong> {{ $dadosAgendamentoCliente['telefoneFuncionario'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Email do Funcionário (Para contato):</strong> {{ $dadosAgendamentoCliente['emailFuncionario'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Serviço:</strong> {{ $dadosAgendamentoCliente['servico_nome'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Descrição do Serviço:</strong> {{ $dadosAgendamentoCliente['descricao_servico'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Data:</strong> {{$dadosAgendamentoCliente['dataAgendamento'] }}</li>
        <li style="font-size: 13pt; color:black;"><strong>Horário:</strong> {{ $dadosAgendamentoCliente['horarioSelecionado'] }}</li>
    </ul>
    <p style="font-size: 11pt;color:black;">Por favor, dedique um momento para revisar essas informações e entrar em contato conosco para confirmar o agendamento. É importante garantir que todos os detalhes estejam alinhados para proporcionar a melhor experiência possível à você.</p>
    <p style="font-size: 11pt;color:black;">Caso necessite de mais informações ou precise reorganizar sua agenda, estou à disposição para ajudar. Você pode entrar em contato conosco através do nosso site ou através de seu login.</p>
    <p style="font-size: 11pt;color:black;">Agradeço pela sua confiança e nos selecionar. Sua escolha é fundamental para o sucesso do nosso salão de beleza.</p>
    <p style="font-size: 11pt;color:black;">Atenciosamente,</p>
    <p style="font-size: 11pt;color:black;">Royal Barber</p>
</body>
</html>
