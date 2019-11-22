<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Departamento;

class DepartamentoController extends Controller
{

    public function index()
    {
        $departamentos = Departamento :: orderBy('nombre','asc')->get();
        return view('departamentos.index')->with('departamentos', $departamentos);
    }

    public function show(Departamento $departamento)
    {
     return view('departamentos.show',['departamento'=>$departamento]);
    }

    public function create()
    {
       return view('departamentos.create');
    }

    public function store(Request $request)
    {
        $departamento = new Departamento;
        $departamento->nombre=$request->input('nombre');
        $departamento->habilitado=true;
        $departamento->save();
        //Departamento::create($request->all());
        return redirect('departamentos');
    }

    public function edit(Departamento $departamento){
        
        return view('departamentos.edit')->with('departamento',$departamento);
    }

    public function update(Departamento $departamento)
    {
       $departamento->nombre=request()->nombre;
       $departamento->save();
       return redirect('departamentos');
    }

    public function destroy(Departamento $departamento)
    {
        $departamento->delete();

        return redirect('departamentos');
    }
}
