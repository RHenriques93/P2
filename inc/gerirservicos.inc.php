<?php if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];



?>

<div class ="container">
<div class="row justify-content-center">
<div class="col-md-6">

<br>
<header class="col-md-12 mb-4">
          <h2 class="text-center text-dark">Atualizar ou Eliminar Serviço <br><span class="f-700 text-dark"></span></h2>
          <span class="underline-rosa mb-3"></span>
        </header>

            


<?php
   
   $id_servico = $_REQUEST["idservico"];
  
  $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
  $dados = $db->query("SELECT preco_servico.id_preco_servico, preco_servico.base, preco_servico.padrao, preco_servico.premium, subarea.nome, servico.descricao, servico.id_subarea AS 'servico associado', servico.id_servico FROM servico JOIN utilizador ON servico.id_utilizador = utilizador.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area JOIN preco_servico ON servico.id_servico = preco_servico.id_servico WHERE utilizador.id_utilizador = $id AND servico.id_servico = $id_servico");
                         
  foreach($dados as $row) {

    $id_servico = $row["id_servico"] ;


    echo'
<form method="post" action="" enctype="multipart/form-data">
  
  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlSelect2">Sub Area</label>
    <select class="form-control" name="subareaupdate">

    <option class="bg-dark text-dark" value="'.$row['servico associado'].'"selected>'.$row['nome'].'</option>';

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
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlTextarea1">Descrição</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3">'.$row["descricao"].'</textarea>
  </div>

  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlTextarea1">Preço Base</label><br>
    <input class="text-dark form-control" type="number" name="precobase" value="'.$row["base"].'"><br>
    <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlTextarea1">Preço Padrão</label><br>
    <input class="text-dark form-control"  type="number" name="precopadrao" value="'.$row["padrao"].'"><br>
    <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlTextarea1">Preço Premium</label><br>
    <input class="text-dark form-control"  type="number" name="precopremium" value="'.$row["premium"].'">
  </div>';

      $id_preco = $row["id_preco_servico"];

    
  echo '
  <hr>
        <div class="row justify-content-center">
          <div class="form-actions">
            <button type="submit" name="submitservice" class="btn btn-primary ml-auto">Atualizar Serviço</button>
            <button type="submit" name="deleteservice" class="btn btn-danger ml-auto">Apagar Serviço</button>
          </div>
        </div>
        
   </form>

   <hr>

   <div class="row justify-content-center">
  <div class="col-md-6">
    <button class="btn btn-grad grad col-12 mb-3"><h5><a class="text-light" href="index.php?op=listarimagens&id_service='.$row["id_servico"].'">Gerir Imagens do Serviço</a></h5></button>
  </div>
  </div>

';

    }

    ?>

</div>
</div>
</div>



<?php

if(isset($_REQUEST["submitservice"])) {

    
 try {
    $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");           
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   


    
      $sql = $db->prepare("UPDATE servico JOIN preco_servico ON servico.id_servico = preco_servico.id_servico SET servico.id_utilizador = $id, servico.id_subarea = :id_subarea, servico.descricao = :descricao, preco_servico.base = :base, preco_servico.padrao = :padrao, preco_servico.premium = :premium, preco_servico.id_servico = $id_servico WHERE servico.id_servico = $id_servico");

      $sql->execute(array(
        ':id_subarea' => $_REQUEST["subareaupdate"], 
        ':descricao' => $_REQUEST["descricao"],
        ':base' => $_REQUEST["precobase"],
        ':padrao' => $_REQUEST["precopadrao"],
        ':premium' => $_REQUEST["precopremium"],
              
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


// eliminar serviço

if(isset($_POST["deleteservice"])){



  try {
     $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");           
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
 
     $sql = "DELETE FROM servico WHERE id_servico = $id_servico";
    
    
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





