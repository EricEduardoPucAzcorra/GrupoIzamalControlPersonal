<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Models\Empleado;

use App\Models\Puesto;



use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{     

    /**
     * 
     * 
     * Metodo para el filtro de registros
     * 
     */
    public function buscar(Request $request)

    {


        $buscar = $request -> input('buscar');
        
       
        if ( $empleados=Empleado::where('nombre','LIKE','%'.$buscar.'%')->get() ) {   
           
            // $empleados=Empleado::where('nombre','LIKE','%'.$buscar.'%')->get();

            return view('recept.empleados.empleados',compact('empleados'));
        }else{

            return back()->withErrors(['existe'=>'No existe registros']);

        }

        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $empleados=Empleado::all();

         return view('recept.empleados.empleados',compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $puestos=Puesto::all();
        return view('recept.empleados.new_empleado', compact('puestos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,['folio'=>'required|string', 
            'nombre'=>'required|string', 
            'apellido_p'=>'required|string', 
            'apellido_m'=>'required|string', 
            'telefono'=>'required|string',
            'imagen'=>'required',
            'id_puesto'=>'required']);
        
       $datos = Empleado::create([ 
        'folio'=> $request -> input('folio'),
        'nombre' => $request -> input('nombre'),
        'apellido_p' => $request -> input('apellido_p'),
        'apellido_m'=> $request -> input('apellido_m'),
        'telefono'=> $request -> input('telefono'),
         'imagen'=> $request -> file('imagen') -> store('empleados','public'),
        'id_puesto'=> $request -> input('id_puesto')
        ]);
        return redirect('empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($folio)
    {
        //

         $empleado=Empleado::find($folio);

         
         return response()->json([$empleado], 200);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($folio)
    {
        //
        //
        $id_folio = Empleado::find($folio);
        $puestos=Puesto::all();
        return view('recept.empleados.edit_empleado',compact('id_folio','puestos'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $folio)
    {
       //busco el elemento
       $emple = Empleado::find($folio);

       //verificacion si la variable esta tiene dato seleciona la imagen y eliminalo
       if ($request -> file('imagen')) {
           $imagen_antigua = DB::select("SELECT imagen FROM empleados");
            storage::delete('public/'.$imagen_antigua[0]->imagen);

            //si existe remplazo la imagen por la actual
            $emple->update([

                'nombre' => $request -> input('nombre'),
                'apellido_p' => $request -> input('apellido_p'),
                'apellido_m'=> $request -> input('apellido_m'),
                'telefono'=> $request -> input('telefono'), 
                'imagen'=> $request->file('imagen')->store('empleados','public'),
                'id_puesto'=> $request -> input('id_puesto')
               ]);

       }

       //si no existe pues guardo la imagen con sus valores predefindos
       $emple->update([
        'nombre' => $request -> input('nombre'),
        'apellido_p' => $request -> input('apellido_p'),
        'apellido_m'=> $request -> input('apellido_m'),
        'telefono'=> $request -> input('telefono'), 
        'id_puesto'=> $request -> input('id_puesto')
       ]);
       //retorno
        return redirect('empleados');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($folio)
    {
        //captop el valor de la imagen 
        $datos = DB::select("SELECT imagen FROM empleados ");
        //verefico si esta vacio
        if($datos[0]->imagen==""){
        //guardar la imagen
         Empleado::destroy($folio);
        }else{
            //y si exxiste eliminalo
            $imagen_antigua = DB::select("SELECT imagen FROM empleados");
             storage::delete('public/'.$imagen_antigua[0]->imagen);
        }
            Empleado::destroy($folio);

        return redirect('empleados');
        
    }
}
