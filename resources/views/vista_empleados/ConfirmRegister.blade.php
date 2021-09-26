   @extends('layout')

   @section('contenido')

   	<div class="site-section">
             <div class="container">
            
              
                      <a href="/" class="btn btn-danger">Regresar</a>
                        <center><div>
                           <h5>Empleados dentro de la organizacion</h5>
                      </div></center><br>


                        @livewire('list-historial')
                



          
            </div>
      </div>
   

   @endsection