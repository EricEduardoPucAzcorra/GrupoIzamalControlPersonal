<div>
 <!-- Modal -->
	<div class="modal fade" wire:ignore.self id="empleados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	    {{-- <div class="col-8"> --}}
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <h5 class="modal-title" id="exampleModalLabel">Consulta tu folio</h5>
	          <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">X</button>
	        </div>
	        <div class="modal-body">
	          <div class="card card-warning">
	  
	            <div class="card-body">

	           <!-- tabla de la pagina -->
                <div class="table-responsive">
                <!--   input para la busqueda -->
                     
                        <div class="input-group col-lg-8">
                            <input type="text" class="form-control" wire:model="buscar" placeholder="Ingrese el termino">
                      <!--       <button class="btn btn-secondary"  type="button" id="button-addon2">Buscar</button> -->
                        </div><br>
            

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
                                   
                                    </tr>
                                    @endforeach
                              </tbody>
                            </table>
                </div> 


	            </div>
	            <!-- /.card-body -->
	          </div>
	        </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
	       
	        </div>
	      </div>
	    </div>
	    {{-- </div> --}}
	  </div>
</div>



