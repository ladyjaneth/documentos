<?php

namespace App\Services;

use App\Models\DocDocumento;
use Exception;
use Illuminate\Database\QueryException;

class DocDocumentoServices
{ //la clase es consultas en la BD ya sea para eliminar, actualizar, agregar
    /**captura el error y lo entrega
     * consulta que va a traer todos los recursos de este modelo
     * funciones estaticas no secesitan crear un objeto para usar sus funciones
     */
    public static function getAllDocDocumento()
    { //consultas en la bd tienen try cathc excepciones que nos pueden aparecer
        try {
            $docDocumentos = DocDocumento::all();  //modelo //ir a la bd la tabla y trae todos los datos de la tabla DocDocumento y me trae una colección que es un array con más propiedades
        } catch (QueryException $queryException) { //tipo y objeto //el catch de las consultas siempre trae QueryException
            return $queryException;  //retorrnar la excepción //retorna la excepcion error //si ocurrio un error entrege ese error, devuelve ese error
        }
        return $docDocumentos; //si todo sale bien, aqui esta la lista de todos los documentos que se estaban pidiendo
    }

    //función static solamente necsitamos llamar la función sin crear
    //create(): Crea un nuevo registro en la tabla correspondiente al modelo, RECIBE COMO PARAMETRO UN ARRAY QUE CONTIENE LOS CAMPOS QUE VA A ALMACENAR ESE MODELO
    public static function storeDocDocumento(array $campos) //todo lo que necesita el modelo para ser
    {                                                      //creado, sus campos que estan en el modelo
        try {                    //Queryexcepción personalizada para la base de datos
            $docDocumento = DocDocumento::create($campos); //exception es una excepción general que muestra que salio mal
        } catch (QueryException $queryException) {
            return $queryException;
        }
        return $docDocumento;
    }

    //función que se pueda utilizar en cuarlquier clase sin necesidad de crear un objeto
    public static function showDocumento($id)
    {
        try {
            $docDocumento = DocDocumento::find($id);
        } catch (QueryException $queryException) {
            return $queryException;
        }
        return $docDocumento;
    }
                                          // el id y los campos que voy a actualizar
    public static function updateDocumento(int $id, array $campos) {
        try{                             //query()-> me permite armar un query()->where('campo que voy a buscar, el valor)->update($los campos que quiero actualizar);
            $docDocumento = DocDocumento::query()->where('doc_id', $id)->update($campos); //busque el id y con el método update actualice sus campos

            //update siempre lleva un WHERE(nombre del campo que voy a buscar y el campo) lo voy a buscar con el valor $id
            //select * from doc_documento where doc_id = :id
            //update empleados set direcicion = :direccion, telefono = :telefono where num_cedula = :numCedula

        }catch(QueryException $queryException) {
            return $queryException;
        }
        return $docDocumento;
    }


    public static function deleteDocumento($id) {
        try{
                                //nombre de la columna,  //valor
            $docDocumento = DocDocumento::where('doc_id', $id)->delete();
        }catch(QueryException $queryException) {
            return $queryException;  //retorna el queryException por que el responsable se va a hacer cargo de la respuesta
        }
        return $docDocumento;
    }





}
