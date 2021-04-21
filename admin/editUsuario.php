<? if (!isset($_POST['idUser'])) {
header('Location: usuarios.php');
}?>
<!DOCTYPE html>
<html lang="en">
<?php 
include('../db.php');
require('includes/head.php'); session_start();?>

<body>
    <div class="wrapper ">
        <?php require('includes/sidebar.php'); ?>
        <div class="main-panel" style="height: 100vh;">
            <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="javascript:;">Nuevo Libro</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="nc-icon nc-zoom-split"></i>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item btn-rotate dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="nc-icon nc-bell-55"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="card" id="esfera">
                    <div class="card-body">
                        <h2 class="card-title">Ingrese informacion del usuario</h2>   
                        <?php
                         $idUser = $_POST['idUser'];
          $query = "SELECT * FROM usuarios  WHERE ID=$idUser";
          $result= mysqli_query($conn, $query); 
          while($data = mysqli_fetch_assoc($result)) { ?>        
                        <form enctype="multipart/form-data" action="taksAdmin.php"  method="post">
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Usuario</label>
                                                <input type="text" class="form-control" placeholder="user"
                                                    name="user" value="<?php echo $data["User"]; ?>" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Nombre</label>
                                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" 
                                                value="<?php echo $data["Nombre"]; ?>"/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Apellido</label>
                                                <input type="text" class="form-control" placeholder="Apellido"
                                                    name="apellido" value="<?php echo $data["Apellido"]; ?>"/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Correo</label>
                                                <input type="email" class="form-control" placeholder="Correo"
                                                    name="correo" value="<?php echo $data["Correo"]; ?>" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Contraseña</label>
                                                <input type="text" class="form-control" placeholder="Password"
                                                    name="pass" value="<?php echo $data["Passwd"]; ?>$"/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Categoria</label>
                                                <select class="form-control" data-show-subtext="true" data-live-search="true"
                                                    name="cate">

                                    <?php 
                                    include('../db.php');
                                    $tipo = $data["tipo"];
                                    $consulta="SELECT * FROM tusuarios where Id_tipo = $tipo
                                     union all SELECT * FROM tusuarios where ID_tipo != $tipo";
                                    $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))?>

                                        <?php foreach ($ejecutar as $opciones): ?>
                                        <option value="<?php echo $opciones['Id_tipo']?>">
                                            <?php echo $opciones['tipo_usuarios']?> - Valor de mora: <?php echo $opciones['Mora']?>$ </option>

                                        <?php endforeach ?>
                                    </select>
                                            </div>
                                            <input type="hidden" name="idUser" value="<?php echo $data['ID']; ?>">
                                            <input type="submit" name="eUser" class="btn btn-success btn-block"
                                                value="Agregar Usuario">
                                        </div>
                                </form>
                                <?php }  $conn -> close();?>
                            </div>
                        </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>
        
    </div>
    <?php require('includes/sidebar.php'); ?>
    </div>
    
</body>

</html>