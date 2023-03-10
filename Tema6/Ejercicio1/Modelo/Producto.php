<?php

class Producto implements JsonSerializable {

    //Atributos de la Clase
    private $cod;
    private $nombre;
    private $nombre_corto;
    private $pvp;
    private $familia;
    private $descripcion;

    //Constructor (Le paso una fila y accedo a sus valores por la clave)
    function __construct($fila) {
        $this->cod = $fila['cod'];
        $this->nombre = $fila['nombre'];
        $this->nombre_corto = $fila['nombre_corto'];
        $this->pvp = $fila['PVP'];
        $this->familia = $fila['familia'];
        $this->descripcion = $fila['descripcion'];
    }

    //Getters
    public function getCod() {
        return $this->cod;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNombre_corto() {
        return $this->nombre_corto;
    }

    public function getPvp() {
        return $this->pvp;
    }

    public function getFamilia() {
        return $this->familia;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function jsonSerialize(): mixed {
        $objeto_producto = get_object_vars($this);
        return $objeto_producto;
        
         /*[
            'codigo' => $this->cod,
            'nombre' => $this->nombre,
            'nombre_corto' => $this->nombre_corto,
            'PVP' => $this->pvp,
            'familia' => $this->familia
         ];*/
        
    }
  


}
