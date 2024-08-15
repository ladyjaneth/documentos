<?php
namespace App\Http\Responsable;

use App\Services\ProProcesoServices;
use Error;
use Exception;
use Illuminate\Contracts\Support\Responsable;

use function PHPSTORM_META\type;

class ProProcesoIndexResponsable implements Responsable {
    public function toResponse($request)
    {
        //se utiliza el service y lo que se va a devolver // se maneja una excepción
        try{ //llamo el service como se llama el archivo (nombre de la clase)
            //TRY: intenta ejecutar el código si hay uin error se lo pasa al CATCH : se maneja la excepción
            $proProcesos = ProProcesoServices::getAllProProceso();
            if($proProcesos instanceof Exception) {//si es una instancia de excepción que hubo un error
                throw new Exception($proProcesos);       //hay que captuarar el error THROW lanzar una excepción
            }
        } catch (Exception $exception) { //tipo //parámetro
            return response()->json(['tittle'=>'Ups algo salio mal',
                                    'message'=>'Ha sucedido un error al obtener los procesos',
                                    'code'=>$exception->getCode(),//todas las excepciones tienen un código y dice cual fue la excepción
                                    'type'=>'error'
            ],500);
        }
        return response()->json(['data'=> $proProcesos, 'tipe'=>'success']);//retornando los datos que necesita la petición /// los datos que esta solicitando el frontend
    }                                    //donde data la llave es la colección de datos que me están solicitando
}
