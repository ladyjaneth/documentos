<?php

namespace App\Http\Controllers;

use App\Http\Responsables\DocDocumentoDeleteResponsable;
use App\Http\Responsables\DocDocumentoIndexResponsable;
use App\Http\Responsables\DocDocumentoShowResponsable;
use App\Http\Responsables\DocDocumentoStoreResponsable;
use App\Http\Responsables\DocDocumentoUpdateResponsable;
use App\Http\Responsables\TipTipoDocIndexResponsable;
use App\Services\DocDocumentoServices;
use App\Services\ProProcesoServices;
use App\Services\TipTipoDocServices;
use Illuminate\Http\Request;

class DocDocumentoController extends Controller
{
    /**
     * Display a listing of the resource. //mostrar una lista del recurso(modelo)
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //la logica de services y responsalbe
        //$docDocumentos = new DocDocumentoIndexResponsable();

        $docDocumentos = DocDocumentoServices::getAllDocDocumento();
        return view('index', array('docDocumentos'=>$docDocumentos)); //en esta vista es donde se hace la sesion que se quiere mostrar

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //mostrar la vista del formulario de creación del nuevo recurso(dato)
    {
        /////// traer los tipos de documento, llamando el servicio
        $tipTiposDocs = TipTipoDocServices::getAllTipTipoDoc();
        $proProcesos = ProProcesoServices::getAllProProceso();
        return view('crear', array('tipTiposDocs'=>$tipTiposDocs, 'proProcesos'=>$proProcesos));

    }

    /**
     * Store a newly created resource in storage. //guarda una nueva creación del recurso(dato-modelo creación del moidelo en la BD) en el almacenamiento
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */                    //tipo //objeto o parametro
    public function store(Request $request)//almacenar - GUARDARenviar algo desde el front end hacia el back end
    {
        //dd($request->all());
        $campos = $request->all(); //me trae todo lo que le haya enviado por el formulario
        $docDocumentos = DocDocumentoServices::storeDocDocumento($campos); //se crea el documento
        //dd($docDocumentos);
        //contacternar estrin en php es con punto //AQUI OBTENEMOS EL CODIGO CON SU ID
        $codigo = $request->tip_prefijo.'-'.$request->pro_prefijo.'-'.$docDocumentos->doc_id; //ya se puede acceder al id despues de crearlo
        //VAMOS A ACTUALIZR EN LA BASE DE DATPOS PARA QUE MUESTRE EL CODIGO QUE SE CREO
        DocDocumentoServices::updateDocumento($docDocumentos->doc_id,['doc_codigo'=> $codigo]);

        return redirect()->route('documentos.index');//EL METODO STORE AQUI ME DEBE RETORNAR HACIA UNA VISTA
                                                    //redireccionar a una ruta y al controlador y luego la vista
        //return new DocDocumentoStoreResponsable();
    }

    /**
     * Display the specified resource. //muestra el dato especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //MOSTAR UN DATO ESPECIFICO


    }

    /**
     * Show the form for editing the specified resource. //muestra el formulario de edición del dato especifico
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    //llave valor es un array

        $docDocumento = DocDocumentoServices::showDocumento($id); //busco la info. me trae los datos del documento por id en el formulario edit
        $tipTiposDocs = TipTipoDocServices::getAllTipTipoDoc();
        $proProcesos = ProProcesoServices::getAllProProceso();
        //dd($docDocumento);
        return view('edit',['tipTiposDocs'=>$tipTiposDocs, 'proProcesos'=>$proProcesos,
                          'docDocumento'=>$docDocumento]);
    }

    /**
     * Update the specified resource in storage. //actualiza el dato especifico en almacenamiento (BD)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id) //trae todo lo que se envia desde el form de editar
    {   //actualizar
      //dd($request->all());

        $codigo = $request->tip_prefijo.'-'.$request->pro_prefijo.'-'.$id; //aqui se arma el codigo del documento
        $datosActualizar = $request->except('_method','_token','tip_prefijo','pro_prefijo'); //los datos que no se envian con except y se queda los datos que si necesito y los guardo en la variable
        $datosActualizar['doc_codigo']=  $codigo; //array push para agregar este campo al
         // dd($except);
        DocDocumentoServices::updateDocumento($id, $datosActualizar); //busca el id del documento, seteando (insertar) y actualizando
      //dd($docDocumento);
                                                    //with es un mensaje rapido que viaja mediante la aplicación, poner la session en el index donde quiero mostrarlo
        return redirect()->route('documentos.index')->with('success','Documento Actualizado Exitosamente');
                                                            //llave - valor de la session del index
    }

    /**
     * Remove the specified resource from storage. //elimina el dato especificao desde el almacenamiento
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('ver si llega');
        DocDocumentoServices::deleteDocumento($id);
        return redirect()->route('documentos.index')->with('success','Documento Eliminado Exitosamente');
    }
}
