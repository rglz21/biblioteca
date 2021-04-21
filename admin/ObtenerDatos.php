<?php
include('../db.php');

$query = "SELECT b.Nombre,b.IDLibro,b.imagen,b.isbn,p.FechaI,p.Fechaf,p.Mora,p.Renovacion FROM bibliotecal b, Prestasmo p 
WHERE b.IDLibro  = '" . $_GET["my_modal"] . "' AND p.CLibro = '" . $_GET["my_modal"] . "' " ;
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
                                                <p style="font-size: 0.7em;" >Fecha Inicio: <?php echo $row['Fechaf']; ?><p>
                                                <p style="font-size: 0.7em;">Mora: <?php echo $row['Mora']; ?>$<p>
                                                <p style="font-size: 0.7em;">Renovaciones: <?php echo $row['Renovacion']; ?> Veces<p>
                                                </div>
                                        </div>



                                            </div>
                                        </div>
                                    </div>

<?php  endforeach;   }
?>