@extends('recept.layout.index')
<title>Empleados</title>

@section('contenido')
<div class="card-header">
    
</div>
<br>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <strong class="card-title" v-if="headerText">Empleados 
                <a href="{{route('empleado/create')}}" class="btn btn-primary btn-sm">Nuevo</a>
            </strong>
               <!-- tabla de la pagina -->
                <div class="table-responsive">
                <!--   input para la busqueda -->

                      <form method="POST" action="{{route('empleados/buscar')}}">
                           {{ csrf_field() }}
                        <div class="input-group col-lg-8">
                           
                            <input type="text" class="form-control" placeholder="Ingrese el termino" name="buscar" required="">
                            
                            <button class="btn btn-secondary" type="submit" id="button-addon2">Buscar</button>
                            
                            <button class="btn btn-warning" type="button"><a  href="{{route('empleados')}}"><i class="fas fa-sync" style=""></i></a></button>
                            
                        </div>
                      </form>

                         {!! $errors->first('existe', '<div class="alert alert-primary" >:message</div>')!!}

                        <br>
            

                           <table class="table">
                              <thead>
                                <tr>
                                  
                                    <th>Folio</th>
                                    <th>Fotografia</th>
                                    <th>Nombre</th>
                                    <th>Apellido_p</th>
                                    <th>Apellido_m</th>
                                    <th>Telefono</th>
                                    <th>Puesto</th>
                                    <th>Actions</th>
                                </tr>
                              </thead>
                              <tbody>
                                   @foreach ($empleados as $empleado)
                                    <tr>
                                        <td class="serial">{{$empleado->folio}}</td>
                                        <td class="avatar">
                                            <div class="round-img">
                                                <a href="{{url('empleado/'.$empleado->folio.'/edit')}}"><img  class="rounded-circle" alt="" width="60px" height="60px" src="{{asset('storage'.'/'.$empleado->imagen)}}" alt=""></a>
                                            </div>
                                        </td>
                                        <td> {{$empleado->nombre}}</td>
                                        <td>  <span >{{$empleado->apellido_p}}</span> </td>
                                        <td> <span>{{$empleado->apellido_m}}</span> </td>
                                        <td><span >{{$empleado->telefono}}</span></td>
                                        <td>{{$empleado->puestos->puesto}}</td>
                                        <td>
                                            <form method="POST" action="{{url('empleados').'/'.$empleado->folio}}">
                                                {{ csrf_field() }}
                                                {{ method_field('delete')}}
                                            {{-- <span class="badge badge-complete">Complete</span> --}}
                                            <a class="btn btn-info" href="{{url('empleado/'.$empleado->folio.'/edit')}}"><i class="fas fa-edit"></i></a>
                                            
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Decea eliminar al empleado?');"><i class="fas fa-trash"></i></button>

                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                            </table>
                </div> 

        </div>
    </div>
</div>
@endsection


@push('js')
     <script type="text/javascript" src="{{asset('js/site.min.js')}}"></script>
@endpush