<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FrecuenciaControl;

class FrecuenciaControlController extends Controller
{

    public function index()
    {
        $frecuenciascontroles = FrecuenciaControl :: orderBy('nombre','asc')->get();
        return view('frecuenciascontroles.index')->with('frecuenciascontroles', $frecuenciascontroles);
    }

    public function show(FrecuenciaControl $frecuenciacontrol)
    {
     return view('frecuenciascontroles.show',['frecuenciacontrol'=>$frecuenciacontrol]);
    }

    public function create()
    {
       return view('frecuenciascontroles.create');
    }

    public function store(Request $request)
    {
        $frecuenciacontrol = new FrecuenciaControl;
        $frecuenciacontrol->nombre=$request->input('nombre');
        $frecuenciacontrol->habilitado=true;
        $frecuenciacontrol->save();
        //FrecuenciaControl::create($request->all());
        return redirect('frecuenciascontroles');
    }

    public function edit(FrecuenciaControl $frecuenciacontrol){
        
        return view('frecuenciascontroles.edit')->with('frecuenciacontrol',$frecuenciacontrol);
    }

    public function update(FrecuenciaControl $frecuenciacontrol)
    {
       $frecuenciacontrol->nombre=request()->nombre;
       $frecuenciacontrol->save();
       return redirect('frecuenciascontroles');
    }

    public function destroy(FrecuenciaControl $frecuenciacontrol)
    {
        $frecuenciacontrol->delete();

        return redirect('frecuenciascontroles');
    }
}
