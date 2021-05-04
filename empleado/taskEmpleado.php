<?php 
include('../db.php');
require '../Clases/classEmpleado.php';
require '../Clases/classPrestamo.php';

if (isset($_POST['btnguardar'])) {

    $user = $_POST['usuarioi'];
    $libro = $_POST['libroi'];
    $fechaI = $_POST['fechai'];
    $fechaF = $_POST['fechaf'];
    $nulibro = new Empleados($user,$libro,$fechaI,$fechaF,"0","0","Prestado","P".rand());
    echo $nulibro->nuevoPrestamo();
    $_SESSION['message'] = 'Libro prestado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: Prestamo.php');
  
}if (isset($_POST['btnMora'])) {

    $query = "SELECT t.Mora, p.IDPrestamo from tusuarios t, usuarios u, prestasmo p WHERE t.Id_tipo = u.tipo and u.ID = p.IDU and p.Estado = 'Vencido'";
    $result= mysqli_query($conn, $query); 
    while($opciones = mysqli_fetch_assoc($result)) { 
    prosMora($opciones['Mora'],$opciones['IDPrestamo']);
    echo $opciones['Mora'];
    echo $opciones['IDPrestamo'];
    }
    header('Location: listarusuarios.php');
  
}

?>