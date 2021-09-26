<?php

namespace App\Http\Livewire;

use App\Models\Empleado;

use App\Models\Historial;

use Livewire\Component;

use Illuminate\Support\Facades\Storage;


///libreria de carbon

use Carbon\Carbon;


class CreateHistorial extends Component
{
    public $folio, $nombre, $apellido_p, $apellido_m, $puesto , $imagen;

    public $dia, $hr_entrada;

    public function render()
    {

        $now =  Carbon::now();


        $this->dia= $now->format('y/m/d');

        $this->hr_entrada=$now->format('H:i');


        return view('livewire.create-historial', compact('now'));
    }

    //metodo para otener los datos del empleados
     public function ObtenerDat()
     {
         $this->validate([
             'folio'=>'required'
         ]) ;

         $datos = Empleado::where('folio', $this->folio)->first();

        if($datos){

            $this->nombre= $datos->nombre;   

            $this->apellido_p= $datos->apellido_p;
    
            $this->apellido_m= $datos->apellido_m;
    
            $this->puesto= $datos->puestos->puesto;
    
            if(!empty($this->imagen)){
                $this->imagen=$datos->imagen->store("public");
            }else{
                $this->imagen= null;
            }

        }else{

            session()->flash('MensajeD','El empleado no trabaja en este Hotel.');

            $this->nombre= '';   

            $this->apellido_p= '';
    
            $this->apellido_m= '';
    
            $this->puesto= '';
        
        }

     }

     //metodo para limpiar los datos al cerrar modals
    public function cerraModal(){

        $this->folio='';

        $this->nombre= '';   

        $this->apellido_p= '';

        $this->apellido_m= '';

        $this->puesto= '';   
    }

    //metodo para guardar el nuevo registro.
    public function createHistorial(){

        $this->validate([

            'folio'=>'required',
            'dia'=>'required',
            'hr_entrada'=>'required',

        ]);
        
         $datos = Empleado::where('folio', $this->folio)->first();

         $statu=1;

        if ($datos) {
            # code...
            Historial::create([
            'folio' => $this->folio,
            'fecha_entrada' => $this->dia,
            'hora_entrada'=>$this->hr_entrada,
            'id_statu'=>$statu
            ]);


                $this->folio='';

                $this->dia='';


                $this->hr_entrada='';

                $this->nombre=''; 

                $this->apellido_p='';
                
                $this->apellido_m='';
                
                $this->puesto='';


                //ocultar modal , se utiliza el emit para ocultar el modal y se manda al script
                $this->emit('ocultarModal');
                
                //session()->flash('exito','Bienvenido tu registro fue exitoso.');

                $this->emit('mensajes');

           
        }else{
              session()->flash('Existe','Asigne corectamente su folio');
        }

       

    }
    //fin de la funcion

}
