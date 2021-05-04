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
        <div class="card">
                <div class="card-body">
                <h5 class="card-title" style="text-align:center;"> Escoga la fecha para realizar el prestamo</h5>
                    <div class="row">
                        <div class="col-sm">
                        <form action="taksUser.php" method="post">
                        <?php 
                                date_default_timezone_set('America/El_Salvador');
                                 $fecha_actual=date("Y-m-d");
                                 $fechaL = "";
                                 if ($_SESSION['auth_tipo'] == 1) {
                                 $fechaL = date("Y-m-d",strtotime($fecha_actual."+ 1 month")); 
                                 } else if ($_SESSION['auth_tipo'] == 4) {
                                 $fechaL = date("Y-m-d",strtotime($fecha_actual."+ 2 month")); 
                                 }
                        ?>
                                            <br>
                                <div class="row" >
                                <div class="col">
                                    <input type="datetime" class="form-control"  aria-label="Fecha Inicial"  value="<?= $fecha_actual?>" name="fechai">
                                </div>
                                <div class="col">
                               
                                    <input type="date" class="form-control" min="<?php echo $fecha_actual ?>" max="<?php echo $fechaL ?>" placeholder="YYYY/DD/MM" aria-label="Fecha Finals" name="fechaf">

                                </div>      
                                </div>
                                <input type="hidden" name="libroi" value="<?php echo $_POST['cod'];?>">
                                <button type="summit" name="btnPrestamo" class="btn btn-primary">Prestar</button>
                                </form>
                        </div>
                    </div>
                </div>
        </div>

                <div class="card" id="esfera">
                    <div class="card-body">
                        <h2 class="card-title">Informacion del libro</h2>
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
                                          
                                   
                                </div>
                            </div>
                            <div class="col-md-8">
                                
                                    <div class="row">
                                        <div class="col">
                                        
                                        <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Nombre del
                                                    libro</label>
                                                <input type="text" class="form-control" placeholder="Nombre"
                                                    name="nombre" readonly  value="<?php echo $_POST['Nombre'];?>" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">ISBN</label>
                                                <input type="text" class="form-control"
                                                    placeholder="ISBN" readonly name="isbn" value="<?php echo $_POST['isbn'];?>"   
                                                  />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Autor</label>
                                                <input type="text" class="form-control" placeholder="Autor"
                                                    name="autor" readonly value="<?php echo $_POST['Autor'];?>" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Año</label>
                                                <input type="text" class="form-control" readonly placeholder="Año" name="anio" 
                                                value="<?php echo $_POST['Anio'];?>"/>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Editorial</label>
                                                <input type="text" class="form-control" placeholder="Editorial"
                                                    name="editorial" readonly value="<?php echo $_POST['Editorial'];?>" />
                                            </div>
                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1"
                                                    class="floatingInput">Ediciones</label>
                                                <input type="text" class="form-control" placeholder="Ediciones"
                                                    name="edicion" readonly value="<?php echo $_POST['edicion'];?>" />
                                            </div>

                                            <div class="form-floating mb-3">
                                                <label for="exampleFormControlInput1" class="floatingInput">Nº
                                                    Disponible</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Cantidad Disponible" readonly name="cantidad" value="<?php echo $_POST['disponible'];?>" />
                                            </div>
                                           
                                       
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
