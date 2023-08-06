@php
    $spent = 0;
    $spent_percent = 0;
@endphp

<ul class="mx-auto mt-5 w-50 list-unstyled text-start">
    @foreach ($expenses as $expense)
        <li class="d-flex justify-content-between mb-4">
            
            @php
                $spent += $expense->valor;
                $percent = number_format(($expense->valor/$account->saldo)*100,2,',','');
                $spent_percent += (float)$percent;
            @endphp

            {{$expense->despesa}} (R${{$expense->valor}}) - {{ $percent }}% do seu saldo
            <a href="{{route('despesa.remove',['id'=> $expense->id])}}" class="bg-danger text-white rounded p-2 text-decoration-none">Excluir</a>
        </li>            
    @endforeach
    <span>Gastos Totais : R${{number_format($spent,2,',','')}}</span><br>

    @if ($spent_percent <= 100)
        <span class="text-success">Porcentagem usada : {{$spent_percent}}%</span>
    @else
        <span class="text-danger">Porcentagem usada : {{$spent_percent}}%</span>
    @endif
</ul>   