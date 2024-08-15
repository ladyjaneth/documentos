<?php

namespace App\Http\Controllers;

use App\Http\Responsable\TipTipoDocIndexResponsable;
use Illuminate\Http\Request;

class TipTipoDocController extends Controller //mostrar una lista del recurso(modelo)
{
    public function index() { //recibir(ruta) la petición y devolver una respuesta
        //return new TipTipoDocIndexResponsable(); //se crea un objeto de la clase
    }
}



//blades template para administrar las vistas en laravel


//un objeto en php es crear una clase (molde de todos los objetos u objeto que se van a crear)
//class TipTipoDocIndexResponsable implements Responsable {}  //interface//métodos que va a usar una clase, una interface no se puede instanciar
//luego en el controlador se crea el objeto tipo responsable con new
//new TipTipoDocIndexResponsable();
//new nombredelaclase ()   ----- es el constructor de la clase
