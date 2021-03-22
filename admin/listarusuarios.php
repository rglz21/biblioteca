<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>

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
                        <a class="navbar-brand" href="javascript:;">Nuevo Libro</a>
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

                                            <h1>Lista de usuarios</h1>
                                            <table>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>User</th>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Correo</th>
                                                </tr>
                                                <?php 
                                   $query = mysqli_query ($conn, "SELECT * FROM usuarios"); 
                                   $result = mysqli_num_rows($query);
                                   if($result > 0){
                                    while ($data = mysqli_fetch_array($query)) {
?>
                                    <tr>
                                        <th><?php echo $data["ID"]; ?></th>
                                        <th><?php echo $data["User"]; ?></th>
                                        <th><?php echo $data["Nombre"]; ?></th>
                                        <th><?php echo $data["Apellido"]; ?></th>
                                        <th><?php echo $data["Correo"]; ?></th>

                                        <td>
                                    <a class="link_edit" href="#">Editar</a>
                                    </td>
                                    <td>
                                    <a class="link_edit" href="#">Eliminar</a>
                                    </td>
                                    </tr>
<?php
                                    }

                                   }          
                                                ?>
                                              
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