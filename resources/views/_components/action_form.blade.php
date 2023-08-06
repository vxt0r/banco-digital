<form action="{{ $action }}" method="POST" class="w-25 d-flex flex-column align-items-center mx-auto my-3">
    @csrf
    <label class="mt-5 mb-2">Realize seu {{$label}}</label>    
    <span class="text-danger">{{$errors->has('valor') ? $errors->first() : ''}}</span>
    <input type="text" class="form-control mb-3" name="valor">
    <button type="submit" class="btn btn-success mx-auto fs-5">Confirmar</button>
    <a href="{{route('home')}}" class="mt-3 text-danger text-center">Cancelar</a>
</form>
