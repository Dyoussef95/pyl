<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SituacionSalud;
use App\Interno;
use App\SituacionSaludEnfermedad;

class SituacionSaludController extends Controller
{

    public function index()
    {
        $situacionsaluds = SituacionSalud :: get();
        return view('situacionsaluds.index',compact('situacionsaluds'));
    }

    public function show(SituacionSalud $situacionsalud)
    {
     return view('situacionsaluds.show',['situacionsalud'=>$situacionsalud]);
    }

    public function create(Interno $interno)
    {
        $situacionsaludenfermedads = SituacionSaludEnfermedad::all();
       return view('situacionsaluds.create',compact('situacionsaludenfermedads'))->with('interno', $interno);
    }

    public function store(Request $request)
    {
        $situacionsalud = new SituacionSalud;
        $url=$request->input('url');
        $situacionsalud->cobertura_medica=$request->cobertura_medica;
        $situacionsalud->interno_id=$request->interno_id;
        //dd($request->all());
        $situacionsalud->save();
        //SituacionSalud::create($request->all());
        return redirect($url);
    }

    public function edit(SituacionSalud $situacionsalud){
        
        $internos = Interno::all();
        $situacionsaludenfermedads = SituacionSaludEnfermedad::all();
        return view('situacionsaluds.edit',compact('situacionsalud','internos','situacionsaludenfermedads'));
    }

    public function update(SituacionSalud $situacionsalud)
    {
        $url=request()->input('url');
        $situacionsalud->update(request()->all());
        return redirect($url);
    }

    public function destroy(SituacionSalud $situacionsalud)
    {
        $situacionsalud->delete();

        return redirect('internos');
    }
}

