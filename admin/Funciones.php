<?php
/**
* Esta clase contiene funciones para agregar,editar, eliminar y listar
*/

class Funciones {

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

    public function __construct0($codLibro)
    {
        $this->codLibro = $codLibro;
        
    }

    function nuevoLibro()
    {
        include('../db.php');
        $query = "INSERT INTO bibliotecal(IDLibro,imagen,Nombre,Autor,Año,	Editoral,Cantidad,Ndisponible) VALUES ('$this->codLibro', '$this->imagen'
        , ' $this->nombre', '$this->autor', '$this->anio', '$this->editorial', '0', '$this->nDisponible')";
        $result = mysqli_query($conn, $query);
        if(!$result) {
            die("Query Failed.");  
        } 
        $conn -> close();
    }

    function updateLibro(){
        include('../db.php');
        $query = "UPDATE bibliotecal set imagen = '$this->imagen', Nombre = '$this->nombre', Autor = '$this->autor', Año = '$this->anio'
        , Editoral = '$this->editorial', Cantidad = '0', Ndisponible = '$this->nDisponible' WHERE IDLibro='$this->codLibro'";
        mysqli_query($conn, $query);
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