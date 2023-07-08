@extends('layouts.app')

@section('content')

<div class="container-sm bg-dark p-3">

    <ul class="list-group list-group-flush my-3 rounded fs-4 mx-5">
        <li class="list-group-item">Titular: {{$conta->user->name}}</li>
        <li class="list-group-item">Número da Conta: {{$conta->numero}}</li>
        <li class="list-group-item">R$ {{$conta->saldo}}</li>
    </ul>

    <ul class="list-group list-group-horizontal d-flex justify-content-center fs-5">
        <li class="list-group-item"><a href="{{route('home.saque')}}">Saque</a></li>
        <li class="list-group-item"><a href="{{route('home.deposito')}}">Depósito</a></li>
    </ul>
      
    
    @isset($_GET['erro'])
            <script>
                alert('Não é possível sacar essa quantia. Saldo insuficiente')
                window.location.href = '/home'
            </script>
    @endisset

    @isset($_GET['acao'])
        @if ($_GET['acao'] == 'saque')
            @component('_components.form',["action"=>route('saque'),"label"=>'saque'])@endcomponent    
        @else
            @component('_components.form',["action"=>route('deposito'),"label"=>'depósito'])@endcomponent
        @endif
    @endisset
    
</div>

@endsection
