<div class="container">
  <div class="container-fluid py-3 justify-content-center">
<?php
if(isset($_SESSION['nome'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");

$id = $_SESSION["id_utilizador"];
$dados = $db->query("SELECT utilizador.nome, utilizador.email, utilizador.data_nascimento, utilizador.biografia, utilizador.imagem, 
genero_utilizador.genero, genero_utilizador.id_genero, tipo_utilizador.id_tipo, tipo_utilizador.nome_tipo FROM utilizador 
JOIN genero_utilizador ON utilizador.id_genero = genero_utilizador.id_genero
JOIN tipo_utilizador ON utilizador.tipo_utilizador = tipo_utilizador.id_tipo
WHERE utilizador.id_utilizador = '$id'");

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
          <div class="row">
          <div class="col-md-12 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="name">Nome</label>
            <input type="text" class="form-control" id="name" name="nome" aria-describedby="nameHelp" value="'.$linha["nome"].'">
          </div>
          <div class="col-md-4 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="nascimento">Data de Nascimento</label>
            <input type="date" class="form-control" id="nascimento" name="nascimento" aria-describedby="nascimentoHelp" value="'.$linha["data_nascimento"].'">
          </div>
          <div class="col-md-4 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="tipo_utilizador">Tipo de Utilizador</label>
            <select class="custom-select mt-2 text-secondary w-100 align-content-left" id="inputGroupSelect01" name="tipo_utilizador" required>
              <option class="text-secondary" value="'.$linha['id_tipo'].'">'.$linha['nome_tipo'].'</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="genero">Genero</label>
            <select class="custom-select mt-2 text-secondary w-100 align-content-left" id="inputGroupSelect02" name="genero" required>
              <option class="text-secondary" value="'.$linha['id_genero'].'">'.$linha['genero'].'</option>
            </select>
          </div>
          <div class="col-md-12 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="user">Username</label>
            <input type="text" class="form-control" id="user" aria-describedby="userHelp" value="Username" disabled>
          </div>
          <div class="col-md-12 mb-1">
            <label class="grad-txt f-20 font-weight-bold" for="biografia">Biografia</label>
            <textarea type="text" class="form-control" id="biografia" maxlength="255" name="biografia" aria-describedby="biografiaHelp">'.$linha["biografia"].'</textarea>
            <p class="figure-caption">Máx. 255 caracteres</p>
          </div>
          <div class="col-md-12 mb-3">
            <label class="grad-txt f-20 font-weight-bold" for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="'.$linha["email"].'">
          </div>
          <div class="col-md-12">
            <button type="submit" name="submitimg" class="btn btn-primary ml-auto">Atualizar Perfil</button>
          </div>
          </div>
        </div>
        <div class="col-md-4 text-center bg-light rounded p-3 border border-secondary">
            <img src="'.$linha["imagem"].'" class="rounded-circle" width="250px" height="250px">
            <input type="file" name="imagemperfil" class="form-control-file my-3 text-dark" accept="image/x-png,image/jpeg"/>
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










