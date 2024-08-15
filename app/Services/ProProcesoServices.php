<?php
namespace App\Services;

use App\Models\ProProceso;
use Illuminate\Database\QueryException;

class ProProcesoServices {

    public static function getAllProProceso() {
        try{
           $proProcesos = ProProceso::all();
        } catch(QueryException $queryException) {
            return $queryException;
        }
        return $proProcesos;
    }
}
