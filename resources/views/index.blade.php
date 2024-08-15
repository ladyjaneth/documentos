@extends('layouts.layout')



@section('content')
<!--TABLA-->
<h2>DOCUMENTOS</h2>

<!--redirect-->
@if (session('success')) <!--Mensaje de sesion que se envie desde el método update-->
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session('success') }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/documentos/create"  class="btn btn-primary">Crear Documento</a>

<table class="table" style="text-align: center">
    <thead> <!--Encabezados de columnas-->
        <th>ID DOCUMENTO</th>
        <th>NOMBRE</th>
        <th>CODIGO</th>
        <th>DESCRIPCIÓN</th>
        <th>TIPO DOCUMENTO</th>
        <th>ID PROCESO</th>
        <th>OPCIONES</th>
    </thead>
    <tbody>
        @foreach($docDocumentos as $docDocumento)
        <!--TR = filas, TD = campos TH = columnas-->
        <tr>
            <td>{{ $docDocumento->doc_id }}</td>
            <td>{{ $docDocumento->doc_nombre }}</td>
            <td>{{ $docDocumento->doc_codigo }}</td>
            <td>{{ $docDocumento->doc_contenido }}</td>
            <td>{{ $docDocumento->doc_id_tipo }}</td>
            <td>{{ $docDocumento->doc_id_proceso }}</td>
            <td>


                  <!--PASAR PARÁMETRO A UNA ruta, pasandole el id que necesitaba editar  -->
                <a href="{{ route('documentos.edit', ['id'=>$docDocumento->doc_id])}}"  class="btn btn-success">Editar</a>

               <form action="{{ route('documentos.destroy', ['id'=>$docDocumento->doc_id])}}" method="POST">
                @csrf
                @method('delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
               </form>

               <!-- <a href="{{ route('documentos.destroy', ['id'=>$docDocumento->doc_id])}}"  class="btn btn-danger">Eliminar</a>-->
            </td>

        </tr>

        @endforeach
    </tbody>
</table>
{{-- <div>
    {{ $docDocumento->links() }}
</div> --}}
@endsection
