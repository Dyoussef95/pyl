<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interno;
use App\TipoDelito;
use App\EstadoCivil;
use App\SituacionLaboral;
use App\JuzgadoTipo;
use App\NivelEstudio;
use App\TipoDocumento;
use App\Sexo;
use App\Caps;
use App\trabajo;
use App\Localidad;
use App\SituacionSalud;
use App\SituacionSaludEnfermedad;
use App\Historia;
use Carbon\Carbon;

class InternoController extends Controller
{

    public function index()
    {
        $internos = Interno :: orderBy('apellido','asc')->get();
        $situacionsaludenfermedads = SituacionSaludEnfermedad :: get();
        //dd($internos);
        return view('internos.index', compact('internos','situacionsaludenfermedads'));
    }

    public function show(Interno $interno)
    {
    $situacionsaluds = SituacionSalud :: get();
    $situacionsaludenfermedads = SituacionSaludEnfermedad :: get();
    $edad = Carbon::parse($interno->fecha_nacimiento)->age;
    dd($interno->historia);
     return view('internos.show',compact('situacionsaludenfermedads','situacionsaluds'))->with('interno',$interno)->with('historia',$interno->historia)->with('edad',$edad);
    }

    public function create()
    {
        $estadociviles = EstadoCivil::all();
        $situacioneslaborales = SituacionLaboral::all();
        $nivelestudios = NivelEstudio::all();
        $tipodocumentos = TipoDocumento::all();
        $sexos = Sexo::all();
        $trabajos = trabajo::all();
        $localidades = Localidad::all();
        $juzgadotipos = JuzgadoTipo::all();

       return view('internos.create', compact('estadociviles','situacioneslaborales','nivelestudios','tipodocumentos','sexos'
                    ,'trabajos','localidades','juzgadotipos'));
    }

    public function store(Request $request)
    {
        /*$Interno = new Interno;
        $Interno->nombre=$request->input('nombre');
        $Interno->juzgadoTipo_id=$request->input('juzgadoTipo_id');
        $Interno->habilitado=true;
        $Interno->save();*/
        
        $request->nombre=strtoupper($request->nombre);
        $request->apellido=strtoupper($request->apellido);
         dd($request->all('nombre'));
        Interno::create($request->all());
        $interno = Interno::latest()->first();
       
        $situacionsalud = new SituacionSalud;
        $situacionsalud->interno_id=$interno->id;
        $situacionsalud->save();
        return redirect('internos');
    }

    public function edit(Interno $interno){   

        $estadociviles = EstadoCivil::all();
        $situacioneslaborales = SituacionLaboral::all();
        $nivelestudios = NivelEstudio::all();
        $tipodocumentos = TipoDocumento::all();
        $sexos = Sexo::all();
        $trabajos = trabajo::all();
        $localidades = Localidad::all();
        $juzgadotipos = JuzgadoTipo::all();

       return view('internos.edit', compact('interno','estadociviles','situacioneslaborales','nivelestudios','tipodocumentos','sexos'
                    ,'trabajos','localidades','juzgadotipos'));
    }

    public function update(Interno $interno)
    {
       $interno->update(request()->all());
       return redirect('internos');
    }

    public function destroy(Interno $interno)
    {
        $interno->delete();

        return redirect('internos');
    }
}
