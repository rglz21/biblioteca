<?php
/**
* Esta clase contiene funciones para agregar,editar, eliminar y listar libros
*/

class Tusuario {

    var   $Id_tipo;
    var   $Mora;
   
    public function __construct($Id_tipo,$Mora)
    {
        $this->Id_tipo = $Id_tipo;
        $this->Mora = $Mora;
 
    }

    function updateTusuario(){
        include('../db.php');
        $query = "UPDATE tusuarios set Mora = ? WHERE Id_tipo = ?";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("sd",$this->Mora,$this->Id_tipo);
        $sentencia->execute();
        $sentencia->close(); 
        $conn -> close();
    }
}