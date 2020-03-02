<?php

use Illuminate\Database\Seeder;

class EmpleadosTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('empleados')->delete();
        
        \DB::table('empleados')->insert(array (
            0 => 
            array (
                'nombre' => 'JUAN',
                'habilitado' => true,
                'user_id' => 4,
                'apellido' => 'PEREZ',
            ),
            1 => 
            array (
                'nombre' => 'DAVID',
                'habilitado' => true,
                'user_id' => 11,
                'apellido' => 'YOUSSEF',
            ),
            2 => 
            array (
                'nombre' => 'EDUARDO',
                'habilitado' => true,
                'user_id' => 12,
                'apellido' => 'PELUFFO',
            ),
            3 => 
            array (
                'nombre' => 'GABRIELA',
                'habilitado' => true,
                'user_id' => 13,
                'apellido' => 'MORALES',
            ),
            4 => 
            array (
                'nombre' => 'NADIA',
                'habilitado' => true,
                'user_id' => 14,
                'apellido' => 'AID',
            ),
            5 => 
            array (
                'nombre' => 'LUCIANA',
                'habilitado' => true,
                'user_id' => 15,
                'apellido' => 'CORDERO',
            ),
            6 => 
            array (
                'nombre' => 'ELENA',
                'habilitado' => true,
                'user_id' => 16,
                'apellido' => 'PAEZ',
            ),
            7 => 
            array (
                'nombre' => 'CRISTINA',
                'habilitado' => true,
                'user_id' => 17,
                'apellido' => 'PALACIO',
            ),
            8 => 
            array (
                'nombre' => 'ENZO',
                'habilitado' => true,
                'user_id' => 18,
                'apellido' => 'MARQUEZ',
            ),
            9 => 
            array (
                'nombre' => 'MELISA',
                'habilitado' => true,
                'user_id' => 19,
                'apellido' => 'FERREYRA',
            ),
            10 => 
            array (
                'nombre' => 'EVARISTO',
                'habilitado' => true,
                'user_id' => 22,
                'apellido' => 'GONZALEZ',
            ),
            11 => 
            array (
                'nombre' => 'LORENA',
                'habilitado' => true,
                'user_id' => 23,
                'apellido' => 'DELGADO',
            ),
            12 => 
            array (
                'nombre' => 'AMANDA',
                'habilitado' => true,
                'user_id' => 24,
                'apellido' => 'VISUARA',
            ),
            13 => 
            array (
                'nombre' => 'CELINA',
                'habilitado' => true,
                'user_id' => 25,
                'apellido' => 'MUñOZ',
            ),
            14 => 
            array (
                'nombre' => 'ELISA',
                'habilitado' => true,
                'user_id' => 26,
                'apellido' => 'OVEJERO',
            ),
            15 => 
            array (
                'nombre' => 'EUGENIA',
                'habilitado' => true,
                'user_id' => 27,
                'apellido' => 'MOREL',
            ),
        ));
        
        
    }
}