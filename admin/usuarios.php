<!DOCTYPE html>
<html lang="en">
<?php 
include('../db.php');
require('includes/head.php'); ?>
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
                                <a href="nuevoLibro.php" style="padding:10px; font-weight:100" class="btn btn-dark">
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
                                        <th>User</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Tipo</th>
                                        <th>Opciones</th>
                                          
                                    </thead>
                                    <tbody>
                                        <?php
                                $id="";
                                $query = "SELECT u.ID, u.User, u.Nombre, u.Apellido,u.Correo, c.tipo_usuarios FROM usuarios u , tusuarios c WHERE u.tipo=c.Id_tipo";
                                $result= mysqli_query($conn, $query); 
                                while($data = mysqli_fetch_assoc($result)) { ?>
                                          
                                            <tr>
                                            <th><?php echo $data["User"]; ?></th>
                                            <th><?php echo $data["Nombre"]; ?></th>
                                            <th><?php echo $data["Apellido"]; ?></th>
                                            <th><?php echo $data["Correo"]; ?></th>
                                            <th><?php echo $data["tipo_usuarios"]; ?></th>
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
            <?php require('includes/footer.php'); ?>
        </div>
    </div>
       
</body>
</html>