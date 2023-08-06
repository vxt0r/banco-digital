@extends('layouts.app')

@section('content')
<div class="container-sm bg-dark p-3 rounded">
@component('_components.navbar')@endcomponent

<section class="text-center">
    <form action="{{route('despesa.add')}}" method="POST" class="w-75 d-flex justify-content-around mx-auto">
        @csrf
        <label>Despesa</label>
        <input type="text" name="despesa">
        <label>Valor</label>
        <input type="text" name="valor">
        <button class="btn btn-warning text-dark">Adicionar</button>
    </form>

    @component('_components.expense_list',['expenses'=>$expenses,'account'=>$account])
        
    @endcomponent 
</section>
</div>
@endsection
