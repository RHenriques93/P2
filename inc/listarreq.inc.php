<?php
if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];
?>


                 <div class="col-12 text-center p-2">
                <h3 class="">Seus Pedidos</h3>
            </div>

<?php
   
  
  $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
  $dados = $db->query("SELECT subarea.nome, requisicao.descricao, requisicao.nome_projeto, requisicao.id_subarea AS 'requisicao associada', requisicao.id_requisicao FROM requisicao JOIN utilizador ON requisicao.id_utilizador = utilizador.id_utilizador JOIN subarea ON requisicao.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE utilizador.id_utilizador = $id");
     
  
  
  $dados->execute();
  if ($dados->rowCount() > 0)
  {
    foreach($dados as $row) {
    

      echo '<div class="row justify-content-center"><div class="col-md-5 text-center p-2"> 
   <ul class="list-group">
 
   <li class="list-group-item"><a href="index.php?op=gerirreq&idreq='.$row["id_requisicao"].'">'.$row["nome_projeto"].'</a></li>
  
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