<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('DOCUMENTOS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-slot name="slot">
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                                    <div class="p-6 bg-white border-b border-gray-200">
                                        <!--TABLA-->

                                        <!--redirect-->
                                        @if (session('success'))
                                        <!--Mensaje de sesion que se envie desde el método update-->
                                        <div id="bloqueBotonCerrar" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                                            <strong class="font-bold">Satisfactoriamente!</strong>
                                            <span class="block sm:inline">{{ session('success') }}</span>
                                            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="botonCerrar" onclick="botonCerrar()">
                                                <!--llama la función -->
                                                <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <title>Close</title>
                                                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                                                </svg>
                                            </span>
                                        </div>
                                        @endif

                                        <div class="flex flex-wrap -mx-3 mb-6 py-2">
                                            <div class="w-full md:w-1/2 sm:px-6 lg:px-8">
                                                <a href="/documentos/create" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                    Crear Documento
                                                </a>
                                            </div>
                                        </div>

                                        <table class="w-full text-sm text-center rtl:text-right text-gray-500 dark:text-gray-400">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                                <tr>
                                                    <!--Encabezados de columnas-->
                                                    <th>ID DOCUMENTO</th>
                                                    <th>NOMBRE</th>
                                                    <th>CODIGO</th>
                                                    <th>DESCRIPCIÓN</th>
                                                    <th>TIPO DOCUMENTO</th>
                                                    <th>ID PROCESO</th>
                                                    <th>OPCIONES</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($docDocumentos as $docDocumento)
                                                <!--TR = filas, TD = campos TH = columnas-->
                                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <td>{{ $docDocumento->doc_id }}</td>
                                                    <td>{{ $docDocumento->doc_nombre }}</td>
                                                    <td>{{ $docDocumento->doc_codigo }}</td>
                                                    <td>{{ $docDocumento->doc_contenido }}</td>
                                                    <td>{{ $docDocumento->doc_id_tipo }}</td>
                                                    <td>{{ $docDocumento->doc_id_proceso }}</td>
                                                    <td>


                                                        <!--PASAR PARÁMETRO A UNA ruta, pasandole el id que necesitaba editar  -->
                                                        <a href="{{ route('documentos.edit', ['id'=>$docDocumento->doc_id])}}" class="font-medium text-blue dark:text-blue-500 hover:underline">Editar</a>

                                                        <form action="{{ route('documentos.destroy', ['id'=>$docDocumento->doc_id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
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
                                </div>








                            </div>
                        </div>
                </div>
                </x-slot>

            </div>
        </div>
    </div>
    </div>
    @section('js')
        <!-- asset función que me lleva al archivo public -->
        <script src="{{ asset('js/botonCerrar.js')}}"></script>
    @endsection
</x-app-layout>
