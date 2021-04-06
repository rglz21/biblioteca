<?php
/**
* Esta clase contiene funciones para agregar,editar, eliminar y listar libros
*/

class Usuario {

    var   $ID;
    var   $User;
    var   $Passwd;
    var   $Nombre;
    var   $Apellido;
    var   $Correo;
    var   $tipo;
   
    public function __construct($ID,$User,$Passwd,$Nombre,$Apellido,$Correo,$tipo)
    {
        $this->ID = $ID;
        $this->User = $User;
        $this->Passwd = $Passwd;
        $this->Nombre = $Nombre;
        $this->Apellido = $Apellido;
        $this->Correo = $Correo;
        $this->tipo = $tipo;   
    }

    function nuevoUsuario()
    {
        include('../db.php');
        $query = "INSERT INTO usuarios (ID,User,Passwd,Nombre,Apellido,Correo,tipo) VALUES (?,?,?,?,?,?,?)";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("ssssssd",$this->ID,$this->User,$this->Passwd,$this->Nombre,$this->Apellido,$this->Correo,$this->tipo);
        $sentencia->execute();
        $sentencia->close(); 
        $conn->close();
       
    }

    function updateUsuario(){
        include('../db.php');
        $query = "UPDATE usuarios set User = ?, Passwd = ?, Nombre = ?, Apellido = ?, Correo = ? , tipo = ? WHERE ID = ?";
        $sentencia = $conn->prepare($query);
        $sentencia->bind_param("sssssds",$this->User,$this->Passwd,$this->Nombre,$this->Apellido,$this->Correo,$this->tipo,$this->ID);
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