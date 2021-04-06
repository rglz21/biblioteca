<?php 
require '../Clases/classEmpleado.php';

if (isset($_POST['btnguardar'])) {

    $user = $_POST['usuarioi'];
    $libro = $_POST['libroi'];
    $fechaI = $_POST['fechai'];
    $fechaF = $_POST['fechaf'];
    $nulibro = new Empleados($user,$libro,$fechaI,$fechaF,"0","0","Prestado","#".rand());
    echo $nulibro->nuevoPrestamo();
    $_SESSION['message'] = 'Libro prestado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: Prestamo.php');
  
}

?>