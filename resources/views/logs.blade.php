@extends('layouts.app')

@section('content')
<div class="container-sm bg-dark p-3 rounded">

@component('_components.navbar')@endcomponent
<ul class="mx-auto mt-5 w-75 list-unstyled text-start">
    @foreach ($logs as $log)
        <li>{{ ucfirst($log->acao)}} ({{date("m/d/Y H:i",strtotime($log->data_hora))}}) : R${{$log->valor}}</li>         
    @endforeach
</ul>
</div>
@endsection