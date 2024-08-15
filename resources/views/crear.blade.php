@extends('layouts.layout')

@section('content')

    <h3>CREAR DOCUMENTO</h3> <!--cuando le diga crear el va a enviar al store del controlador docDocumentos -->
    <form action="{{ route('documentos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="doc_nombre" class="form-label">Nombre del Documento</label>
            <input type="text" class="form-control" name="doc_nombre" id="doc_nombre">
        </div>
        <div>
            <label for="doc_contenido">Contenido del Documento</label>
            <div class="mb-3 form-floating">
                <textarea class="form-control" name="doc_contenido" placeholder="Leave a comment here" id="doc_contenido"></textarea>
            </div>
        </div>

        <div>
            <!--TIP_TIPO_DOC-->
            <label for="doc_id_tipo" class="form-label">Tipo de Documento</label> <!--onchange, llama la función del js para que fuincione en el select -->
            <select class="mb-3 form-select" name="doc_id_tipo" id="doc_id_tipo" onChange="selectOption('doc_id_tipo', 'tip_prefijo')" aria-label="Default select example">
                <option selected>Seleccione...</option> <!--el foreach recorra todos los $tipTiposDocs y va cogiendo de a uno en uno $tipTipoDoc-->
                @foreach($tipTiposDocs as $tipTipoDoc)  <!--$tipTipoDoc muestra para que el usuario vea lo que va a seleccionar, controlador-->
                    <option value="{{$tipTipoDoc->tip_id}}" data-atributo="{{$tipTipoDoc->tip_prefijo}}">{{$tipTipoDoc->tip_nombre}}</option> <!-- el value es lo que va a enviar el formulario al backend es decir el id -->
                @endforeach
            </select>
            <input id="tip_prefijo" name="tip_prefijo" type="hidden"/>

        </div>

        <div>
            <!--PRO_PROCESO-->
            <label for="doc_id_proceso" class="form-label">Procesos</label>
            <select class="mb-3 form-select" name="doc_id_proceso" id="doc_id_proceso" onchange="selectOption('doc_id_proceso', 'pro_prefijo')"  aria-label="Default select example">
                <option selected>Seleccione...</option>
                @foreach($proProcesos as $proProceso)     <!-- data= necesitas poner más información-->
                    <option value="{{$proProceso->pro_id}}" data-atributo="{{$proProceso->pro_prefijo}}">{{$proProceso->pro_nombre}}</option>
                @endforeach                                 <!--para que el data-prefijo se muestre en el input oculto se debe crear un js -->
            </select>
            <input id="pro_prefijo" value="" name="pro_prefijo" type="hidden"/> <!--cuado se selecciones algo arriba este debe quear con el valor seleccionado
                                                                        este input queda conb lo que hayan seleccionado en el select -->
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </div>
    </form>

@endsection

@section('js')
    <script src="{{ asset('js/tip_prefijo.js')}}"></script>

@endsection
