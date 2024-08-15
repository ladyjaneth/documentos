<?php
namespace App\Http\Responsables;

use App\Services\DocDocumentoServices;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DocDocumentoStoreResponsable implements Responsable {
 //el responsable al iogual que el services maneja try catch por si el services
 // tiene una excepción la mandemos al catch del responsables
    public function toResponse($request)
    { //primero el nombre de la clase para poder ingresar al método del services
//$intente llamar al servicio para que el método haga lo que tenga que hacer en este caso gurdar en la bd
        try{                     //$request->all() devuelve un array //objeto->llama al método all()//devuelve todo el cuerpo del request
            $documento = DocDocumentoServices::storeDocDocumento($request->all());
            if($documento instanceof Exception) { //si documento es una instancia de Excepción  //si es una instancia de excepción que hubo un error
                throw new Exception($documento); //lanzar una nueva excepción (THROW= tirar)
            }
        } catch(Exception $exception) {
            return response()->json(['tittle'=>'Ups algo ha sucedido',
                                    'message'=>'Ha sucedido un error al crear el documento',
                                    'code'=>$exception->getCode(),
                                    'type'=>'error'
        ],500);
        }
        return response()->json(['data'=>$documento, 'type'=>'sucess']); //sucess que todo salio bien
    }
}





