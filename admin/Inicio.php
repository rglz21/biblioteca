<!DOCTYPE html>
<html lang="en">
<?php require('includes/head.php'); ?>


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
                                    <div class="dropdown-menu dropdown-menu-right"
                                        aria-labelledby="navbarDropdownMenuLink">
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
                        <div class="col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <img src="https://images-na.ssl-images-amazon.com/images/I/51gA07XaQGL.jpg"
                                                    width="300px" height="150px">
                                            </div>
                                        </div>
                                        <div class=" col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Ciencias Basicas</p>
                                                <p class="card-title">Libro de Fisica
                                                <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                </div>
                            </div>
                        </div>
                        <!-- Tercera carta -->
                        <div class="col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <img src="https://image.slidesharecdn.com/librodeorodematemticas-130121235117-phpapp01/95/libro-de-oro-de-matemticas-1-638.jpg?cb=1440821585"
                                                    width="300px" height="150px">
                                            </div>
                                        </div>
                                        <div class=" col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Ciencias Basicas</p>
                                                <p class="card-title">Matematica 1
                                                <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                </div>
                            </div>
                        </div>
                        <!-- Cuarta carta -->
                        <div class="col-sm-6">
                            <div class="card card-stats">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5 col-md-4">
                                            <div class="icon-big text-center icon-warning">
                                                <img src="https://www.libreriacanaima.com/imagenes/9788441/978844153937.JPG"
                                                    width="300px" height="150px">
                                            </div>
                                        </div>
                                        <div class=" col-md-8">
                                            <div class="numbers">
                                                <p class="card-category">Programacion</p>
                                                <p class="card-title">C/C++
                                                <p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ">
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