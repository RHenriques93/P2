<div class="container">
  <div class="container-fluid py-3 justify-content-center">
<?php
if(isset($_SESSION['nome'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");

$id = $_SESSION["id_utilizador"];
$dados = $db->query("SELECT * FROM utilizador WHERE utilizador.id_utilizador = '$id'");

echo '<header class="col-md-12 mb-4">
<h2 class="text-center text-dark">Informações de Perfil</h2>
<span class="underline mb-3"></span>
</header>';

foreach ($dados as $linha) {

 echo   '
    <div class="container">
      <form method="post" action="inc/upload.inc.php" enctype="multipart/form-data">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="col-md-12 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="name">Nome</label>
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" value="'.$linha["nome"].'">
          </div>
          <div class="col-md-12 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="user">Username</label>
            <input type="text" class="form-control" id="user" aria-describedby="userHelp" value="Username" disabled>
          </div>
          <div class="col-md-12 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="biografia">Biografia</label>
            <textarea type="text" class="form-control" id="biografia" aria-describedby="biografiaHelp">'.$linha["biografia"].'</textarea>
          </div>
          <div class="col-md-12 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="email">Email</label>
            <input type="text" class="form-control" id="email" aria-describedby="emailHelp" value="'.$linha["email"].'">
          </div>
          <div class="col-md-12">
            <button type="submit" name="submitimg" class="btn btn-primary ml-auto">Atualizar Perfil</button>
          </div>
        </div>
        <div class="col-md-4 text-center bg-light rounded p-3 border border-secondary">
            <img src="'.$linha["imagem"].'" class="rounded-circle" width="250px" height="250px">
            <input type="file" name="imagemperfil" class="form-control-file my-3 text-dark" accept="image/x-png,image/jpeg"/>
            <div class="col-md-12">
              <button type="submit" name="submitimg" class="btn btn-grad grad ml-auto">Alterar Foto de Perfil</button>
            </div>
        </div>
        <hr>
        </form>
      </div>
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










