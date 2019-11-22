<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Historia;
use App\Interno;
use App\Regimen;
use App\DelitoEspecifico;
use App\SituacionProcesal;
use App\MotivoIngresoPrograma;
use App\FrecuenciaControl;
use App\JuzgadoEspecifico;
use Carbon\Carbon;

class HistoriaController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $historias = Historia :: orderBy('fechaInicio','asc')->get();
        return view('historias.index', compact('historias'));
    }

    public function show(Historia $historia)
    {
     return view('historias.show',['historia'=>$historia]);
    }

    public function create(Interno $interno)
    {
        $internos = Interno::all();
        $regimenes = Regimen::all();
        $delitoespecificos = DelitoEspecifico::all();
        $situacionprocesales = SituacionProcesal::all();
        $motivosdeingresoalprograma = MotivoIngresoPrograma::all();
        $frecuenciacontroles = FrecuenciaControl::all();
        $juzgadoespecificos = JuzgadoEspecifico::all();
        return view('historias.create',compact('internos','regimenes','delitoespecificos','situacionprocesales'
        ,'motivosdeingresoalprograma','frecuenciacontroles','juzgadoespecificos'))->with('interno',$interno);
    }

    public function store(Request $request)
    {
        //dd(request()->all());
        $url=$request->url;
        $historia = new Historia;
        Historia::create(request()->all());
        return redirect($url);
    }

    public function edit(Historia $historia){
        
        $internos = Interno::all();
        $regimenes = Regimen::all();
        $delitoespecificos = DelitoEspecifico::all();
        $situacionprocesales = SituacionProcesal::all();
        $motivosdeingresoalprograma = MotivoIngresoPrograma::all();
        $frecuenciacontroles = FrecuenciaControl::all();
        $juzgadoespecificos = JuzgadoEspecifico::all();
        return view('historias.edit',compact('historia','internos','regimenes','delitoespecificos','situacionprocesales'
        ,'motivosdeingresoalprograma','frecuenciacontroles','juzgadoespecificos'));
    }

    public function update(Historia $historia)
    {
        $url=request()->url;
       $historia->update(request()->all());
       return redirect($url);
    }

    public function destroy(Historia $historia)
    {
        $historia->delete();

        return redirect('historias');
    } 
    
    public function indexMesaEntrada(){

        $internos = Interno :: get();
        return view('mesaentrada.index', compact('internos'));
    }

    public function createMesaEntrada()
    {
        //se genera un nuevo legajo
        $ultLegajo = Interno ::max('legajo');
        $nuevoLegajo = $ultLegajo+1;
        $hoy = Carbon::now();
        $hoy = $hoy->format('Y-m-d');
        
        $motivoingresoprogramas = MotivoIngresoPrograma::all();
        $juzgadoespecificos = JuzgadoEspecifico::all();
        return view('mesaentrada.create',compact('motivoingresoprogramas','juzgadoespecificos'))->with('nuevoLegajo',$nuevoLegajo)->with('hoy',$hoy);
    }

    public function storeMesaEntrada(Request $request){

        $request->validate([
            'nombre' => 'alpha',
            'apellido'=>'alpha',
        ]);
        $interno = new Interno;
        $interno->legajo = $request->legajo;
        $interno->apellido = strtoupper($request->apellido);
        $interno->nombre = strtoupper($request->nombre);
        $interno->save();
        $interno = Interno :: where('legajo',$request->legajo)->first();
        $historia = new Historia;
        $historia->interno_id = $interno->id;
        $historia->fecha_inicio = $request->fecha_inicio;
        $historia->motivo_ingreso_programa_id = $request->motivo_ingreso_programa_id;
        $historia->juzgado_especifico_id = $request->juzgado_especifico_id;
        $historia->save();
        return redirect('mesa-entrada');

    }
}
