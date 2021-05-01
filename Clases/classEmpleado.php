<?php
/**
* Esta clase contiene funciones para agregar,editar, eliminar y listar
*/

class Empleados  {

    var   $IDU;
    var   $CLibro;
    var   $fechaI;
    var   $fechaF;
    var   $Mora;
    var   $Renovacion;
    var   $Estado;
    var   $IDPrestamo;
   
    public function __construct($IDU, $CLibro,$fechaI,$fechaF,$Mora,$Renovacion,$Estado,$IDPrestamo)
    {
        $this->IDU = $IDU;
        $this->CLibro = $CLibro;
        $this->fechaI = $fechaI;
        $this->fechaF = $fechaF;
        $this->Mora = $Mora;
        $this->Renovacion = $Renovacion;
        $this->Estado = $Estado;
        $this->IDPrestamo = $IDPrestamo;
        
    }

    function nuevoPrestamo()
    {
        include('../db.php');
        $query = "INSERT INTO prestasmo(IDU,CLibro,FechaI,FechaF,Mora,Renovacion,Estado,IDPrestamo) VALUES (?,?,?,?,?,?,?,?)"; 
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("ssssddss",$this->IDU, $this->CLibro, $this->fechaI, $this->fechaF, $this->Mora, $this->Renovacion, $this->Estado, $this->IDPrestamo);
        $sentencia->execute();
        $sentencia->close(); 
        $conn->close();
    }

    function updatePrestamo(){
        include('../db.php');
        $query = "UPDATE prestasmo set IDU = ?, CLibro = ?, FechaI = ?, FechaF = ?, Mora = ? , Renovacion = ?, Estado = ? WHERE IDPrestamo = ?";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("ssssddss",$this->IDU, $this->CLibro, $this->fechaI, $this->fechaF, $this->Mora, $this->Renovacion, $this->Estado, $this->IDPrestamo);
        $sentencia->execute();
        $sentencia->close(); 
        $conn -> close();
    }

    function deleteLibro(){
        include('../db.php');
        $query = "DELETE FROM bibliotecal WHERE IDLibro='$this->codLibro'";
        $result = mysqli_query($conn, $query);
        $conn -> close();
    }
    
}

  
?>