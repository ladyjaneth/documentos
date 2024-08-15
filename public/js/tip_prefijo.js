



//OBTENER TIP_PREFIJO y OBTENER EL PRO_PREFIJO
function selectOption(idSelect, Hidden) { //variable como un aprametro
    const selectDocIdTipo = document.getElementById(idSelect); //obtener el select (id)
    const optionIndexSelected = selectDocIdTipo.selectedIndex; //selecIndex tengo la posicipón de lo que seleccionaron
    const opcionSeleccionada = selectDocIdTipo.options[optionIndexSelected];//me trae todo el option seleccionada posisicón de este array
                                                                            //OPTIONS es un array (colección) y debo seleccionar uno dentro de ese array  (selectIndex)

    const atributo = opcionSeleccionada.getAttribute('data-atributo'); //data-atributo del OPTION trae PREFIJOS
    const inputHidden = document.getElementById(Hidden); //ingresar un valor al input hidden desde javascript //id del input hidden
    inputHidden.value = atributo;   // el valor que quiero ingresar al input hidden con .value (que es el atributo que se encontro arriba en atributo)

    //console.log('Funcion de unificación', selectDocIdTipo);
}


//selectOption('doc_id_tipo','tip_prefijo');
//selectOption('doc_id_proceso','pro_prefijo');










/*

//OBTENER TIP_PREFIJO
function selectOption() {
    const selectDocIdTipo = document.getElementById('doc_id_tipo'); //obtener el select (id)
    const optionIndexSelected =  selectDocIdTipo.selectedIndex; //selecIndex tengo la posicipón de lo que seleccionaron
    const opcionSeleccionada = selectDocIdTipo.options[optionIndexSelected]; //me trae todo el option seleccionada posisicón de este array
                                                                            //OPTIONS es un array (colección) y debo seleccionar uno dentro de ese array  (selectIndex)
    const prefijo =  opcionSeleccionada.getAttribute('data-prefijo') //data-prefijo un atributo del OPTION
    const tip_prefijo = document.getElementById('tip_prefijo'); //ingresar un valor al input hidden desde javascript //id del input hidden
    tip_prefijo.value = prefijo; //prefijo el valor que quiero ingresar al input hidden con -value
    console.log('options', selectDocIdTipo.options);
    console.log(tip_prefijo);
 }

//OBTENER EL PRO_PREFIJO
function selectOption2() {
    const selectDocIdProceso = document.getElementById('doc_id_proceso');
    const selectOptionIndex = selectDocIdProceso.selectedIndex; //Indexdeloption seleccionado
    const selecObcionSeleccionada = selectDocIdProceso.options[selectOptionIndex]; //llmo todas las opciones que son como un array

    const atributoProPrefijo = selecObcionSeleccionada.getAttribute('data-prefijo'); //extraer el data-prefijo
    const idInputProPrefijo =  document.getElementById('pro_prefijo');
    idInputProPrefijo.value = atributoProPrefijo;


    console.log('Idselect', selectDocIdProceso);
    console.log('index', selectOptionIndex);
    console.log('seleccionada', selecObcionSeleccionada);
    console.log(atributoProPrefijo);
} */
