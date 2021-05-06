<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php');  session_start(); ?>
<? if (!isset($_SESSION['auth_user'])) {
header('Location: ../index.html');
}?>
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
                        
                        <ul class="navbar-nav">
                                <li class="nav-item btn-rotate dropdown">
                                    <a class="nav-link dropdown-toggle" href="http://example.com"
                                        id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="nc-icon nc-bell-55"></i>
                                        <p>
                                            <span class="d-lg-none d-md-block">Opciones</span>
                                        </p>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="../index.php">Cerrar Sesion</a>
                                    </div>
                                </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="card" id="esfera">
      <?php 
      if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
      <?php session_unset(); } ?>
                    <div class="card-body">
                        <h2 class="card-title">Ingrese informacion del usuario</h2>           
                        <form enctype="multipart/form-data" action="taksAdmin.php"  method="post">
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Usuario</label>
                                                <input type="text" class="form-control" placeholder="user"
                                                    name="user" required />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Nombre</label>
                                                <input type="text" class="form-control" placeholder="Nombre" name="nombre" required />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Apellido</label>
                                                <input type="text" class="form-control" placeholder="Apellido"
                                                    name="apellido" required/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Correo</label>
                                                <input type="email" class="form-control" placeholder="Correo"
                                                    name="correo" required/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Contraseña</label>
                                                <input type="text" class="form-control" placeholder="Password"
                                                    name="pass" required/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Categoria</label>
                                                <select class="form-control" data-show-subtext="true" data-live-search="true"
                                                    name="cate">

                                    <?php 
                                    include('../db.php');
                                    $consulta="SELECT * FROM tusuarios";
                                    $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))?>

                                        <?php foreach ($ejecutar as $opciones): ?>
                                        <option value="<?php echo $opciones['Id_tipo']?>">
                                            <?php echo $opciones['tipo_usuarios']?> - Valor de mora: <?php echo $opciones['Mora']?>$ </option>

                                        <?php endforeach ?>
                                    </select>
                                            </div>
                                            <input type="submit" name="nUser" class="btn btn-success btn-block"
                                                value="Agregar Usuario">
                                        </div>
                                </form>
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