@extends('layouts.layout')

@section('content')
<h3>EDITAR</h3> <!--cuando le diga crear el va a enviar al store del controlador docDocumentos -->
<form action="{{ route('documentos.update', ['id'=>$docDocumento->doc_id]) }}" method="POST"> <!--PASAR PARAMETRO A UNA RUTA-->
    @method('PUT')
    @csrf
                                                 <!--$docDocumento es del método editar del cntrolador -->
    <div class="mb-3">                                                          <!-- trae la info para que se evea en el form editar -->
        <label for="doc_nombre" class="form-label">Nombre del Documento</label> <!-- value, poner un dato por defecto u obtener lo que el usuario escribio -->
        <input type="text" class="form-control" value="{{ $docDocumento->doc_nombre}}" name="doc_nombre" id="doc_nombre">
    </div>
    <div>
        <label for="doc_contenido">Contenido del Documento</label>
        <div class="mb-3 form-floating">     <!--RECONOCER CODIGO PHP {}-->
            <textarea class="form-control"  name="doc_contenido" placeholder="Leave a comment here" id="doc_contenido">{{ $docDocumento->doc_contenido}}</textarea>
        </div>
    </div>


    <div class="mb-3">
        <label for="doc_codigo" class="form-label">Código del Documento</label> <!-- inpout disabled, se desabilito, para solo ver, y este no se envia al formulario -->
        <input type="text" disabled class="form-control" value="{{ $docDocumento->doc_codigo}}" name="doc_codigo" id="doc_codigo">
    </div>

    <div>
        <!--TIP_TIPO_DOC-->
        <label for="doc_id_tipo" class="form-label">Tipo de Documento</label> <!--onchange, llama la función del js para que fuincione en el select -->
        <select class="mb-3 form-select" name="doc_id_tipo" id="doc_id_tipo" onChange="selectOption('doc_id_tipo', 'tip_prefijo')" aria-label="Default select example">
            <option>Seleccione...</option> <!--el foreach recorra todos los $tipTiposDocs y va cogiendo de a uno en uno $tipTipoDoc-->
            @foreach($tipTiposDocs as $tipTipoDoc)  <!--(controlador llama al service)ver en el service-- $tipTipoDoc muestra para que el usuario vea lo que va a seleccionar, controlador-->
                <option value="{{ $tipTipoDoc->tip_id}}"
                    @if($tipTipoDoc->tip_id === $docDocumento->doc_id_tipo) selected @endif
                    data-atributo="{{$tipTipoDoc->tip_prefijo}}"> <!-- data-atributo = guardar el prefijo de la opción seleccionada para qe con js se pueda meter el valor en el input hidden -->
                    {{$tipTipoDoc->tip_nombre}}
                </option> <!-- el value es lo que va a enviar el formulario al backend es decir el id -->
            @endforeach
                                                                                 <!--El método first, busca el elemento que coincida con la condición booleana      hasta aqui se obtiene un objeto y se saca la propiedad-->
        </select>                                                                <!--Una vez el método first obtenga ese elemento, se extrae la propiedad que nos interesa, que en este caso sería tip_prefijo -->
        <input id="tip_prefijo" name="tip_prefijo" type="hidden" value="{{ $tipTiposDocs->first(fn($tipTipoDoc) => $tipTipoDoc->tip_id == $docDocumento->doc_id_tipo)->tip_prefijo }}"/>
                                                                                               <!--valor actual-->          <!--comparo la llave que tengo en tip_id con la que tenho guardada en docDocumento-->

    </div>

    <div>
        <!--PRO_PROCESO-->
        <label for="doc_id_proceso" class="form-label">Procesos</label>
        <select class="mb-3 form-select" name="doc_id_proceso" id="doc_id_proceso" onchange="selectOption('doc_id_proceso', 'pro_prefijo')"  aria-label="Default select example">
            <option selected>Seleccione...</option>
            @foreach($proProcesos as $proProceso)     <!-- data= necesitas poner más información-->
                <option value="{{$proProceso->pro_id}}"
                    @if($proProceso->pro_id === $docDocumento->doc_id_proceso) selected @endif
                    data-atributo="{{$proProceso->pro_prefijo}}">{{$proProceso->pro_nombre}}</option>
            @endforeach                                 <!--para que el data-prefijo se muestre en el input oculto se debe crear un js -->
        </select>                                       <!--cuado se selecciones algo arriba este debe quear con el valor seleccionado   este input queda conb lo que hayan seleccionado en el select -->
        <input id="pro_prefijo"  name="pro_prefijo" type="hidden" value="{{ $proProcesos->first(fn($proProceso)=>$proProceso->pro_id == $docDocumento->doc_id_proceso)->pro_prefijo}}"/>
                                                                                                                                       <!--lo que el usuario guardo -->
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>

@endsection

@section('js')
<script src="{{ asset('js/tip_prefijo.js')}}"></script>

@endsection





