<!DOCTYPE html>
<html lang="en">
<?php 
include('../db.php');
require('includes/head.php'); session_start(); ?>
<? if (!isset($_SESSION['auth_user'])) {
header('Location: ../index.html');
}?>

    <body style="line-height:1;" class="">
        <div class="wrapper ">
            <?php require('includes/sidebar.php'); ?>
            <div class="main-panel" >
                <!-- Navbar -->
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
                            <a class="navbar-brand" href="javascript:;">Tipo Usuario</a>
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
                <!-- End Navbar -->
     <div class="content">
        <div class="row">
                        <!-- Segunda carta -->
         <div class="col-12">
            <div class="card">
            <div class="card-body" style="margin-bottom: -18px;">
            <div class="row">
            <div class="col-sm">
         <div class="form-floating mb-3">
            <form action="tusuario.php" method="post" >
                <label for="exampleFormControlInput1" class="floatingInput">Categoria</label>
                <select class="form-control" data-show-subtext="true" data-live-search="true" name="category">
                <?php 
                include('../db.php');
                $consulta="SELECT * FROM tusuarios";
                $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))?>

                <?php foreach ($ejecutar as $opciones): ?>
                <option value="<?php echo $opciones['Id_tipo']?>">
                <?php echo $opciones['tipo_usuarios']?></option>
                <?php endforeach ?>
                </select>
                <button type="summit" name="cambiar" style="padding:5px; font-weight:100;text-transform: none;border-radius:66px;" 
                class="btn btn-dark">Seleccionar</button>
                </form>
            </div>
         </div>
            </div>
            </div>

            </div>
            </div>
            </div>
          <?php
          $cate=1;
          if (isset($_POST['category'])) {
              $cate = $_POST['category'];
          }
          $query = "SELECT * FROM tusuarios where Id_tipo=$cate";
          $result= mysqli_query($conn, $query); 
          while($row = mysqli_fetch_assoc($result)) { ?>
          
             <div class="col-12">
                <div class="card">
     
                    <div class="card-body">
                        <h2 class="card-title">Detalles de Roles</h2>           
                        <form enctype="multipart/form-data" action="taksAdmin.php"  method="post">
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">ROL</label>
                                                <input type="text" class="form-control" placeholder="user"
                                                    name="user" value="<?php echo $row["tipo_usuarios"]; ?>" />
                                            </div>
                                            <label for="exampleFormControlInput1" class="floatingInput">MORA</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">$</span>
                                                <input type="text" class="form-control" placeholder="Nombre" name="mora"
                                                value="<?php echo $row["Mora"];?>"/>
                                            </div>
                                            <input type="hidden" name="idtipo" value="<?php echo $row['Id_tipo']; ?>">
                                            <input type="submit" name="eTipo" class="btn btn-success btn-block"
                                                value="Modificar Mora">
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                     
                    
                    <?php }
                    $conn -> close();
                    ?>
                    </div>
                </div>
                            <?php require('includes/footer.php'); ?>
            </div>
        </div>
      
    </body>

</html>
</body>

</html>