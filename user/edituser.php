<!DOCTYPE html>
<html lang="en">
<?php 
include('../db.php');
require('includes/head.php'); session_start();?>
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
                    <div class="card-body">
                        <h2 class="card-title">Mi Informacion</h2>   
                        <?php
                         $idUser =  $_SESSION['auth_id'];
          $query = "SELECT * FROM usuarios  WHERE ID=$idUser";
          $result= mysqli_query($conn, $query); 
          while($data = mysqli_fetch_assoc($result)) { ?>        
                        <form enctype="multipart/form-data" action="taksUser.php"  method="post">
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Usuario</label>
                                                <input type="text" class="form-control" placeholder="user"
                                                    name="user" readonly value="<?php echo $data["User"]; ?>" />
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
                                                    name="pass" value="<?php echo $data["Passwd"]; ?>"/>
                                            </div>

                                         
                                            <input type="hidden" name="idUser" value="<?php echo $data['ID']; ?>">
                                            <input type="submit" name="eUser" class="btn btn-success btn-block"
                                                value="Editar">
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