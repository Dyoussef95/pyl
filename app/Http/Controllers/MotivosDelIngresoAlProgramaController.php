<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivosDeIngresoAlPrograma;
use App\TipoMotivoIngresoPrograma;

class MotivosDelIngresoAlProgramaController extends Controller
{

    public function index()
    {
        $motivosdelingresoalprogramas = MotivosDeIngresoAlPrograma :: orderBy('nombre','asc')->get();
        return view('motivosdelingresoalprograma.index')->with('motivosdelingresoalprogramas', $motivosdelingresoalprogramas);
    }

    public function show(MotivosDeIngresoAlPrograma $motivosdelingresoalprograma)
    {
     return view('motivosdelingresoalprograma.show',['motivosdelingresoalprograma'=>$motivosdelingresoalprograma]);
    }

    public function create()
    {
        $tipomotivoingresoprogramas = TipoMotivoIngresoPrograma :: all();
       return view('motivosdelingresoalprograma.create',compact('tipomotivoingresoprogramas'));
    }

    public function store(Request $request)
    {
        $motivosdelingresoalprograma = new MotivosDeIngresoAlPrograma;
        $motivosdelingresoalprograma->nombre=strtoupper($request->input('nombre'));
        $motivosdelingresoalprograma->tipo_motivo_ingreso_programa_id=$request->tipo_motivo_ingreso_programa_id;
        $motivosdelingresoalprograma->habilitado=true;
        $motivosdelingresoalprograma->save();
        //MotivosDeIngresoAlPrograma::create($request->all());
        return redirect('motivosdelingresoalprograma');
    }

    public function edit(MotivosDeIngresoAlPrograma $motivosdelingresoalprograma){

        $tipomotivoingresoprogramas = TipoMotivoIngresoPrograma :: all();
        return view('motivosdelingresoalprograma.edit',compact('tipomotivoingresoprogramas'))->with('motivosdelingresoalprograma',$motivosdelingresoalprograma);
    }

    public function update(MotivosDeIngresoAlPrograma $motivosdelingresoalprograma)
    {
        $motivosdelingresoalprograma->nombre=strtoupper(request()->input('nombre'));
        $motivosdelingresoalprograma->tipo_motivo_ingreso_programa_id=request()->tipo_motivo_ingreso_programa_id;
        $motivosdelingresoalprograma->habilitado=true;
       $motivosdelingresoalprograma->save();
       return redirect('motivosdelingresoalprograma');
    }

    public function destroy(MotivosDeIngresoAlPrograma $motivosdelingresoalprograma)
    {
        $motivosdelingresoalprograma->delete();

        return redirect('motivosdelingresoalprograma');
    }
}
