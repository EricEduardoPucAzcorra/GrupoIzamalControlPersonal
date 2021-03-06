<?php

namespace App\Http\Livewire;

use Livewire\Component;


use App\Models\Empleado;

class DatsEmpleados extends Component
{

	public $buscar;

    public function render()
    {

    	//le digo que me almacene los datos del la clase Producto y que me lo ordene por la id de manera desc
        //le paso el where para el filtro de datos
    	$empleados = Empleado::where('nombre','LIKE',"%{$this->buscar}%")
                               ->orWhere('apellido_p','LIKE',"%{$this->buscar}%")->get();

    	//$empleados = Empleado::all();

        return view('livewire.dats-empleados', compact('empleados'));
    }


}
