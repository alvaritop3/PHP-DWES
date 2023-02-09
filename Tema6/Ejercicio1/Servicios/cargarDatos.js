//Función JS cuando pulsamos en añadir
const anadirProductos = (formulario) => {

//Recogemos los valores que vienen en el formulario
let codigo_producto = formulario.cod.value;
        let unidades_producto = formulario.unidades.value;
        //Mandamos los datos a cesta compra json
        let parametros = "codigo=" + codigo_producto + "&unidades=" + unidades_producto;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
        cargarCesta();
        }
        };
        xhttp.open("POST", "../Controlador/anadir_json.php", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhttp.send(parametros);
        //Evito que se recargue la página
        return false;
}

//Función que devuelve en formato Json los productos de la cesta y pinta la tabla
const cargarCesta = () => {


var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
        console.log("Llama a cargar Cesta");
                $array_cesta = xhttp.responseText;
                console.log($array_cesta);
                crearTablaProductos($array_cesta);
               
        }
        };
        xhttp.open("GET", "../Controlador/cesta_json.php", true);
        xhttp.send();
        //Elimino la tabla
        /*$tabla_eliminar = document.querySelector("#tablaCesta");
         
         if ($tabla_eliminar !== null) {
         $tabla_eliminar.remove();
         }*/

}


//Recibe el array de productos y devuelve un elemento <table> con una fila por producto
const crearTablaProductos = array_cesta => {
//Llama a crear_fila() y crear_formulario()
if (array_cesta.length > 0){
    
        //Seleccionar la tabla
        let $tabla_cesta = document.getElementById('tabla_cesta');

        console.log($tabla_cesta);
        
        //Creamos la cabecera de la tabla
        let $tr = document.createElement('tr');
        $tabla_cesta.appendChild($tr);
        
        let $th_nombre = document.createElement('th');
        $th_nombre.textContent = "Nombre";
        $tr.appendChild($th_nombre);
        
        let $th_vacio = document.createElement('th');
        $th_vacio.textContent = " ";
        $tr.appendChild($th_vacio);
        
        let $th_unidades = document.createElement('th');
        $th_unidades.textContent = "Unidades";
        $tr.appendChild($th_unidades);
        
        Object.entries(array_cesta).forEach((value) => {

        let $td_nombre = document.createElement('td');
        $td_nombre.textContent = value.unidades;
        $tr.appendChild($td_nombre);
        
        let $td_vacio = document.createElement('td');
        $td_vacio.textContent = " ";
        $tr.appendChild($td_vacio);
        
        let $td_unidades = document.createElement('td');
        $td_unidades.textContent = value.unidades;
        $tr.appendChild($td_unidades);
        
        });
        }

}

const crear_fila = (producto) => {

}

//Recibe el texto del botón, código del producto y nombre de la función que envía el formulario (anadirProductos)
const crear_formulario = (texto, cod, funcion) => {
//formu.onsubmit = function() return funcion(this);
}



