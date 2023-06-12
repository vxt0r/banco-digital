<form action="{{ $action }}" method="POST" class="d-flex flex-column align-items-center mx-auto my-3 w-50">
    @csrf
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label text-white w-100 text-center">Realize seu {{$label}}</label><br>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="valor">
        </div>
    </div>
    <button type="submit" class="btn btn-success mx-auto">Confirmar</button>
    <a href="{{route('home')}}" class="mt-3 text-danger text-center">Cancelar</a>
</form>
