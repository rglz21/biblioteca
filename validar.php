<?php
session_start();
include('db.php');
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];

$tipo = 0;
$id =0;
$user = "";
$consulta="SELECT*FROM usuarios where User='$usuario' and Passwd='$contraseña'";
$resultado=mysqli_query($conn,$consulta);


foreach ($resultado as $opciones):
  $_SESSION['auth_id'] = $opciones['ID'];
  $_SESSION['auth_user'] = $opciones['User'];
  $tipo = $opciones['tipo'];
  endforeach;

if($tipo == 1){
  header('Location: admin/inicio.php ');
  
}if($tipo == 2){
  header('Location: empleado/listarusuarios.php ');
  
}if($tipo == 3){
  header('Location: user/infouser.php ');
  
}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conn);
