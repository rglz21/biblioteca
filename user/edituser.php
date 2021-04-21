<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<?php require('includes/head.php'); ?>

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
                        <a class="navbar-brand" href="javascript:;">Editar Informacion de usuario</a>
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
      <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION['message']?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
            </div>
      <?php session_unset(); } ?>
                    <div class="card-body">
                        <h2 class="card-title">Editar informacion de usuario</h2>
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="mb-3">
                                <form action="taksAdmin.php"  method="post">
                                    <img src="img/user.png"
                                        class="img-thumbnail" alt="...">
                                    <br>
                                    <br>
                                    <label for="formFile" class="form-label">Nueva foto de usuario</label>
                                    <input class="form-control" type="file" name="imagen">
                                </div>
                            </div>
                            <div class="col-md-8">
                                
                                    <div class="row">
                                        <div class="col">
                                             <form action="" method="post">

                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Nombre de usuario</label>
                                                <input type="text" class="form-control" placeholder="Nombre"
                                                    name="nombreuser" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Contraseña</label>
                                                <input type="text" class="form-control" placeholder="Nueva contraseña"
                                                    name="newpass" />
                                                    <input type="submit" name="saveuser" class="btn btn-success btn-block" value="Guardar cambios">

                                            </form>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>

                    </form>

                </div>
            </div>
        </div>

            

//prueba
</body>

</html>