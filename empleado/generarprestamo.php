<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>

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
                        <a class="navbar-brand" href="javascript:;">Generar Prestamos</a>
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
                      
                        
                          
                            <div class="col-md-8">
                                
                                    <div class="row">
                                        <div class="col">
                                        <div class="container">
                                        <?php include "../db.php"; ?>
                                           <section id="container">

                                            <h1>Prestamos de libros</h1>
                                            <h3>Usuario y libro a prestar</h3>
                                             <section id="container">

                                          

                                             <form acction="fechasin.php" method="post">



                                                    <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="usuarioi">
                                                
                                                <?php 
                                                $consulta="SELECT * FROM usuarios";
                                                $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))
                             //      $query = mysqli_query ($conn, "SELECT * FROM usuarios"); 
                               //    $result = mysqli_num_rows($query);
                                                                ?>


                                    <?php foreach ($ejecutar as $opciones): ?> 
                                    <option value="<?php echo $opciones['ID']?>"><?php echo $opciones['User']?></option>

                                    <?php endforeach ?>
                                              </select>
                                              
                                                                <select class="selectpicker" data-show-subtext="true" data-live-search="true" name="libroi">
                                                
                                                <?php 
                                                $consulta="SELECT * FROM bibliotecal";
                                                $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))
                             //      $query = mysqli_query ($conn, "SELECT * FROM usuarios"); 
                               //    $result = mysqli_num_rows($query);
                                                                ?>
 

                                    <?php foreach ($ejecutar as $opciones): ?> 
                                    <option value="<?php echo $opciones['IDLibro']?>"><?php echo $opciones['Nombre']?></option>

                                    <?php endforeach ?>

                                              </select>
                                              <br>
                                              <br>
                                              <?php 
                                                date_default_timezone_set('America/El_Salvador');
                                                $fecha_actual=date("Y-m-d");
                                              ?>
                                            
                                              <div class="row" >
  <div class="col">
    <input type="datetime" class="form-control"  aria-label="Fecha Inicial"  value="<?= $fecha_actual?>" name="fechai">
  </div>
  <div class="col">
    <input type="date" class="form-control" placeholder="YYYY/DD/MM" aria-label="Fecha Finals" name="fechaf">
  </div>
</div>     


                                              <input class="btn btn-secondary" type="submit" name="btnguardar" value="Prestar" />
                                              </form>
                                        </div>
                                             
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php require('includes/sidebar.php'); ?>
    </div>
    
</body>

</html>