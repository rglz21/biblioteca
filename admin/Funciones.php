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

        //codigo para actualizar, pero solo sql
    }
    
}

  
?>