<?php
require '../Clases/classAdmin.php';
require '../Clases/classUsuarios.php';
require '../Clases/classTipoUser.php';

if (isset($_POST['nLibro'])) {

    $cod = $_POST['cod'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $cantidad = $_POST['cantidad'];
    $anio = $_POST['anio'];
    $ISBN = $_POST['isbn'];
    $edicion = $_POST['edicion'];
    $categorias = $_POST['cate'];
    $directorio = '../archivos/';
    $subir_archivo = $directorio.basename($_FILES['imagen']['name']);
    echo "<div>";
    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $subir_archivo)) {
        } else {
           echo "La subida ha fallado";
        }
    echo "</div>";
    $imagen = $subir_archivo;
    $nulibro = new Admin($cod,$nombre,$imagen,$autor,$anio,$editorial,$cantidad,$ISBN,$edicion,$categorias);
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
    $ISBN = $_POST['isbn'];
    $edicion = $_POST['edicion'];
    $categorias = $_POST['cate'];
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
 
    $nulibro = new Admin($cod,$nombre,$imagen,$autor,$anio,$editorial,$cantidad,$ISBN,$edicion,$categorias);
    echo $nulibro->updateLibro();
    $_SESSION['message'] = 'Libro editado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: inicio.php');
  
}if (isset($_POST['DLibro'])) {
    $cod = $_POST['cod'];
    $nulibro = new Admin($cod,"0","0","0","0","0","0","0","0","0","0");
    echo $nulibro->deleteLibro();
    $_SESSION['message'] = 'Libro eliminado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: inicio.php');
  
}if (isset($_POST['nUser'])) {
   
    $user = $_POST['user'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $cate = $_POST['cate'];
    $nulibro = new Usuario(rand(5, 1000),$user,$pass,$nombre,$apellido,$correo,$cate);
    echo $nulibro->nuevoUsuario();
    $_SESSION['message'] = 'Usuario agregado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: nuevoUsuario.php');
  
}if (isset($_POST['eUser'])) {
   
    $iduser = $_POST['idUser'];
    $user = $_POST['user'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $cate = $_POST['cate'];
    $nulibro = new Usuario($iduser,$user,$pass,$nombre,$apellido,$correo,$cate);
    echo $nulibro->updateUsuario();
    $_SESSION['message'] = 'Usuario agregado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: usuarios.php');
  
}if (isset($_POST['dUsuario'])) {
    $iduser = $_POST['idUser'];
    $nulibro = new Usuario($iduser,"0","0","0","0","0","0");
    echo $nulibro->deleteUsuario();
    $_SESSION['message'] = 'Libro eliminado correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: usuarios.php');
  
}if (isset($_POST['eTipo'])) {
   
    $idTipos = $_POST['idtipo'];
    $mora = $_POST['mora'];
    $nulibro = new Tusuario($idTipos,$mora);
    echo $nulibro->updateTusuario();
    header('Location: tusuario.php');
  
}

?>