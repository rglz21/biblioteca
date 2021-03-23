<?php
require 'Funciones.php';

if (isset($_POST['nLibro'])) {

    $cod = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $cantidad = $_POST['cantidad'];
    $anio = $_POST['anio'];
    $directorio = '../archivos/';
    $subir_archivo = $directorio.basename($_FILES['imagen']['name']);
    echo "<div>";
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $subir_archivo)) {
        } else {
           echo "La subida ha fallado";
        }
    echo "</div>";
    $imagen = $subir_archivo;
    $nulibro = new Funciones($cod,$nombre,$imagen,$autor,$anio,$editorial,$cantidad);
    echo $nulibro->nuevoLibro();
    $_SESSION['message'] = 'Libro Guardado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: nuevoLibro.php');
  
}if (isset($_POST['ELibro'])) {

    $cod = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $cantidad = $_POST['cantidad'];
    $anio = $_POST['anio'];
    $directorio = '../archivos/';
    $imagen ="";

    if($_FILES['imagen']['name'] != null){
    $subir_archivo = $directorio.basename($_FILES['imagen']['name']);
    echo "<div>";
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $subir_archivo)) {
        } else {
           echo "La subida ha fallado";
        }
  
    $imagen = $subir_archivo;
    } else{
        $imagen = $_POST['ImagenE'];
      
    }
 
    $nulibro = new Funciones($cod,$nombre,$imagen,$autor,$anio,$editorial,$cantidad);
    echo $nulibro->updateLibro();
    $_SESSION['message'] = 'Libro editado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: inicio.php');
  
}if (isset($_POST['DLibro'])) {
    $cod = $_POST['cod'];
    $nulibro = new Funciones($cod,"0","0","0","0","0","0");
    echo $nulibro->deleteLibro();
    $_SESSION['message'] = 'Libro eliminado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: inicio.php');
  
}

?>