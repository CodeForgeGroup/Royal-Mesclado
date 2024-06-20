<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Novo Agendamento - {{ $dadosAgendamento['nomeFuncionario'] }}</title>
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
    <h1>Prezado(a) {{ $dadosAgendamento['nomeFuncionario'] }},</h1>
    <p style="font-size: 11pt;color:black;">Espero que esteja bem. Gostaria de informar que você possui um novo agendamento em sua agenda. Seguem os detalhes:</p>
    <ul>
        <li style="font-size: 13pt;color:black;"><strong>Cliente:</strong> {{ $dadosAgendamento['cliente_nome'] }} {{ $dadosAgendamento['cliente_sobrenome'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Telefone do Cliente (Para contato):</strong> {{ $dadosAgendamento['telefoneCliente'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Email do Cliente (Para contato):</strong> {{ $dadosAgendamento['emailCliente'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Serviço:</strong> {{ $dadosAgendamento['servico_nome'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Descrição do Serviço:</strong> {{ $dadosAgendamento['descricao_servico'] }}</li>
        <li style="font-size: 13pt;color:black;"><strong>Data:</strong> {{$dadosAgendamento['dataAgendamento'] }}</li>
        <li style="font-size: 13pt; color:black;"><strong>Horário:</strong> {{ $dadosAgendamento['horarioSelecionado'] }}</li>
    </ul>
    <p style="font-size: 11pt;color:black;">Por favor, dedique um momento para revisar essas informações e entrar em contato com o cliente para confirmar o agendamento. É importante garantir que todos os detalhes estejam alinhados para proporcionar a melhor experiência possível ao cliente.</p>
    <p style="font-size: 11pt;color:black;">Caso necessite de mais informações ou precise reorganizar sua agenda, estou à disposição para ajudar. Você pode entrar em contato comigo a qualquer momento.</p>
    <p style="font-size: 11pt;color:black;">Agradeço pela sua atenção e dedicação ao seu trabalho. Seu profissionalismo é fundamental para o sucesso do nosso salão de beleza.</p>
    <p style="font-size: 11pt;color:black;">Atenciosamente,</p>
    <p style="font-size: 11pt;color:black;">Royal Barber</p>
</body>
</html>
