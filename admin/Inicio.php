<!DOCTYPE html>
<html lang="en">
<?php 
include('../db.php');
require('includes/head.php'); ?>


    <body class="">
        <div class="wrapper ">
            <?php require('includes/sidebar.php'); ?>
            <div class="main-panel" style="height: 100vh;">
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
                            <a class="navbar-brand" href="javascript:;">Libros mas prestados</a>
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
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="#">Action</a>
                                        <a class="dropdown-item" href="#">Another action</a>
                                        <a class="dropdown-item" href="#">Something else here</a>
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
            <div class="card-body">
            <a href="nuevoLibro.php" class="btn btn-dark">
              <p>Agregar libro</p>
            </a>
            </div>
            </div>
            </div>
          <?php
         
          $query = "SELECT * FROM bibliotecal";
          $result= mysqli_query($conn, $query); 
          while($row = mysqli_fetch_assoc($result)) { ?>
          
                        <div class="col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <img src=<?php echo $row['imagen']; ?>
                                                    width="300px" height="150px">
                                            </div>
                                        </div>
                                        <div class=" col-md-8">
                                            <div class="numbers">
                                                <p class="card-category"><?php echo $row['Editoral']; ?></p>
                                                <p class="card-title"><?php echo $row['Nombre']; ?><p>
                                                <form action="editLibro.php" method="post">
                                                <input type="hidden" name="cod" value="<?php echo $row['IDLibro']; ?>">
                                                <input type="hidden" name="Nombre" value="<?php echo $row['Nombre']; ?>">
                                                <input type="hidden" name="Editorial" value="<?php echo $row['Editoral']; ?>">
                                                <input type="hidden" name="ImagenEx" value="<?php echo $row['imagen']; ?>">
                                                <input type="hidden" name="Autor" value="<?php echo $row['Autor']; ?>">
                                                <input type="hidden" name="Anio" value="<?php echo $row['Año']; ?>">
                                                <input type="hidden" name="disponible" value="<?php echo $row['Ndisponible']; ?>">
                                                <button type="summit" name="editar" class="btn btn-primary">Editar</button>
                                                </form>
                                                <form action="taksAdmin.php" method="post">
                                                <input type="hidden" name="cod" value="<?php echo $row['IDLibro']; ?>">
                                                <button type="summit" name="DLibro" class="btn btn-danger">Eliminar</button>
                                                </form>
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