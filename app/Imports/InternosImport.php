<?php

namespace App\Imports;

use App\Interno;
use App\Empleado;
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
        foreach ($rows as $row) 
        {
            $empleados = Empleado::get();
            foreach($empleados as $empleado){
                echo $empleado->nombre;
                echo '  ';
            }
            /*if (isset($row[20]) && is_int($row[20]) && isset($row[30])) {
               
               
                $nombres = explode(', ',$row[1]);
                echo $nombres[1];
                echo $row[0];
                echo '  ';
                Interno::create([
                    'legajo' => $row[20],
                    'apellido' => $nombres[0],
                    'nombre' => $nombres[1],
                    
                ]);
            }*/
            dd('fin');
        }
      

        
    }
}
