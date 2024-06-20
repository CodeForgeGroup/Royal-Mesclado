@foreach ($funcionariosDisponiveis as $funcionario)
    <div>
        <h2>{{ $funcionario->nome }}</h2>
        <p>{{ $funcionario->cargo }}</p>
    </div>
@endforeach

