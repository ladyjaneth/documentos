<?php
namespace App\Http\Responsables; //namespace donde esta iubicado el archivo

use App\Services\TipTipoDocServices;
use Error;
use Exception;
use Illuminate\Contracts\Support\Responsable;////importar una interface //vendor/laravel/framework/src/illuminate/Contracts/Support/Responsable
//se crea dentro de HTTP
//encargado del tipo de respuesta que le va a devolver al controlador //implementando la interface Responsable
class TipTipoDocIndexResponsable implements Responsable {  //cuando implementamos la interface Responsable debemos utilizar sus metodos

    public function toResponse($request)
    {
        try{ //invocar lo que tiene que ver con el service si el service trae una excepción aqui es donde se va a tratar
           $tipTipoDocs = TipTipoDocServices::getAllTipTipoDoc(); //clase::metodo estatico de la clase que estoy llamado
            if($tipTipoDocs instanceof Exception) { //si esa variable es una instancia de una excecpción - una condicional para saber que lo que se esta trayendo es una excepción o no
               throw new Exception($tipTipoDocs); //lance esa excepción
            }
        } catch(Exception $exception) { //se va a manejar cualquier tipo de excepción
            return response()->json(['title'=>'Ups algo salio mal',
                'message'=>'Ha sucedido un error al obtener los tipos de documentos',
                'code'=>$exception->getCode(),
                'type'=>'error'
            ], 500);
        }
        return response()->json(['data'=>$tipTipoDocs,'type'=>'success']);
    }
}


