<?php

namespace App\Http\Responsables;
use App\Services\DocDocumentoServices;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DocDocumentoShowResponsable implements Responsable
{
    //popiedad de la clase que se puede usar en cualquier parte de la clase $id llamar una propiedad this->
    private int $id; //propiedad =algo que le pertenece a la clase  y solo la clase la puede modificar y setear el id
    //MÉTODO CONSTRUCTOR - para pasar lo que necesita la clase y pueda funcionar (parámetros de la clase)
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function toResponse($request)
    {
        try {
            $docDocumento = DocDocumentoServices::showDocumento($this->id);
            if ($docDocumento instanceof Exception) {
                throw new Exception($docDocumento);
            }
        } catch (Exception $exception) { //atrapar la excepcion
            return response()->json([
                'tittle' => 'Ups ha pasado algo',
                'message' => 'No se encontró información',
                'code' => $exception->getCode(),
                'type' => 'error'
            ], 500);
        }
        return response()->json(['data' => $docDocumento, 'type' => 'success']);
    }
}
