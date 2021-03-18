<?php
require 'Funciones.php';

if (isset($_POST['nLibro'])) {

    $cod = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $cantidad = $_POST['cantidad'];
    $anio = $_POST['anio'];
    $imagen = $_POST['imagen'];

    $nulibro = new Funciones($cod,$nombre,$imagen,$autor,$anio,$editorial,$cantidad);
    echo $nulibro->nuevoLibro();
    $_SESSION['message'] = 'Task Saved Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: nuevoLibro.php');
  
}

?>