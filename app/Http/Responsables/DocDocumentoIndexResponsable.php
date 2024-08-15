<?php
namespace App\Http\Responsables;

use App\Services\DocDocumentoServices;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DocDocumentoIndexResponsable implements Responsable {

    public function toResponse($request) //toResponse método que va a buscar laravel para devolver la respuesta UNO POR CLASE
    { //maneja el error y devulve una respuesta al controlador ya sea ppositiva o negativa   //services - responsable - controller
        try{ //intentar
            $docDocumentos = DocDocumentoServices::getAllDocDocumento();
            if($docDocumentos instanceof Exception) {
                throw new Exception($docDocumentos);  //throw lanza una excepción creada por el usuario //lanzar un objeto de tipo excepción
            }
        } catch(Exception $exception) { //atrapar
            return response()->json(['title'=>'Ups Paso algo',
                                    'message'=>'Ha ocurrido un error',
                                    'code'=>$exception->getCode(),
                                    'type'=>'error',
            ],500);  //500 se produjo un error
        }
        return response()->json(['data'=>$docDocumentos,'type'=>'success']); //finzalizado con exito
    }
}
