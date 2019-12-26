<div class="container">
  <div class="container-fluid py-3 justify-content-center">
<?php
if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){
require("db_projetofinal.php");

$id = $_SESSION["id_utilizador"];
$username = $_SESSION["username"];
  $dados = $db->query("SELECT * FROM utilizador WHERE username = '$username'");



  foreach ($dados as $row){
    if($row['id_genero'] == 1) {
    echo '
    <header class="col-md-12 mb-4">
      <h2 class="text-center text-dark">Bem Vindo <br><span class="f-700 text-dark">'.$row['nome'].'</span></h2>
      <span class="underline-rosa mb-3"></span>
    </header>

     <div class="row justify-content-center">
    <img src="'.$row["imagem"].'" class="rounded-circle border-grad" width="200px">
     </div><br>

    <div class="row justify-content-center">
      <div class="col-md-4">
        <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
      </div>
      <div class="col-md-4">
        <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarservicos">Seus Serviços</a></h5></button>
      </div>
      <div class="col-md-12 text-center my-2 mt-4">
      <button class="btn btn-danger"><a class="text-white" href="index.php?op=logout"><h5>Logout</a></h5></button>
      </div>
    </div>
    ';}else{
      echo '
      <header class="col-md-12 mb-4">
        <h2 class="text-center text-dark">Bem Vinda <br><span class="f-700 text-dark">'.$row['nome'].'</span></h2>
        <span class="underline-rosa mb-3"></span>
      </header>

      <div class="row justify-content-center">
      <img src="'.$row["imagem"].'" class="rounded-circle border-border-dark" width="250px">class="rounded-circle border-grad" width="200px">

      <div class="row justify-content-center">
        <div class="col-md-4">
          <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
        </div>
        <div class="col-md-4">
          <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarservicos">Seus Serviços</a></h5></button>
        </div>
        <div class="col-md-12 text-center my-2 mt-4">
            <button class="btn btn-danger"><a class="text-white" href="index.php?op=logout"><h5>Logout</a></h5></button>
        </div>
      </div>
      ';
    }
  }

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










