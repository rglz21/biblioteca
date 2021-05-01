<div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          <div class="logo-image-big">
            <img src="../assets/img/Pincelada Rosada Fotografía Logo.png" width="125px">
          </div>
          <?php
          echo "Activo: " . $_SESSION['auth_user']?> 
        </a>
        
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="inicio.php">
              <i class="nc-icon nc-bank"></i>
              <p>Libros</p>
            </a>
          </li>
          <li>
            <a href="edituser.php">
              <i class="nc-icon nc-diamond"></i>
              <p>Mi perfil</p>
            </a>
          </li>
          <li>
            <a href="misPrestamos.php">
              <i class="nc-icon nc-bookmark-2"></i>
              <p>Mis Prestamos</p>
            </a>
          </li>
        </ul>
      </div>
</div>