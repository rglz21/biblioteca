<?php
/**
* Esta clase contiene funciones para agregar,editar, eliminar y listar
*/

class Admin {

    var   $codLibro;
    var   $nombre;
    var   $imagen;
    var   $autor;
    var   $anio;
    var   $editorial;
    var   $nDisponible;
   
    public function __construct($codLibro, $nombre,$imagen,$autor,$anio,$editorial,$nDisponible)
    {
        $this->codLibro = $codLibro;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->autor = $autor;
        $this->anio = $anio;
        $this->editorial = $editorial;
        $this->nDisponible = $nDisponible;
        
    }

    function nuevoLibro()
    {
        include('../db.php');
        $query = "INSERT INTO bibliotecal (IDLibro,imagen,Nombre,Autor,Año,	Editoral,Cantidad,Ndisponible) VALUES (?,?,?,?,?,?,?,?)";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("ssssssds",$this->codLibro,$this->imagen,$this->nombre,$this->autor,$this->anio,$this->editorial,$this->nDisponible,$this->nDisponible);
        $sentencia->execute();
        $sentencia->close(); 
        $conn->close();
    }

    function updateLibro(){
        include('../db.php');
        $query = "UPDATE bibliotecal set imagen = ?, Nombre = ?, Autor = ?, Año = ? , Editoral = ?, Cantidad = ?, Ndisponible = ? WHERE IDLibro=?";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("sssssdss",$this->imagen,$this->nombre,$this->autor,$this->anio,$this->editorial,$this->nDisponible,$this->nDisponible,$this->codLibro);
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