<div class="container">
  <div class="container-fluid py-3 justify-content-center">
<?php
if(isset($_SESSION['nome'],$_SESSION['id_utilizador'])){
require("db_projetofinal.php");

$id = $_SESSION["id_utilizador"];

echo '
<header class="col-md-12 mb-4">
  <h2 class="text-center text-dark">Bem Vindo(a) '.$_SESSION["nome"].'</h2>
  <span class="underline-rosa mb-3"></span>
</header>
<div class="row justify-content-center">
  <div class="col-md-4">
    <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
  </div>
  <div class="col-md-4">
    <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=gerirservicos">Gerir Serviços</a></h5></button>
  </div>
  <div class="col-md-12 text-center my-2 mt-4">
    <a class="grad-txt" href="index.php?op=logout"><h5>Logout</a></h5></button>
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


<?php
  } else {
    header("location:index.php?op=login");
  }
?>









