<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('EDITAR') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <!--cuando le diga crear el va a enviar al store del controlador docDocumentos -->
                        <form action="{{ route('documentos.update', ['id'=>$docDocumento->doc_id]) }}" class="w-full text-sm text-lef rtl:text-right text-gray-500 dark:text-gray-400" method="POST">
                            @method('PUT')
                            @csrf
                            <!--$docDocumento es del método editar del cntrolador -->
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 sm:px-6 lg:px-8">
                                    <!-- trae la info para que se evea en el form editar -->
                                    <label for="doc_nombre" class="form-label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Nombre del Documento
                                    </label> <!-- value, poner un dato por defecto u obtener lo que el usuario escribio -->
                                    <input type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" value="{{ $docDocumento->doc_nombre}}" name="doc_nombre" id="doc_nombre">
                                </div>

                                <div class="w-full md:w-1/2 sm:px-6 lg:px-8">
                                    <label for="doc_codigo" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                                        Código del Documento
                                    </label> <!-- inpout disabled, se desabilito, para solo ver, y este no se envia al formulario -->
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" disabled class="form-control" value="{{ $docDocumento->doc_codigo}}" name="doc_codigo" id="doc_codigo">

                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full sm:px-6 lg:px-8">
                                    <label for="doc_contenido" class="form-label block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Contenido del Documento</label>
                                    <div class="flex flex-wrap -mx-3 mb-6">
                                        <!--RECONOCER CODIGO PHP {}-->
                                        <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="doc_contenido" placeholder="Leave a comment here" id="doc_contenido">{{ $docDocumento->doc_contenido}}</textarea>
                                    </div>



                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-2">
                                <div class="w-full md:w-1/2 sm:px-6 lg:px-8">
                                    <!--TIP_TIPO_DOC-->
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="doc_id_tipo">
                                        Tipo de Documento
                                    </label>
                                    <div class="relative">
                                        <!--onchange, llama la función del js para que fuincione en el select -->
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="doc_id_tipo" id="doc_id_tipo" onChange="selectOption('doc_id_tipo', 'tip_prefijo')">
                                            <option>Seleccione...</option>
                                            <!--el foreach recorra todos los $tipTiposDocs y va cogiendo de a uno en uno $tipTipoDoc-->
                                            @foreach($tipTiposDocs as $tipTipoDoc)
                                            <!--(controlador llama al service)ver en el service-- $tipTipoDoc muestra para que el usuario vea lo que va a seleccionar, controlador-->
                                            <option value="{{ $tipTipoDoc->tip_id}}" @if($tipTipoDoc->tip_id === $docDocumento->doc_id_tipo) selected @endif
                                                data-atributo="{{$tipTipoDoc->tip_prefijo}}">
                                                <!-- data-atributo = guardar el prefijo de la opción seleccionada para qe con js se pueda meter el valor en el input hidden -->
                                                {{$tipTipoDoc->tip_nombre}}
                                            </option> <!-- el value es lo que va a enviar el formulario al backend es decir el id -->
                                            @endforeach
                                            <!--El método first, busca el elemento que coincida con la condición booleana      hasta aqui se obtiene un objeto y se saca la propiedad-->
                                        </select>
                                        <!--Una vez el método first obtenga ese elemento, se extrae la propiedad que nos interesa, que en este caso sería tip_prefijo -->
                                        <input id="tip_prefijo" name="tip_prefijo" type="hidden" value="{{ $tipTiposDocs->first(fn($tipTipoDoc) => $tipTipoDoc->tip_id == $docDocumento->doc_id_tipo)->tip_prefijo }}" />
                                        <!--valor actual-->
                                        <!--comparo la llave que tengo en tip_id con la que tenho guardada en docDocumento-->
                                    </div>
                                </div>


                                <div class="w-full md:w-1/2 sm:px-6 lg:px-8">
                                    <!--PRO_PROCESO-->
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="doc_id_proceso">
                                        Procesos
                                    </label>
                                    <div class="relative">
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="doc_id_proceso" id="doc_id_proceso" onchange="selectOption('doc_id_proceso', 'pro_prefijo')">
                                            <option selected>Seleccione...</option>
                                            @foreach($proProcesos as $proProceso)
                                            <!-- data= necesitas poner más información-->
                                            <option value="{{$proProceso->pro_id}}" @if($proProceso->pro_id === $docDocumento->doc_id_proceso) selected @endif
                                                data-atributo="{{$proProceso->pro_prefijo}}">{{$proProceso->pro_nombre}}</option>
                                            @endforeach
                                            <!--para que el data-prefijo se muestre en el input oculto se debe crear un js -->
                                        </select>
                                        <!--cuado se selecciones algo arriba este debe quear con el valor seleccionado   este input queda conb lo que hayan seleccionado en el select -->
                                        <input id="pro_prefijo" name="pro_prefijo" type="hidden" value="{{ $proProcesos->first(fn($proProceso)=>$proProceso->pro_id == $docDocumento->doc_id_proceso)->pro_prefijo}}" />
                                    </div>

                                </div>








                            </div>

                            <div class="flex flex-wrap -mx-3 mb-6 py-2">
                                <div class="w-full md:w-1/2 sm:px-6 lg:px-8">
                                    <button class="bg-transparent  hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">
                                        Actualizar
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>

@section('js')
<script src="{{ asset('js/tip_prefijo.js')}}"></script>
@endsection
