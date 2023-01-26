//Función JS cuando pulsamos en añadir
const anadirProductos = (formulario) => {

    //Recogemos los valores que vienen en el formulario
    let codigo_producto = formulario.cod.value;
    let unidades_producto = formulario.unidades.value;

    console.log(`Código del producto añadido ${codigo_producto}`);
    console.log(`Unidades del producto añadido: ${unidades_producto}`);


    //Mandamos los datos a cesta compra json
    let parametros = "codigo= "+codigo_producto+ "&unidades="+unidades_producto;

    var xhttp = new XMLHttpRequest();


    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            //Si hay respuesta
            console.log("Funciona");
            console.log(xhttp.responseText);
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
          

        }
    };
    xhttp.open("GET", "../Controlador/cesta_json.php", true);
    xhttp.send();


    //Elimino la tabla
    $tabla_eliminar = document.querySelector("#tablaCesta");

    if ($tabla_eliminar !== null) {
        $tabla_eliminar.remove();
    }

}


//Recibe el array de productos y devuelve un elemento <table> con una fila por producto
const crearTablaProductos = (arrayProductos) => {
    //Llama a crear_fila() y crear_formulario()

}

const crear_fila = () => {

}

//Recibe el texto del botón, código del producto y nombre de la función que envía el formulario (anadirProductos)
const crear_formulario = (texto, cod, funcion) => {
    //formu.onsubmit = function() return funcion(this);
}



