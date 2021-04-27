<!DOCTYPE html>
<html lang="en">
<?php 
include('../db.php');
require('includes/head.php'); session_start(); ?>
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
                                    <th>Informacion</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                $id="";
                                $query = "SELECT u.ID, u.User, u.Nombre, p.Estado, p.CLibro FROM usuarios u , prestasmo p WHERE p.Estado='prestado' AND u.ID=p.IDU";
                                $result= mysqli_query($conn, $query); 

                                
                                while($data = mysqli_fetch_assoc($result)) { ?>
                                          
                                            <tr>
                                        <th><?php echo $data["ID"]; ?></th>
                                        <th><?php echo $data["User"]; ?></th>
                                        <th><?php echo $data["Nombre"]; ?></th>
                                        <th><?php echo $data["Estado"]; ?></th>
                                        <th><div onClick="loadDynamicContentModal('<?php echo $data["CLibro"]; ?>')"
                                            class="btn btn-warning">Ver Mas</div></th> 
                                        </tr>

                                        <?php } $conn -> close(); ?>

                                         </tbody>
                                </table>

                                <div class="modal fade" id="bootstrap-modal" role="dialog">
                                <div class="modal-dialog" role="document"> 
                                    <!-- Modal contenido-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title">Informacion del prestamo</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                        </div>
                                        <div class="modal-body">
                                        <div id="conte-modal"></div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                                <script>
                                    function loadDynamicContentModal(modal){
                                        var options = {
                                                modal: true,
                                                height:300,
                                                width:600
                                            };
                                        $('#conte-modal').load('ObtenerDatos.php?my_modal='+modal, function() {
                                            $('#bootstrap-modal').modal({show:true});
                                        });    
                                    }
                                    </script> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php require('includes/footer.php'); ?>
        </div>
    </div>
<script src="assets/jquery-1.12.4-jquery.min.js"></script> 
<script src="assets/jquery.validate.min.js"></script> 
<script src="assets/ValidarRegistro.js"></script> 
<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script> 
<script src="assets/js/vendor/popper.min.js"></script> 
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>