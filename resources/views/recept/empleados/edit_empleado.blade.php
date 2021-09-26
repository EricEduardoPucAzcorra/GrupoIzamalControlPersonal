@extends('recept.layout.index')

@section('title', 'Editar Empleado')

@section('contenido')

<br>
<div class="col-lg-12">
    <div class="card">

        <center><div class="col-sm-4 text-center"><br>
            <img class="rounded-circle"  src="{{asset('storage'.'/'.$id_folio->imagen)}}" alt="" width="75px" height="75px">
        </div></center>


        <form  method="POST" action="{{url('empleados/'.$id_folio->folio)}}" enctype="multipart/form-data">
            {{-- token --}}
            @csrf
            {{ method_field('PUT') }}

            <div class="card-body card-block">
                
        
                <div class="form-group">
                            <label for="folio" class=" form-control-label">Folio es inremplazable</label>
                            <input type="text" name="folio" disabled="" value="{{$id_folio->folio}}" placeholder="Folio" class="form-control">
                </div>
               

                <div class="form-group">
                    <label for="nombre" class=" form-control-label">Nombre</label>
                    <input type="text" id="vat" name="nombre" value="{{$id_folio->nombre}}" placeholder="Nombre" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="apellido_p" class=" form-control-label">Apellido_p</label>
                    <input type="text" id="street" name="apellido_p" value="{{$id_folio->apellido_p}}" placeholder="Apellido_p" class="form-control">
                </div>

                <div class="form-group">
                    <label for="apellido_m" class=" form-control-label">Apellido_m</label>
                    <input type="text" id="street" name="apellido_m" value="{{$id_folio->apellido_m}}" placeholder="Apellido_m" class="form-control">
                </div>

               
                <div class="form-group">
                            <label for="telefono" class=" form-control-label">Telefono</label>
                            <input type="phone" name="telefono" value="{{$id_folio->telefono}}" id="city" placeholder="Telefono" maxlength="10" class="form-control">
                </div>
              

                <div class="mb-3">
                    <label for="fotografia" class="form-label">Fotografia</label>
                    <input class="form-control" name="imagen" value="{{$id_folio->imagen}}" type="file" id="formFileMultiple" multiple>
                </div>
                
                <div class="form-group">
                            <label for="country" class=" form-control-label">Seleciona el puesto a asignar <tt>"El empleado es del area de:  {{$id_folio->puestos->puesto}}" </tt></label>
                           
                           
                            <select name="id_puesto" id=""  class="form-control">
                                @foreach ($puestos as $puesto)
                                <option value="{{$puesto->id_puesto}}">{{$puesto->puesto}}</option>
                                @endforeach
                            </select>

                </div>

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