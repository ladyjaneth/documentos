<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('CREAR DOCUMENTO') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!--cuando le diga crear el va a enviar al store del controlador docDocumentos -->
                        <form class="w-full max-w-lg" action="{{ route('documentos.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3 sm:px-6 lg:px-8"> <!--ponerle padding a los lados del input -->
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="doc_nombre">
                                        Nombre del Documento
                                    </label>
                                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="doc_nombre" type="text" name="doc_nombre">

                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3 sm:px-6 lg:px-8">
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="doc_contenido">
                                        Contenido del Documento
                                    </label>
                                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="doc_contenido" name="doc_contenido"></textarea>

                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full md:w-1/2 sm:px-6 lg:px-8">
                                    <!--TIP_TIPO_DOC-->
                                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="doc_id_tipo">
                                        Tipo de Documento
                                    </label>
                                    <div class="relative">
                                        <!--onchange, llama la función del js para que fuincione en el select -->
                                        <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="doc_id_tipo" id="doc_id_tipo" onChange="selectOption('doc_id_tipo', 'tip_prefijo')">
                                            <option selected>Seleccione...</option>
                                            <!--el foreach recorra todos los $tipTiposDocs y va cogiendo de a uno en uno $tipTipoDoc-->
                                            @foreach($tipTiposDocs as $tipTipoDoc)
                                            <!--$tipTipoDoc muestra para que el usuario vea lo que va a seleccionar, controlador-->
                                            <option value="{{$tipTipoDoc->tip_id}}" data-atributo="{{$tipTipoDoc->tip_prefijo}}">{{$tipTipoDoc->tip_nombre}}</option> <!-- el value es lo que va a enviar el formulario al backend es decir el id -->
                                            @endforeach
                                        </select>
                                        <input id="tip_prefijo" name="tip_prefijo" type="hidden" />
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
                                            <option value="{{$proProceso->pro_id}}" data-atributo="{{$proProceso->pro_prefijo}}">{{$proProceso->pro_nombre}}</option>
                                            @endforeach
                                            <!--para que el data-prefijo se muestre en el input oculto se debe crear un js -->
                                        </select>
                                        <input id="pro_prefijo" value="" name="pro_prefijo" type="hidden" />
                                        <!--cuado se selecciones algo arriba este debe quear con el valor seleccionado
                                                                                                    este input queda conb lo que hayan seleccionado en el select -->
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-wrap -mx-3 mb-6 py-2">
                                <div class="w-full md:w-1/2 sm:px-6 lg:px-8">
                                    <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded" type="submit">
                                        Crear
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
