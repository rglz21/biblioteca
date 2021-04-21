<!DOCTYPE html>
<html lang="en">
<?php 
include('../db.php');
require('includes/head.php');  session_start(); ?>


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
                        <a class="navbar-brand" href="javascript:;">Prestamos</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">

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
                            <h1>Prestamos de libros</h1>
                            <h3>Usuario y libro a prestar</h3>
                                <form action="taskEmpleado.php" method="post">



                                    <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                        name="usuarioi">

                                                                            <?php 
                                    $consulta="SELECT * FROM usuarios";
                                    $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))

                                                ?>


                                        <?php foreach ($ejecutar as $opciones): ?>
                                        <option value="<?php echo $opciones['ID']?>">
                                            <?php echo $opciones['User']?></option>

                                        <?php endforeach ?>
                                    </select>

                                    <select class="selectpicker" data-show-subtext="true" data-live-search="true"
                                        name="libroi">

                                                                            <?php 
                                    $consulta="SELECT * FROM bibliotecal";
                                    $ejecutar=mysqli_query($conn,$consulta) or die(mysql_error($conn))
                                                ?>


                                        <?php foreach ($ejecutar as $opciones): ?>
                                        <option value="<?php echo $opciones['IDLibro']?>">
                                            <?php echo $opciones['Nombre']?></option>

                                        <?php endforeach ?>

                                    </select>
                                    <br>
                                    <br>
                                    <?php 
                                    date_default_timezone_set('America/El_Salvador');
                                    $fecha_actual=date("Y-m-d");
                                    ?>

                                    <div class="row">
                                        <div class="col">
                                            <input type="datetime" class="form-control" aria-label="Fecha Inicial"
                                                value="<?= $fecha_actual?>" readonly name="fechai">
                                        </div>
                                        <div class="col">
                                            <input type="date" class="form-control" placeholder="YYYY/DD/MM"
                                                aria-label="Fecha Finals" name="fechaf">
                                        </div>
                                    </div>


                                    <input class="btn btn-secondary" type="submit" name="btnguardar" value="Prestar" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require('includes/footer.php'); ?>
        </div>
    </div>

</body>

</html>
</body>

</html>