<?php
session_start();
?>

<div class="container-fluid bg-dark">
        <header class="menu-font-20">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a href="index.php" class="navbar-brand">
                    <img src="img/logo.png" height="70" class="d-inline-block align-top <?php if (isset($_GET["op"])) if ($_GET["op"] == 0) echo "active";?>">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" 
                aria-expanded="false" aria-label="Menu Colapso">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div id="menu" class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto text-light">
                        <li class="nav-item">
                            <a href="index.php?op=sobre" class="nav-link <?php if (isset($_GET["op"])) if ($_GET["op"] == 1) echo "active";?> text-light f-600">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?op=servicos" class="nav-link <?php if (isset($_GET["op"])) if ($_GET["op"] == 2) echo "active";?> text-light f-600">Serviços</a>
                        </li>
                        <li class="nav-item">
                            <a href="index.php?op=contactos" class="nav-link <?php if (isset($_GET["op"])) if ($_GET["op"] == 3) echo "active";?> text-light f-600">Contactos</a>
                        </li>

                        <?php
                        if(isset($_SESSION["username"]))
                        { ?>                        
                        <li class="nav-item">
                            <a href="index.php?op=pedidos" class="nav-link <?php if (isset($_GET["op"])) if ($_GET["op"] == 4) echo "active"; ?> text-light f-600">Pedidos</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>


                    <form class="form-inline" method="post">
                    
                        <div class="input-group">
                    
                            <input class="form-control border border-warning" name="search" type="search" placeholder="Procura" aria-label="Search" required>
                            <span class="input-group-btn">
                                <button class="btn btn-warning" formaction="index.php?op=procura"><i class="fas fa-search"></i></button>
                            </span>
                          
                        </div>
                    </form>

                

                    
                <?php 
               
//REVER ESTA PARTE - esta a funcionar mas retirei session do inicio dos outros inc´s


if(isset($_SESSION["username"]))
 {
      echo '<a href="index.php?op=userpage" class="btn m-1 btn-default f-500 f-17">'.$_SESSION["username"].'</a>
      <a href="index.php?op=logout" class="btn btn-login">Logout</a>';
 } else {

    echo '<a href="index.php?op=login" class="btn m-1 btn-default f-500 f-17">Login</a>
    <a href="index.php?op=registar" class="btn btn-login">Registar</a>'; 
   
 }
 
            ?>

                    
                </div>
            </nav>
        </header>
    </div>