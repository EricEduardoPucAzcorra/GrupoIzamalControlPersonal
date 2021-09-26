<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Codedge\Fpdf\Fpdf\Fpdf;

use App\Models\Historial;

use Carbon\Carbon;

class PDFHistorial extends Controller
{
    //

         public function pdf(Request $request)
    {

        //carbon
        $now =  Carbon::now();

        $dia=$now->format('d');

        $mes=$now->format('m');

        $anio=$now->format('y');

        $fecha1 = $request -> input('fecha1');
        $fecha2 = $request -> input('fecha2');

     

        //aplicamos Eloquent
        $history=Historial::where("fecha_entrada",">=",$fecha1)
                         ->where("fecha_entrada","<=",$fecha2)
                         ->get(); 



        $pdf = new Fpdf('P','mm','A4');
        $pdf->AddPage();

             //---------------------------------------------------------------------------------------
        ///-------------------------------------------cuerpo de contenido-------------------------

                
        //-------------------Encabeza-----------------------

        //zona fecha------
        $pdf->SetFont('Arial','',10,6);

        $pdf->Cell(150,1,'',0,0);
    
        //comando para color en la tabla
        $pdf->SetFillColor(244, 168, 61 );

        $pdf->Cell(40,7,'Fecha',1,0,'C',1);

        $pdf->ln(7);
        // tablita de fecha
        //margen 
        $pdf->Cell(150,1,'',0,0);
        $pdf->Cell(13.3,7,"$dia",1,0,'C');
        $pdf->Cell(13.3,7,"$mes",1,0,'C');
        $pdf->Cell(13.3,7,"$anio",1,0,'C');

        //fin de la zona fecha-----

        $pdf->SetFont('Arial','',16,6);

        $pdf->image(public_path().'/images/Grupo-izamal-1024x589.png', 90,5,25,25);

        $pdf->ln(15);

        $pdf->Cell(188,7, utf8_decode('Control Personal'),'B',1,'C',1);


        //---------------------FIn del encabezado-------------------------------


        ///-----------------------------------lista de informacion personal--------------------------------------
        $pdf->SetFont('Arial','',14,6);
        //----------------------------------Informacion del hotel---------------------------------------
        //Informacion del hotel
        $pdf->ln(3);
        $pdf->Cell(50,7,'',0,0,'C');
        $pdf->Cell(7,7,'',0,0,'L');
        $pdf->Cell(70,7,'"Rinconada y Villa"',0,0,'C');
        //espacio de fecha a fecha
        $pdf->ln(9);
        $pdf->Cell(30,7,'',0,0,'C');
        $pdf->Cell(30,7,"De $fecha1  a $fecha2",0,0,'C'); 
        $pdf->Cell(7,7,'',0,0,'L');
        //espacio para definir el nombre del encargado
        $pdf->ln(10);
        $pdf->Cell(13,7,'',0,0,'C');
        $pdf->Cell(20,7,'Revision:',0,0,'C'); 
        $pdf->Cell(1,7,'',0,0,'L');
        $pdf->Cell(20,7,'Ricardo Uicab',0,'L');
        //Nota
        $pdf->ln(9);
        $pdf->Cell(3.5,7,'',0,0,'C');
        $pdf->Cell(30,7,'Nota:',0,0,'C'); 
        $pdf->Cell(-7,7,'',0,0,'L');
        $pdf->Cell(70,7, utf8_decode('Informacion exportada a travez del sistema.'),0,0,'L');

        //----------------------------------fin de la informacion del hotel----------------------------------

        $pdf->ln(5);
        $pdf->SetFont('Arial','',12,6);
        $pdf->ln(2);



        //-------------------------------tabla de dat0s---------------------------------------

        //------------------------------------Encabezado de la tabla superior------------------------------------
        //MARGEB INVISIBLE
        $pdf->Cell(10, 7 , '', 0, 0,'C');
        $pdf->Cell(175, 7 , "Lista del control personal de de $fecha1  al $fecha2", 1, 1,'C',1);
        //MARGEN INVISIBLE
        $pdf->Cell(10, 7 , '', 0, 0,'C');
        $pdf->Cell(15, 7 , 'Folio', 1, 0,'C');
        $pdf->Cell(35, 7 , 'Empleado', 1, 0,'C');
        $pdf->Cell(33, 7 , 'Fecha entrada', 1, 0,'C');
        $pdf->Cell(33, 7 , 'Hora entrada', 1, 0,'C');
        $pdf->Cell(35, 7 , 'Hora salida', 1, 0,'C');
        $pdf->Cell(24, 7 , 'Total de hrs', 1, 1,'C');

        //---------------------------------fin de encabezado superior-------------------------

        $alt=10;

        $hrs="hrs";

        //-------------------------------tabla de dat0s---------------------------------------
        //datos de la lista de asistencia
       foreach ($history as $his) {
        $pdf->Cell(10,$alt,'',0,0);

        $pdf->Cell(15,$alt,$his->folio,1,0,'C');
        $pdf->Cell(35,$alt,utf8_decode($his->empleados->nombre),1,0,'C');
        $pdf->Cell(33,$alt,$his->fecha_entrada,1,0,'C');
        $pdf->Cell(33,$alt,$his->hora_entrada,1,0,'C');
        $pdf->Cell(35,$alt,utf8_decode($his->hora_salida),1,0,'C'); 
        $pdf->Cell(24,$alt,$his->totalhr .$hrs,1,1,'C'); 
        }

        ///-----------------------------fin de la tabla de asistencia------------------------------------------



        $pdf->Output();
        exit();

            
       


     

    }


}
