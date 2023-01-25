//Elimina el contenido de la sección e introduce una tabla con los productos obtenidos
const cargarProductos = () =>{
    
    let  datos = this;
    console.log(datos);
    
    //Recojo el código del producto que está en un campo oculo
    /*$cod = document.querySelector('#cod').value;
    $unidades = document.querySelector('#unidades').value;
    console.log($cod);
    console.log($unidades);
*/
    //Elimino la tabla
    $tabla_eliminar = document.querySelector("#tablaCesta");

    if ($tabla_eliminar !== null){
        $tabla_eliminar.remove();
    }
    
    var xhttp = new XMLHttpRequest();       
 	xhttp.onreadystatechange = function() {
 	 if (this.readyState == 4 && this.status == 200) {  
 	//Si hay respuesta
        var producto = JSON.parse(this.response);
        console.log(producto);
		
	 }
	};
	xhttp.open("GET", "../Controlador/productos_json.php", true);     
	xhttp.send(); 
	// para que no se siga el link que llama a esta funciÃ³n
	return false;
    
    
}
//Recibe el array de productos y devuelve un elemento <table> con una fila por producto
const crearTablaProductos = (arrayProductos) =>{
  //Llama a crear_fila() y crear_formulario()
  
}

const crear_fila=()=>{
    
}

//Recibe el texto del botón, código del producto y nombre de la función que envía el formulario (anadirProductos)
const crear_formulario = (texto, cod, funcion) => {
    //formu.onsubmit = function() return funcion(this);
}



