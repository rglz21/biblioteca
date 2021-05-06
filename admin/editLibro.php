<? if (!isset($_POST['Nombre'])) {
header('Location: inicio.php');
}?>
<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); session_start();?>
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
                        <a class="navbar-brand" href="javascript:;">Libro</a>
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
                        <h2 class="card-title">Edite la informacion del libro</h2>
                        <div class="row g-0">
                            <div class="col-md-4">
                                <div class="mb-3">
                                <form enctype="multipart/form-data" action="taksAdmin.php"  method="post">
                                    <img src="<?php echo $_POST['ImagenEx']; ?>"
                                        class="img-thumbnail" alt="...">
                                        <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Cod
                                                    Libro</label>
                                                <input type="text" class="form-control" placeholder="Codigo"
                                                    name="cod" readonly value="<?php echo $_POST['cod'];?>" />
                                            </div>
                                          
                                    <br>
                                    <label for="formFile" class="form-label">ingrese foto del libro</label>
                                    <input class="form-control" type="file" name="imagen" />
                                   
                                </div>
                            </div>
                            <div class="col-md-8">
                                
                                    <div class="row">
                                        <div class="col">
                                        
                                        <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Nombre del
                                                    libro</label>
                                                <input type="text" class="form-control" placeholder="Nombre"
                                                    name="nombre" required value="<?php echo $_POST['Nombre'];?>" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">ISBN</label>
                                                <input type="text" class="form-control"
                                                    placeholder="ISBN"  name="isbn" value="<?php echo $_POST['isbn'];?>"   
                                                    pattern="^(?:ISBN(?:-1[03])?:? )?(?=[0-9X]{10}$|(?=(?:[0-9]+[- ]){3})[- 0-9X]{13}$|97[89][0-9]{10}$|(?=(?:[0-9]+[- ]){4})[- 0-9]{17}$)(?:97[89][- ]?)?[0-9]{1,5}[- ]?[0-9]+[- ]?[0-9]+[- ]?[0-9X]$"
                                                     title="El ISBN debe tener este formato: ISBN xxx-xx-xxxx-x" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Autor</label>
                                                <input type="text" class="form-control" placeholder="Autor"
                                                    name="autor" required value="<?php echo $_POST['Autor'];?>" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Año</label>
                                                <input type="text" class="form-control" placeholder="Año" name="anio" 
                                                value="<?php echo $_POST['Anio'];?>" required/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Editorial</label>
                                                <input type="text" class="form-control" placeholder="Editorial"
                                                    name="editorial" value="<?php echo $_POST['Editorial'];?>" required/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Ediciones</label>
                                                <input type="text" class="form-control" placeholder="Ediciones"
                                                    name="edicion" value="<?php echo $_POST['edicion'];?>" required />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Categoria</label>
                                                <select class="form-control" data-show-subtext="true" data-live-search="true"
                                                    name="cate">

                                    <?php 
                                    include('../db.php');
                                    $categori = $_POST['cate'];
                                    $consulta="SELECT * FROM categoria where IDcategoria = $categori 
                                    union all SELECT * FROM categoria where IDcategoria != $categori ";
                                    $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))?>

                                        <?php foreach ($ejecutar as $opciones): ?>
                                        <option value="<?php echo $opciones['IDcategoria']?>">
                                            <?php echo $opciones['Categoria']?></option>

                                        <?php endforeach ?>
                                    </select>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Nº
                                                    Disponible</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Cantidad Disponible" name="cantidad" required value="<?php echo $_POST['disponible'];?>" />
                                            </div>
                                            <input type="hidden" name="ImagenE" value="<?php echo $_POST['ImagenEx']; ?>"/>
                                            <input type="submit" name="ELibro" class="btn btn-success btn-block"
                                                value="Editar Libro">
                                       
                                        </div>
                                    </div>
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
<?php  ?>