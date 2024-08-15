<?php

namespace App\Http\Controllers;

use App\Http\Responsable\ProProcesoIndexResponsable;
use Illuminate\Http\Request;

class ProProcesoController extends Controller
{   //mostrar una lista del recurso(modelo)
    public function index() {//se llama a responsable
        return new ProProcesoIndexResponsable(); //parentesis método constructor
    }
}
