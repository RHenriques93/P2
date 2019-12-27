<?php
if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];
?>


<br>
<header class="col-md-12 mb-4">
          <h2 class="text-center text-dark">Seus Serviços<br><span class="f-700 text-dark"></span></h2>
          <span class="underline-rosa mb-3"></span>
        </header>

<?php
   
  
  $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
  $dados = $db->query("SELECT subarea.nome, servico.descricao, servico.id_subarea AS 'servico associado', servico.id_servico FROM servico JOIN utilizador ON servico.id_utilizador = utilizador.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE utilizador.id_utilizador = $id");
     
  
  
  $dados->execute();
  if ($dados->rowCount() > 0)
  {
    foreach($dados as $row) {
    

      echo '<div class="row justify-content-center">
                <div class="col-md-5 text-center p-2"> 

                    <ul class="list-group bg-white rounded">
                         <li class="list-group-item grad-txt f-12 font-weight-bold"><a href="index.php?op=gerirservicos&idservico='.$row["id_servico"].'">'.$row["nome"].'</a></li>
                   </ul>

               </div>
            </div>';
    
    }
   
  
} else {

echo '<div class="row justify-content-center"><div class="col-md-5 text-center p-2"> <h1>Ainda não tem serviços associados à sua conta. Associe um serviço.</h1></div></div>';

}
  


  
}

  ?>


<br>
<div class="row justify-content-center">
      <div class="col-md-4">
        <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=addservice">Associar Serviço</a></h5></button>
      </div>