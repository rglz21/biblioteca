<!DOCTYPE html>
<html lang="en">
<?php 
include('../db.php');
require('includes/head.php'); session_start(); ?>


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
                                                <form action="editLibro.php" method="post">
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
                                                
                                                <button type="summit" name="editar" style="padding:5px; font-weight:100;text-transform: none;border-radius:66px;" class="btn btn-warning">Editar</button>
                                                </form>
                                               
                                                
                                                <button type="summit" name="DLibro"  style="padding:5px; font-weight:100;text-transform: none; border-radius:66px;"
                                                data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger">Eliminar</button>
                                             
                                                </div>

                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                               
                                        <div class="modal-dialog modal-dialog-centered" role="document" >
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Seguro quiere eliminar este Libro?
                                                <form action="taksAdmin.php" method="post">
                                                <input type="hidden" name="cod" value="<?php echo $row['IDLibro']; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="summit" name="dUsuario" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
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