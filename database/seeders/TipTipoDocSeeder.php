<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipTipoDocSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {              //LLENAR LA TABLA
                  //nombre del campo => tipo del campo en la base de datos  (Ccrear una matriz con la información de la tabla)
                  //llenar múltiples campos, dentro del array se crea un array por cada fila
        $data = [
            ['tip_nombre' => 'Instructivo', 'tip_prefijo' => 'INS'],
            ['tip_nombre' => 'Reglamento', 'tip_prefijo' => 'RGTO'],
            ['tip_nombre' => 'Programa', 'tip_prefijo' => 'PGM'],
            ['tip_nombre' => 'Manual', 'tip_prefijo' => 'MNL'],
            ['tip_nombre' => 'Documentación', 'tip_prefijo' => 'DOC']
            ];
            DB::table('documentos.tip_tipo_doc')->insert($data);
    }           //nombre de la BD.nombre de la tabla como esta en la base de datos
}
