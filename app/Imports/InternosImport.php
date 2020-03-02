<?php

namespace App\Imports;

use App\Interno;
use App\Empleado;
use App\Historia;
use App\TipoDelito;
use App\MotivoIngresoPrograma;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class InternosImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        /*1:nombre, 2:sexo, 3:tipo doc, 4:num doc, 5:domicilio, 6:provincia
         7:localidad,8:estado civil trucho,11:estado civil posta
         12:fecha nac.,15:nivel de instruccion,18:SITUACION LABORAL
         19:TRABAJO, 20:legajo,21:Nº TUC,22:FECHA INGRESO,
         23:tipo delito,24:delito especifico,26:motivo ingreso programa
         28:situacion procesal,29:frecuencia control,
         30:profesional a cargo*/ 
         //Date::excelToDateTimeObject($fecha)
        //$nombres = explode(', ',$row[1]);
        $c=0;
        foreach ($rows as $row) 
        {
            $c=$c+1;
            $empleados = Empleado::get();  
                            
            
                if (isset($row[20]) && is_int($row[20]) && isset($row[30]))
                //validamos que tenga legajo, que el legajo sea un numero entero y que tenga profesional a cargo
                {
                    $b=0;
                    $empleado_id=null;
                    foreach($empleados as $empleado){
                        $empleado->nombre .= ' '.$empleado->apellido;//concatena las 2 cadenas
                        $row[30]=trim($row[30]);//elimina espacios en blanco al principio y al final
                        if(strcasecmp($empleado->nombre, $row[30])==0){
                            
                            $empleado_id=$empleado->id; 
                            $b=1;
                        }
                        
                    }
                    
                    if($b==1){
                        $nombres = explode(', ',$row[1]);//divide una cadena cada vez que encuentra el primer argumento, retorna un array
        
                        
                        $interno = new Interno;
                        $interno->legajo = $row[20];
                        $interno->apellido = strtoupper($nombres[0]);
                        $interno->nombre = strtoupper($nombres[1]);
                        $interno->fecha_nacimiento = Date::excelToDateTimeObject($row[12]);//convierte el valor devuelto por el excel a formato datatime
                        $interno->numero_documento = $row[4];
                        $interno->domicilioDeclarado = $row[5];
                        $interno->save();

                        $historia = new Historia;
                        $historia->interno()->associate($interno); 
                        $historia->fecha_inicio =  Date::excelToDateTimeObject($row[22]);
                        $motivoingresoprograma = MotivoIngresoPrograma::where('nombre',strtoupper($row[26]))->first();
                        if(isset($motivoingresoprograma)){
                            $historia->motivo_ingreso_programa_id=$motivoingresoprograma->id;
                        }
                        $historia->save();
                        $historia->empleado()->attach($empleado_id);  
                         
                    }                  
                }               
        }
    }
}
