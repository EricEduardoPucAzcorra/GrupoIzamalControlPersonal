@extends('recept.layout.index')

@section('title', 'Nuevo Empleado')

@section('contenido')

<br>
<div class="col-lg-12">
    <div class="card">
        <form method="POST" action="{{ route('empleados') }}" enctype="multipart/form-data">
            {{-- token --}}
            @csrf
            <div class="card-body card-block">
                
                {{-- <div class="row form-group">
                    <div class="col-2"> --}}
                        <div class="form-group">
                            <label for="folio" class=" form-control-label">Folio</label>
                            <input type="text" name="folio" id="company" placeholder="Folio" class="form-control">
                        </div>
                    {{-- </div>
                </div> --}}

                <div class="form-group">
                    <label for="nombre" class=" form-control-label">Nombre</label>
                    <input type="text" id="vat" name="nombre" placeholder="Nombre" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="apellido_p" class=" form-control-label">Apellido_p</label>
                    <input type="text" id="street" name="apellido_p" placeholder="Apellido_p" class="form-control">
                </div>

                <div class="form-group">
                    <label for="apellido_m" class=" form-control-label">Apellido_m</label>
                    <input type="text" id="street" name="apellido_m" placeholder="Apellido_m" class="form-control">
                </div>

                {{-- <div class="row form-group">
                    <div class="col-4"> --}}
                        <div class="form-group">
                            <label for="telefono" class=" form-control-label">Telefono</label>
                            <input type="phone" name="telefono" id="city" placeholder="Telefono" maxlength="10" class="form-control">
                        </div>
                    {{-- </div>
                </div> --}}

                <div class="mb-3">
                    <label for="fotografia" class="form-label">Fotografia</label>
                    <input class="form-control" name="imagen" type="file" id="formFileMultiple" multiple>
                </div>
                @error('imagen') <span>{{$message}}</span> @enderror

                {{-- <div class="row form-group">
                    <div class="col-4"> --}}
                        <div class="form-group">
                            <label for="country" class=" form-control-label">Seleciona el puesto a asignar</label>
                           
                            <select name="id_puesto" id="" class="form-control">
                                @foreach ($puestos as $puesto)
                                <option value="{{$puesto->id_puesto}}">{{$puesto->puesto}}</option>
                                @endforeach
                            </select>

                        </div>
                    {{-- </div>
                </div> --}}
            </div>

            <div >


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Guardar
                     </button>
                                

                    <a href="{{route('empleados')}}" class="btn btn-danger btn-sm">
                        Cancelar
                    </a>
                </div>
                
            </div><br>
         

    </form>
    </div>
</div>
@endsection