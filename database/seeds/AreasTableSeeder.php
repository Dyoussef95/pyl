<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('areas')->delete();
        
        \DB::table('areas')->insert(array (
            0 => 
            array (
                'nombre' => 'EJECUCION DE LA PENA',
                'habilitado' => true,
            ),
            1 => 
            array (
                'nombre' => 'MEDIO LIBRE',
                'habilitado' => true,
            ),
            2 => 
            array (
                'nombre' => 'ARRESTO DOMICILIARIO',
                'habilitado' => true,
            ),
        ));
        
        
    }
}