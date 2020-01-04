<?php if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];



?>

<div class ="container">
<br>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb grad">
        <li class="breadcrumb-item"><a class="text-white font-weight-bold" href="index.php?op=userpage">Perfil</a></li>
        <li class="breadcrumb-item"><a class="text-white font-weight-bold" href="index.php?op=listarservicos">Seus Serviços</a></li>
        <li class="breadcrumb-item active text-light" aria-current="page">Atualizar ou Eliminar Serviço</li>
  </ol>
</nav>

<div class="row justify-content-center">
<div class="col-md-6">



<br>
<header class="col-md-12 mb-4">
          <h2 class="text-center text-dark">Atualizar ou Eliminar Serviço <br><span class="f-700 text-dark"></span></h2>
          <span class="underline-rosa mb-3"></span>
        </header>

            


<?php
   
   $id_servico = $_REQUEST["idservico"];
  
  
  $dados = $db->query("SELECT preco_servico.id_preco_servico, preco_servico.base, preco_servico.padrao, preco_servico.premium, subarea.nome, servico.descricao, servico.id_subarea AS 'servico associado', servico.id_servico FROM servico JOIN utilizador ON servico.id_utilizador = utilizador.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area JOIN preco_servico ON servico.id_servico = preco_servico.id_servico WHERE utilizador.id_utilizador = $id AND servico.id_servico = $id_servico");
                         
  foreach($dados as $row) {

    $id_servico = $row["id_servico"] ;


    echo'
<form method="post" action="" enctype="multipart/form-data">
  
  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlSelect2">Tipo de Serviço</label>
    <select class="form-control" name="subareaupdate">

    <option class="bg-dark text-dark" value="'.$row['servico associado'].'"selected>'.$row['nome'].'</option>';

         
    $dados = $db->query("SELECT area.nome AS 'area nome', id_area FROM area");
                                                                
    foreach($dados as $linha1) {
    
      echo' <optgroup class="text-secondary" label ="'.$linha1["area nome"].'">';
      $id_area = $linha1["id_area"];

      $dados = $db->query("SELECT subarea.nome, subarea.id_subarea FROM subarea JOIN area ON subarea.id_area = area.id_area WHERE subarea.id_area = $id_area ");
    
      foreach($dados as $row1) {
             echo '<option class="text-secondary" value="'.$row1['id_subarea'].'">'.$row1['nome'].'</option>';
      }
      echo '</optgroup>' ;
          
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
    
 
             
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   


    try{ 
      
      $db->beginTransaction();

    $sql = $db->prepare("UPDATE servico SET servico.id_utilizador = $id, servico.id_subarea = :id_subarea, servico.descricao = :descricao WHERE servico.id_servico = $id_servico");

      $sql->execute(array(
        ':id_subarea' => $_REQUEST["subareaupdate"], 
        ':descricao' => $_REQUEST["descricao"],
                      
        ));

    $sql1 = $db->prepare("UPDATE preco_servico SET preco_servico.base = :base, preco_servico.padrao = :padrao, preco_servico.premium = :premium WHERE preco_servico.id_servico = $id_servico");

    $sql1->execute(array(
      ':base' => $_REQUEST["precobase"],
      ':padrao' => $_REQUEST["precopadrao"],
      ':premium' => $_REQUEST["precopremium"],
            
      ));

      $db->commit();


      } 
      
      catch(Exception $e) {

        echo $e->getMessage();
        $db->rollBack();
      

      }
      
    $check = $sql->rowCount() + $sql1->rowCount();
         
    if ($check > 0) {
    echo "<script type= 'text/javascript'>alert('Serviço Atualizado com Sucesso');</script>";
   
 
    echo '<script type="text/javascript"> window.location="index.php?op=listarservicos";</script>';
    }
    else{
    echo "<script type= 'text/javascript'>alert('Serviço Não Atualizado.');</script>";
    }
    
   
    
    

}  


// eliminar serviço

if(isset($_POST["deleteservice"])){



  try {
     $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");           
     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
 
     $sql = "DELETE FROM servico WHERE id_servico = $id_servico";
    
    
     if ($db->query($sql)) {
     echo "<script type= 'text/javascript'>alert('Serviço Eliminado com Sucesso');</script>";
     echo '<script type="text/javascript"> window.location="index.php?op=listarservicos";</script>';
     }
     else{
     echo "<script type= 'text/javascript'>alert('O seu serviço não foi eliminado.');</script>";
     }
     
     $db = null;
     }
     catch(PDOException $e)
     {
     echo $e->getMessage();
     }
 } 
 







}
?>





