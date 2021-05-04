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
                            <a class="navbar-brand" href="javascript:;">Bienvenidos</a>
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
            <a href="nuevoLibro.php" style="padding:10px; font-weight:100" class="btn btn-dark">
              <p>Agregar libro</p>
            </a>
            </div>
            <div class="col-sm">
         <div class="form-floating mb-3">
           <form action="inicio.php" method="post" >
            <label for="exampleFormControlInput1" class="floatingInput">Categoria</label>
            <select class="form-control" data-show-subtext="true" data-live-search="true" name="category">
             <?php 
             include('../db.php');
             $consulta="SELECT * FROM categoria";
             $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))?>

             <?php foreach ($ejecutar as $opciones): ?>
             <option value="<?php echo $opciones['IDcategoria']?>">
             <?php echo $opciones['Categoria']?></option>
             <?php endforeach ?>
             </select>
             <button type="summit" name="editar" style="padding:5px; font-weight:100;text-transform: none;border-radius:66px;" 
             class="btn btn-dark">Seleccionar</button>
             </form>
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
          $query = "SELECT * FROM bibliotecal where Categoria=$cate";
          $result= mysqli_query($conn, $query); 
          while($row = mysqli_fetch_assoc($result)) { ?>
          
                        <div class="col-sm-6">
                            <div class="card card-stats" style="height: 250px">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <img src=<?php echo $row['imagen']; ?>
                                                    width="400px" height="200px">
                                            </div>
                                        </div>
                                        <div class=" col-md-8">
                                            <div class="numbers">
                                                <p class="card-category"><?php echo $row['Editoral']; ?></p>
                                                <p class="card-title"><?php echo $row['Nombre']; ?><p>
                                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                                <form action="infLibro.php" method="post">
                                                <input type="hidden" name="cod" value="<?php echo $row['IDLibro']; ?>">
                                                <input type="hidden" name="Nombre" value="<?php echo $row['Nombre']; ?>">
                                                <input type="hidden" name="Editorial" value="<?php echo $row['Editoral']; ?>">
                                                <input type="hidden" name="ImagenEx" value="<?php echo $row['imagen']; ?>">
                                                <input type="hidden" name="Autor" value="<?php echo $row['Autor']; ?>">
                                                <input type="hidden" name="Anio" value="<?php echo $row['Año']; ?>">
                                                <input type="hidden" name="disponible" value="<?php echo $row['Ndisponible']; ?>">
                                                <input type="hidden" name="edicion" value="<?php echo $row['Ediciones']; ?>">
                                                <input type="hidden" name="cate" value="<?php echo $row['Categoria']; ?>">
                                                <input type="hidden" name="isbn" value="<?php echo $row['ISBN']; ?>">
                                                
                                                <button type="summit" name="editar" style="padding:5px; font-weight:100;text-transform: none;border-radius:66px;" class="btn btn-warning">Ver Informacion</button>
                                                </form>
                                               
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
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