<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NivelEstudio;

class NivelEstudioController extends Controller
{

    public function index()
    {
        $nivelestudios = NivelEstudio :: orderBy('nombre','asc')->get();
        return view('nivelestudio.index')->with('nivelestudios', $nivelestudios);
    }

    public function show(NivelEstudio $nivelestudio)
    {
     return view('nivelestudio.show',['nivelestudio'=>$nivelestudio]);
    }

    public function create()
    {
       return view('nivelestudio.create');
    }

    public function store(Request $request)
    {
        $nivelestudio = new NivelEstudio;
        $nivelestudio->nombre=$request->input('nombre');
        $nivelestudio->habilitado=true;
        $nivelestudio->save();
        //NivelEstudio::create($request->all());
        return redirect('nivelestudio');
    }

    public function edit(NivelEstudio $nivelestudio){
        
        return view('nivelestudio.edit')->with('nivelestudio',$nivelestudio);
    }

    public function update(NivelEstudio $nivelestudio)
    {
       $nivelestudio->nombre=request()->nombre;
       $nivelestudio->save();
       return redirect('nivelestudio');
    }

    public function destroy(NivelEstudio $nivelestudio)
    {
        $nivelestudio->delete();

        return redirect('nivelestudio');
    }
}
