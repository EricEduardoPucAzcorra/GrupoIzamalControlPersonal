<div>

    <div class="container">
        <div class="card-tools">
               <div class="col-8">  
                 <form method="post" action="{{url('historial/pdf')}}">
                              {{ csrf_field() }}

                              <div class="card-tools">
                                  <div class="input-group input-group-sm" >
                                  <div class="input-group col-lg-4 date js-date">
                                        <input type="text" class="form-control" name="fecha1" placeholder="Fecha" required >
                                        <button class="btn btn-secondary" hidden=""></button>
                                  </div>
                                  <span>A</span>
                                   <div class="input-group col-lg-4 date js-date">
                                        <input type="text" class="form-control" name="fecha2" placeholder="Fecha" required>
                                        <button class="btn btn-secondary" hidden=""></button>
                                  </div>
                                       
                                  <!--   <div class="input-group-append"> -->
                                      <button type="submit" class="btn btn-danger"><i class="fas fa-file-pdf"></i></button>
                                  <!--   </div> -->
                                  </div>
                              </div>
                  </form>     
                  <br>       
              </div>
        </div>
    </div>


   <div class="col-12">
            <div class="card">    
              <div class="card-header">
                <h3 class="card-title">Historial de registro personal</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" >
                    <input type="text" name="table_search" class="form-control float-right" wire:model="buscar" placeholder="Buscar">
                  </div>
                </div>
        
              </div>
            </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                     <!--  <th> id</th> -->
                      <th>Folio</th>
                      <th>Empleado</th>
                      <th>Fecha_entrada</th>
                      <th>Hora entrada</th>
                      <th>Hora salida</th>
                      <th>Hrs de trabajo</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($history as $his)
                    <tr>
                    <!--    <td>{{$his->id_historial}}</td> -->
                      <td>{{$his->folio}}</td>
                      <td>{{$his->empleados->nombre}}</td>
                      <td>{{$his->fecha_entrada}}</td>
                      <td><span class="tag tag-success">{{$his->hora_entrada}}</span></td>
               
               <!--        <td>{{Carbon\Carbon::parse($his->hora_salida)->format('H:i a')}}</td> -->

                      <td>
                        @if($his->hora_salida=='')
              
                         <p class="property-title letra"><a><span class="offer-type bg-success" style="border-radius: 4px;">En curso</span></a></p>
                        @else
                         <p class="property-title letra"><a><span class="offer-type bg-danger" style="border-radius: 4px;">{{$his->hora_salida}}</span></a></p>
                        @endif
                      </td>

                      <!-- <td>{{Carbon\Carbon::parse($his->totalhr)->format('H:i')}} Hrs</td> -->

                      <td>
                        @if($his->totalhr=='')
              
                         <p class="property-title letra"><a><span class="offer-type bg-success" style="border-radius: 4px;">En curso</span></a></p>
                        @else
                         <p class="property-title letra"><a><span class="offer-type bg-danger" style="border-radius: 4px;">{{$his->totalhr}} Hrs</span></a></p>
                        @endif
                      </td>


                    </tr>

                    @endforeach
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
    </div>

</div>
