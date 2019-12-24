<?php


if(isset($_SESSION['nome'],$_SESSION['id_utilizador'])){

  

   

require("db_projetofinal.php");


$id = $_SESSION["id_utilizador"];




echo '


<div class="container">

<div class="row">
    <div class="col-md-12 mb-4">
            <br>
            <h2 class="text-center text-dark">Bem Vindo(a) '.$_SESSION["nome"].'</h2>
            <span class="underline-rosa mb-3"></span>
                                  
    </div>

   
      <ul class="nav navbar-nav list-group">
        <li class="list-group-item"><a href ="index.php?op=usersettings">Informações de Perfil</a></li>
        <li class="list-group-item"><a href ="index.php?op=gerirservicos">Gerir Serviços</a></li>
        <li class="list-group-item"><a href="index.php?op=logout">Logout</a></li>
       </ul>
               
               
    
    </div>
    </div>

';




$dados = $db->query("SELECT * FROM utilizador WHERE utilizador.id_utilizador = '$id'");


foreach ($dados as $linha) {

 echo   '

    <div class="container">
    
   
</div>'; 

}




            ?>         
            </div>
        </div>
    </div>


  <?php
 } else {

    header("location:index.php?op=login");

}

?>










