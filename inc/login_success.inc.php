<?php


if(isset($_SESSION['nome'])){

    echo '<div class="container">
    <div class="container-fluid py-3">
        <header class="col-md-12 mb-4">
                <h2 class="text-center text-dark">Bem Vindo(a) '.$_SESSION["nome"].'</h2>
                <span class="underline-rosa mb-3"></span>
                <a href="index.php?op=logout">Logout</a>
        </header>
    </div>
    </div>';
  
 } else {

    header("location:index.php?op=login");

}

?>