<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Historial;


//uso carbon fechas
use Carbon\Carbon;


use DateTime;


class ListHistorial extends Component
{

	public $ids, $folio, $hr_salida, $hora_salida, $totalhr;

    public function render()
    {

    	$now =  Carbon::now();


        $fechaActual= $now->format('y-m-d');

        $varActivo=1;


    	$history= Historial::where('id_statu', $varActivo)->get();

        return view('livewire.list-historial', compact('history'));
    }

    public function ConfirmHrS($id){
	   
    	
    	$this->emit('MostrarModal');

       // $this->folio=$id;

        $now =  Carbon::now();

        $this->hora_salida=$now->format('H:i');

        $this->ids=$id;

        $datos = Historial::find($id);

       

        $folio=$datos->folio;

        $this->folio=$folio;

          //capturo los valores de la entrada para calcular el total de horas de trabajo
         $hr_entrada= $datos->hora_entrada;

         
         $h1 = $hr_entrada;

        
         $h2 = $this->hora_salida;

        $time1 = new DateTime($h1);
        $time2 = new DateTime($h2);
        $interval = $time1->diff($time2);

        $this->totalhr = $interval->format('%H:%i');//00 años 0 meses 0 días 08 horas 0 minutos 0 segundos



    }

    public function RegSalida(){


        $dato = Historial::find($this->ids);

        $statu=2;

        $dato->update([

            'hora_salida'=>$this->hora_salida,
            'totalhr'=>$this->totalhr,
            'id_statu'=>$statu

        ]);

        $this->emit('concluido');


        session()->flash('exit','Excelente, Disfrute de su dia');
    }
}
