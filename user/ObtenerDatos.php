<?php
session_start();
include('../db.php');

$query = "SELECT b.Nombre,b.IDLibro,b.imagen,b.isbn,p.FechaI,p.Fechaf,p.Mora,p.Renovacion,p.IDPrestamo,p.Estado FROM bibliotecal b, prestasmo p 
WHERE (b.IDLibro  = '" . $_GET["my_modal"] . "') 
 AND (p.CLibro = '" . $_GET["my_modal"] . "')
 AND (p.IDPrestamo = '" .$_GET["idP"]. "' )" ;
$result = mysqli_query($conn,$query) or die(mysql_error($conn));
if(!empty($result)) 
{
    foreach ($result as $row):
?>

<div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <img src=<?php echo $row['imagen']; ?>
                                                    width="400px" height="200px">
                                            </div>
                                        </div>
                                        <div class=" col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Titulo: <?php echo $row['Nombre']; ?></p>
                                                <p class="card-title" style="font-size: 0.7em;">Codigo: <?php echo $row['IDLibro']; ?><p>
                                                <p class="card-text" style="font-size: 0.7em;">ISBN: <?php echo $row['isbn']; ?><p>
                                                <p style="font-size: 0.7em;">Fecha Inicio: <?php echo $row['FechaI']; ?><p>
                                                <p style="font-size: 0.7em;" >Fecha Final: <?php echo $row['Fechaf']; ?><p>
                                                <p style="font-size: 0.7em;">Mora: <?php echo $row['Mora']; ?>$<p>
                                                <p style="font-size: 0.7em;">Renovaciones: <?php echo $row['Renovacion']; ?> Veces<p>
                                                <p style="font-size: 0.45em;color: red;">Solo se puede renovar 5 veces<p>
                                                </div>
                                        </div>

                                        <?php if (($row['Renovacion'] < 5)) {?>
                                  <?php if (($row['Estado'] == "Prestado")) {?>
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
                                <input type="hidden" name="libroi" value="<?php echo $_GET["my_modal"];?>">
                                <input type="hidden" name="prestamoi" value="<?php echo $_GET["idP"];?>">
                                <button type="summit" name="btnRenovar" class="btn btn-primary">Renovar</button>
                                </form>
                        </div>
                        <?php  }?>
                        <?php  }?>

                        
                                                

                                            </div>
                                        </div>
                                    </div>

<?php  endforeach;   }
?>