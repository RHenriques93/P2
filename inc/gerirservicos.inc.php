<?php if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];
?>

<div class ="container">
<div class="row justify-content-center">
<div class="col-md-6">

          <div class="col-md-12 text-center p-2">
                <h3 class="">Atualizar ou Eliminar Serviço</h3>
          </div>

            


<?php
   
   $id_servico = $_REQUEST["idservico"];
  
  $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
  $dados = $db->query("SELECT subarea.nome, servico.descricao, servico.id_subarea AS 'servico associado', servico.id_servico FROM servico JOIN utilizador ON servico.id_utilizador = utilizador.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE utilizador.id_utilizador = $id AND servico.id_servico = $id_servico");
                         
  foreach($dados as $row) {

    $id_servico = $row["id_servico"] ;


    echo'
<form method="post" action="" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlSelect2">Sub Area</label>
    <select class="form-control" name="subareaupdate">

    <option class="bg-dark" value="'.$row['servico associado'].'"selected>'.$row['nome'].'</option>';

         $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
      $dados = $db->query("SELECT * FROM subarea");
                                                                
      foreach($dados as $linha) {
        echo'<option class="text-secondary" value="'.$linha['id_subarea'].'">'.$linha['nome'].'</option>';
      }
   

   echo '
   <li class="list-group-item text-dark">'.$row["nome"].'</li>
 
   </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descrição</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3">'.$row["descricao"].'</textarea>
  </div>

  <div class="form-actions">
     <button type="submit" name="submitservice" class="btn btn-primary ml-auto">Atualizar Serviço</button>
     <button type="submit" name="deleteservice" class="btn btn-danger ml-auto">Apagar Serviço</button>
   </div>
</form>';

    }

    ?>

</div>
</div>
</div>



<?php

if(isset($_POST["submitservice"])){



 try {
    $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");           
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   

    $sql = $db->prepare("UPDATE servico SET id_utilizador = $id, id_subarea = :id_subarea, descricao = :descricao WHERE servico.id_servico = $id_servico");

    $sql->execute(array(
      ':id_subarea' => $_REQUEST["subareaupdate"], 
      ':descricao' => $_REQUEST["descricao"], 
    ));


    if ($sql->rowCount() == 1) {
    echo "<script type= 'text/javascript'>alert('Serviço Atualizado com Sucesso');</script>";
   
    echo '<script type="text/javascript"> window.location="index.php?op=listarservicos";</script>';
    }
    else{
    echo "<script type= 'text/javascript'>alert('Serviço Não Atualizado.');</script>";
    }
    
    $dbh = null;
    }
    catch(PDOException $e)
    {
    echo $e->getMessage();
    }
} 

  
if(isset($_POST["deleteservice"])){



  try {
     $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");           
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
 
     $sql = "DELETE FROM servico WHERE servico.id_servico = $id_servico";
 
    
     if ($db->query($sql)) {
     echo "<script type= 'text/javascript'>alert('Serviço Eleminado com Sucesso');</script>";
     echo '<script type="text/javascript"> window.location="index.php?op=listarservicos";</script>';
     }
     else{
     echo "<script type= 'text/javascript'>alert('O seu serviço não foi eliminado.');</script>";
     }
     
     $dbh = null;
     }
     catch(PDOException $e)
     {
     echo $e->getMessage();
     }
 } 
 







}
?>





