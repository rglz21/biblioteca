<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Inicio
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->  
</head>
<?php 
include('../db.php'); session_start(); ?>
<? if (!isset($_SESSION['auth_user'])) {
header('Location: ../index.html');
}?>
<script type="text/javascript">
    (function(document) {
      'use strict';

      var LightTableFilter = (function(Arr) {

        var _input;

        function _onInputEvent(e) {
          _input = e.target;
          var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
          Arr.forEach.call(tables, function(table) {
            Arr.forEach.call(table.tBodies, function(tbody) {
              Arr.forEach.call(tbody.rows, _filter);
            });
          });
        }

        function _filter(row) {
          var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
          row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('light-table-filter');
            Arr.forEach.call(inputs, function(input) {
              input.oninput = _onInputEvent;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          LightTableFilter.init();
        }
      });

    })(document);
    </script>

<body style="line-height:1;" class="">
    <div class="wrapper ">
        <?php require('includes/sidebar.php'); ?>
        <div class="main-panel">
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
                            <div class="card-body">
                                <a href="nuevoUsuario.php" style="padding:10px; font-weight:100" class="btn btn-dark">
                                    <p>Nuevo Usuario</p>
                                </a>
                                <a href="tusuario.php" style="padding:10px; font-weight:100" class="btn btn-dark">
                                    <p>Tipos de Usuarios</p>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <input class="form-control col-md-3 light-table-filter" data-table="order-table" type="text" placeholder="Search..">
                                <table class="table dataTables order-table">
                                      <thead>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Nombre</th>
                                    <th>Estado</th>
                                    <th>IDlibro</th>
                                    <th>Opciones</th>
                                          
                                    </thead>
                                    <tbody>
                                        <?php
                                $id="";
                                $query = "SELECT u.ID, u.User, u.Nombre, p.Estado, p.CLibro FROM usuarios u , Prestasmo p WHERE P.Estado='prestado' AND u.ID=p.IDU";
                                $result= mysqli_query($conn, $query); 
                                while($data = mysqli_fetch_assoc($result)) { ?>
                                          
                                            <tr>
                                        <th><?php echo $data["ID"]; ?></th>
                                        <th><?php echo $data["User"]; ?></th>
                                        <th><?php echo $data["Nombre"]; ?></th>
                                        <th><?php echo $data["Estado"]; ?></th>
                                        <th><?php echo $data["CLibro"]; ?></th>
                                            <td>
                                         <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                            <form action="editUsuario.php" method="post">
                                            <input type="hidden" name="idUser" value="<?php echo $data['ID']; ?>">
                                            <button type="summit" style="padding:5px; font-weight:100;text-transform: none;border-radius:66px;" class="btn btn-warning" href="#">Editar</button>
                                            </form>
                                           
                                            <button type="summit"  style="padding:5px; font-weight:100;text-transform: none; border-radius:66px;" 
                                            class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">Eliminar</button>
                                            
                                         </div>
                                            </td>
                                            
                                        </tr>
                                           

                                        <?php  $id = $data['ID']; } $conn -> close(); ?>

                                         </tbody>
                                </table>

                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                                >
                               
                                        <div class="modal-dialog modal-dialog-centered" role="document" >
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Seguro quiere eliminar este usuario?
                                                <form action="taksAdmin.php" method="post">
                                                <input type="hidden" name="idUser" value="<?php echo $id ?>">
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
            </div>
          
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <script src="./assets/js/core/popper.min.js"></script>
        <script src="./assets/js/core/bootstrap.min.js"></script>
        <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Chart JS -->
        <script src="./assets/js/plugins/chartjs.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="./assets/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="./assets/js/paper-dashboard.min.js?v=2.0.1" type="text/javascript"></script>
</body>
</html>