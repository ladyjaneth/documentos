<?php
namespace App\Services;

use App\Models\TipTipoDoc; //modelo que voy a usar en la clase
use Illuminate\Database\QueryException; //manejar consultas

//las clases se llaman en archivos por aparte
// y va creada dentro de app - ver como estpan creadas las otras carpetas dentro así mismo crearla

class TipTipoDocServices {

    public static function getAllTipTipoDoc() {
        try{
           $tipTiposDocs = TipTipoDoc::all();
        } catch(QueryException $queryException) { //excepción personalizada para las consultas
            return $queryException;
        }
        return $tipTiposDocs;
    }
}
