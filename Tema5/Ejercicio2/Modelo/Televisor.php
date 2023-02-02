<?php

class Televisor extends Producto {
    
    //Atributos de la clase
    private $pulgadas;
    private $resolucion;
    private $panel;
    
    
    public function __construct($fila) {
        parent::__construct($fila);
        $this->pulgadas = $fila['pulgadas'];;
        $this->resolucion = $fila['resolucion'];
        $this->panel = $fila['resolucion'];
    }
    
    public function getPulgadas() {
        return $this->pulgadas;
    }

    public function getResolucion() {
        return $this->resolucion;
    }

    public function getPanel() {
        return $this->panel;
    }
    
    public function setPulgadas($pulgadas): void {
        $this->pulgadas = $pulgadas;
    }

    public function setResolucion($resolucion): void {
        $this->resolucion = $resolucion;
    }

    public function setPanel($panel): void {
        $this->panel = $panel;
    }



    
    
    
    
    
    
}

