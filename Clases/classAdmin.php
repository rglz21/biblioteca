<?php
/**
* Esta clase contiene funciones para agregar,editar, eliminar y listar libros
*/

class Admin {

    var   $codLibro;
    var   $nombre;
    var   $imagen;
    var   $autor;
    var   $anio;
    var   $editorial;
    var   $nDisponible;
    var   $ISBN;
    var   $ediciones;
    var   $categoria;
   
    public function __construct($codLibro, $nombre,$imagen,$autor,$anio,$editorial,$nDisponible,$ISBN,$ediciones,$categoria)
    {
        $this->codLibro = $codLibro;
        $this->nombre = $nombre;
        $this->imagen = $imagen;
        $this->autor = $autor;
        $this->anio = $anio;
        $this->editorial = $editorial;
        $this->nDisponible = $nDisponible;
        $this->ISBN = $ISBN;
        $this->ediciones = $ediciones;
        $this->categoria = $categoria;

        
    }

    function nuevoLibro()
    {
        include('../db.php');
        $query = "INSERT INTO bibliotecal (IDLibro,ISBN,imagen,Nombre,Autor,Año,Editoral,Ediciones,Categoria,Cantidad,Ndisponible) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("ssssssssdds",$this->codLibro,$this->ISBN,$this->imagen,$this->nombre,$this->autor,$this->anio,$this->editorial,$this->ediciones,$this->categoria,$this->nDisponible,$this->nDisponible);
        $sentencia->execute();
        $sentencia->close(); 
        $conn->close();
       
    }

    function updateLibro(){
        include('../db.php');
        $query = "UPDATE bibliotecal set ISBN = ?, imagen = ?, Nombre = ?, Autor = ?, Año = ? , Editoral = ?,Ediciones = ?,Categoria = ?, Cantidad = ?, Ndisponible = ? WHERE IDLibro=?";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("sssssssddss",$this->ISBN,$this->imagen,$this->nombre,$this->autor,$this->anio,$this->editorial,$this->ediciones,$this->categoria,$this->nDisponible,$this->nDisponible,$this->codLibro);
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