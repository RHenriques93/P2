<?php
session_start();
?>

<div class="container-fluid bg-dark">
        <header class="menu-font-20 ">
            <nav class="navbar navbar-expand-lg navbar-dark" id="navbar">
                <a href="index.php" class="navbar-brand">
                    <img src="img/hire-frame.png" height="70" class="d-inline-block align-top <?php if (isset($_GET["op"])) if ($_GET["op"] == 0) echo "active";?>">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" 
                aria-expanded="false" aria-label="Menu Colapso">
                    <span class="navbar-toggler-icon text-light"></span>
                </button>
                <div id="menu" class="collapse navbar-collapse">
                    <hr>
                    <ul class="navbar-nav mr-auto text-light">
                        <li class="nav-item text-light f-600">
                            <a href="index.php?op=sobre" class="nav-link <?php if (isset($_GET["op"])) if ($_GET["op"] == "sobre") echo "active";?>">Sobre</a>
                        </li>
                        <hr>
                        <li class="nav-item text-light f-600">
                            <a href="index.php?op=servicos" class="nav-link <?php if (isset($_GET["op"])) if ($_GET["op"] == "servicos") echo "active";?>">Serviços</a>
                        </li>
                        <hr>
                        <li class="nav-item text-light f-600">
                            <a href="index.php?op=contactos" class="nav-link <?php if (isset($_GET["op"])) if ($_GET["op"] == "contactos") echo "active";?>">Contactos</a>
                        </li>
                        <hr>

                        <?php
                        if(isset($_SESSION["username"]))
                        { ?>
                                    
                        <li class="nav-item text-light f-600">
                            <a href="index.php?op=pedidos" class="nav-link <?php if (isset($_GET["op"])) if ($_GET["op"] == "pedidos") echo "active"; ?>">Pedidos</a>
                        </li>
                        <?php
                        }
                        ?>
                         <hr>
                    </ul>


                    <form class="form-inline" method="post">
                    
                        <div class="input-group">
                    
                            <input class="form-control border border-warning" name="search" type="search" placeholder="Procura" aria-label="Search" required>
                            <span class="input-group-btn">
                                <button class="btn btn-warning" formaction="index.php?op=procura"><i class="fas fa-search"></i></button>
                            </span>
                          
                        </div>
                    </form>
                    <hr>

                

                    
                <?php 
               
//REVER ESTA PARTE - esta a funcionar mas retirei session do inicio dos outros inc´s


if(isset($_SESSION["username"]))
 {
    
    $username = $_SESSION["username"];
    require("db_projetofinal.php");


    $dados = $db->query("SELECT imagem FROM utilizador WHERE username = '$username'");
    foreach ($dados as $row) {

        $imagem = $row["imagem"];

    }

      echo '<a href="index.php?op=userpage" class="btn m-1 btn-default f-500 f-17">'.$_SESSION["username"].'<img src="'.$imagem.'" class="rounded-circle border border-grad ml-2" width="50px" height="50px"></a>
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

