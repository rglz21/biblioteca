<?php 
session_start();
include('../db.php');
require '../Clases/classEmpleado.php';
require '../Clases/ClassUsuarios.php';

if (isset($_POST['btnPrestamo'])) {

    $user = $_SESSION['auth_id'];
    $libro = $_POST['libroi'];
    $fechaI = $_POST['fechai'];
    $fechaF = $_POST['fechaf'];
    $nulibro = new Empleados($user,$libro,$fechaI,$fechaF,"0","0","Prestado","P-".rand());
    echo $nulibro->nuevoPrestamo();
    header('Location: inicio.php');
  
}if (isset($_POST['eUser'])) {
   
    $iduser = $_POST['idUser'];
    $user = $_POST['user'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $cate = $_SESSION['auth_tipo'];
    $nulibro = new Usuario($iduser,$user,$pass,$nombre,$apellido,$correo,$cate);
    echo $nulibro->updateUsuario();
    header('Location: edituser.php');
  
}if (isset($_POST['btnRenovar'])) {

    $user = $_SESSION['auth_id'];
    $libro = $_POST['libroi'];
    $fechaI = $_POST['fechai'];
    $fechaF = $_POST['fechaf'];
    $prestamo = $_POST['prestamoi'];
    $Renovar = 1;
    $query = "SELECT * FROM Prestamo where IDPrestamo='$prestamo'";
    $result= mysqli_query($conn, $query); 
    while($row = mysqli_fetch_assoc($result)) { 
      $Renovar .= + $row['Renovacion'];
    }

    $nulibro = new Empleados($user,$libro,$fechaI,$fechaF,"0",$Renovar,"Prestado",$prestamo);
    echo $nulibro->updatePrestamo();
    header('Location: misPrestamos.php');
  
}

?>