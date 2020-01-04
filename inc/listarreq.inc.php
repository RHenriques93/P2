<?php
if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];
?>

<div class="container py-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb grad">
        <li class="breadcrumb-item"><a class="text-white font-weight-bold" href="index.php?op=userpage">Perfil</a></li>
        <li class="breadcrumb-item active text-light" aria-current="page">Seus Pedidos</li>
  </ol>
</nav>

      <header class="col-md-12 mb-4">
        <h2 class="text-center text-dark">Seus Pedidos</h2>
        <span class="underline-rosa mb-3"></span>    
      </header>

<?php
   
  

  $dados = $db->query("SELECT subarea.nome, requisicao.descricao, requisicao.nome_projeto, requisicao.id_subarea AS 'requisicao associada', requisicao.id_requisicao FROM requisicao JOIN utilizador ON requisicao.id_utilizador = utilizador.id_utilizador JOIN subarea ON requisicao.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE utilizador.id_utilizador = $id");
     
  
  
  $dados->execute();
  if ($dados->rowCount() > 0)
  {
    foreach($dados as $row) {
    

      echo '<div class="row justify-content-center">
      <div class="col-md-5 text-center p-2"> 
   <ul class="list-group bg-white rounded">
 
   <li class="list-group-item grad-txt f-12 font-weight-bold"><a href="index.php?op=gerirreq&idreq='.$row["id_requisicao"].'">'.$row["nome_projeto"].'</a></li>
  
   </ul>


   </div>
  
</div>';
    
    }
   
  
} else {

echo '<div class="row justify-content-center"><div class="col-md-5 text-center p-2"> <h1>Ainda não tem pedidos efetuados. Efetue um pedido.</h1></div></div>';

}
  


  
}

  ?>


<br>
<div class="row justify-content-center">
      <div class="col-md-4">
        <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=addreq">Efetuar Pedido</a></h5></button>
      </div>
</div>
</div>
