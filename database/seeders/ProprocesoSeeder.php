<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProprocesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {                          // multiple data dentro de un array
        $data = [ //llave => valor // para llenar varios campos, dentro del array poner otros array que contengan los datos de las columnas de la tabla de la base de datos
            ['pro_id'=> 1, 'pro_nombre' => 'Ingenieria', 'pro_prefijo' => 'ING'],
            ['pro_id'=> 2, 'pro_nombre' => 'Abogado', 'pro_prefijo' => 'ABG'],
            ['pro_id'=> 3, 'pro_nombre' => 'Médico', 'pro_prefijo' => 'MÉD'],
            ['pro_id'=> 4, 'pro_nombre' => 'Psicólogo', 'pro_prefijo' => 'PSIC'],
            ['pro_id'=> 5, 'pro_nombre' => 'Veterinario', 'pro_prefijo' => 'MVZ'],
        ];
        DB::table('documentos.pro_proceso')->insert($data);//DB es una clase que sirve para hacer llamaos a la base de datos y se debe importat arriba
    }                                                      //nombre de la base de datos.nombre de la tabla
}
