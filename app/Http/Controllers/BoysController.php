<?php

namespace App\Http\Controllers;

use App\boys;
use Illuminate\Http\Request;

class BoysController extends Controller
{
 
public function inicio(){

    $boys = boys::orderBy('id', 'DESC')->get();
    return view('inicio', compact('boys'));
}


public function boyData(Request $request){
        
        if($request->ajax()){

            $dataBoy = new boys();
       
            $dataBoy->nombre   = $request->nombre;
            $dataBoy->edad     = $request->edad;
            $dataBoy->sexo     = $request->sexo;
            $dataBoy->fechaN   = $request->fechaN;
            
            $dataBoy->save();

            $cantidadBoys = boys::all()->count(); //Consulto la nueva Cantidad de Registros

            $boys = boys::orderBy('id', 'DESC')->get(); //Lista de Niños

            return response()->json([
                'mensaje' =>'<span> Chico Registrado Correctamente, Total </span> <strong> ('. $cantidadBoys .')</strong>',
                'boys'=>$boys
                ]); 
    
           // return response()->json(['mensaje'=>'Registro Correcto']);
       
           }
    }


}