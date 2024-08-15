<?php

namespace App\Http\Responsables;

use App\Services\DocDocumentoServices;
use Exception;
use Illuminate\Contracts\Support\Responsable;

class DocDocumentoUpdateResponsable implements Responsable
{

    private int $id; //para iniciarlizar el id que necesito

    public function __construct(int $id) //el id viene de afuera
    {
        $this->id = $id;  //el que viene de afuera se lo asignamos al que esta dentro
    }

    public function toResponse($request) //en el RESPONSABLE SE EVALUA EL OBJETO QUE LE ENTREGA EL SERVICIO
    {
       try{
            $docDocumento = DocDocumentoServices::updateDocumento($this->id, $request->all()); //$request trae topdas las propiedades que el modelo neceita para actualizar
            if($docDocumento instanceof Exception) {
                throw new Exception($docDocumento);
            }
       }catch(Exception $exception) {
            return response()->json(['tittle'=>'Up ha sucedio algo',
                                     'message'=>'Ha sucedio un error',
                                     'code'=>$exception->getCode(),
                                     'type'=>'Error'
       ],500);
       }
    }
}
