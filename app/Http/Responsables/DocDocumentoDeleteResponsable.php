<?php

namespace App\Http\Responsables;

use App\Services\DocDocumentoServices;
use Exception;
use Illuminate\Contracts\Support\Responsable;


class DocDocumentoDeleteResponsable implements Responsable {

    private int $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }          //propiedad


    public function toResponse($request)
    {
        try {
            $docDocumento = DocDocumentoServices::deleteDocumento($this->id);
            if($docDocumento instanceof Exception){
                throw new Exception($docDocumento);
            }
        }catch(Exception $exception) {
            return response()->json(['tittle'=>'Ups ha pasado',
                                     'message'=>'Ha sucedido algo',
                                     'code'=>$exception->getCode(),
                                     'type'=>'Error'
        ],500);
        }
    }
}

