<?php

function prosEstado($idPrestamo,$fecha_entrada){
    $fecha_actual = date("Y-m-d");
     $estado = "Vencido";
if($fecha_actual > $fecha_entrada){
        include('db.php');
  $query = "UPDATE prestasmo set Estado = ? WHERE IDPrestamo = ?";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("ss",$estado, $idPrestamo );
        $sentencia->execute();
        $sentencia->close(); 
        $conn->close();
}
}

function prosMora($mora,$idPrestamo){
   include('../db.php');
        $query = "UPDATE prestasmo set Mora = ? WHERE IDPrestamo = ?";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("ss",$mora, $idPrestamo );
        $sentencia->execute();
        $sentencia->close(); 
        $conn->close();
}

?>