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

function prosMora($mora,$idPrestamo,$actual){
   include('../db.php');
        $total=$mora+$actual;
        $query = "UPDATE prestasmo set Mora = ? WHERE IDPrestamo = ?";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("ss",$total, $idPrestamo );
        $sentencia->execute();
        $sentencia->close(); 
        $conn->close();
}
function pagar($idPrestamo){
        include('../db.php');
             $total=0;
             $estados='Cancelado';
             $query = "UPDATE prestasmo set Mora = ?, Estado = ? WHERE IDPrestamo = ?";
             $sentencia = $conn->prepare($query);
             $sentencia->bind_param("sss",$total,$estados, $idPrestamo );
             $sentencia->execute();
             $sentencia->close(); 
             $conn->close();
     }
?>