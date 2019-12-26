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
  $dados = $db->query("SELECT subarea.nome, servico.descricao, servico.id_subarea AS 'servico associado', servico.id_servico, servico.img_service FROM servico JOIN utilizador ON servico.id_utilizador = utilizador.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE utilizador.id_utilizador = $id AND servico.id_servico = $id_servico");
                         
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

  <div class="row justify-content-center">
      <img src="'.$row["img_service"].'" class="rounded-circle" width="200px" height="200px";>
      <input type="file" name="imagemservico" class="form-control-file my-3 text-dark" accept="image/x-png,image/jpeg"/>
  </div><br>

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

if(isset($_REQUEST["submitservice"])) {

  
  $ficheiro = '../projetofinal/img/uploads/'.basename($_FILES['imagemservico']['name']);
   
    if (move_uploaded_file($_FILES['imagemservico']['tmp_name'], $ficheiro)) {
        echo "<div class='alert alert-success' role='alert'>Ficheiro copiado com sucesso!</div>\n";
    } else {
      /* retirado da documentação oficial do PHP em https://www.php.net/manual/pt_BR/features.file-upload.errors.php */
        switch ($_FILES['imagemservico']['error']) {
              case UPLOAD_ERR_INI_SIZE:
                  $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                  break;
              case UPLOAD_ERR_FORM_SIZE:
                  $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                  break;
              case UPLOAD_ERR_PARTIAL:
                  $message = "The uploaded file was only partially uploaded";
                  break;
              case UPLOAD_ERR_NO_FILE:
                  $message = "No file was uploaded";
                  break;
              case UPLOAD_ERR_NO_TMP_DIR:
                  $message = "Missing a temporary folder";
                  break;
              case UPLOAD_ERR_CANT_WRITE:
                  $message = "Failed to write file to disk";
                  break;
              case UPLOAD_ERR_EXTENSION:
                  $message = "File upload stopped by extension";
                  break;
  
              default:
                  $message = "Unknown upload error";
                  break;
          }
          echo "<div class='alert alert-danger' role='alert'>$message</div>";
      }
  
      
 try {
    $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");           
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   


    if(empty($_FILES['imagemservico']['name'])) {
    
      $sql = $db->prepare("UPDATE servico SET id_utilizador = $id, id_subarea = :id_subarea, descricao = :descricao WHERE servico.id_servico = $id_servico");

      $sql->execute(array(
        ':id_subarea' => $_REQUEST["subareaupdate"], 
        ':descricao' => $_REQUEST["descricao"],
        
        ));


      } else {

    $sql = $db->prepare("UPDATE servico SET id_utilizador = $id, id_subarea = :id_subarea, descricao = :descricao, img_service = :img_service WHERE servico.id_servico = $id_servico");

 

        $sql->execute(array(
          ':id_subarea' => $_REQUEST["subareaupdate"], 
          ':descricao' => $_REQUEST["descricao"],
          ':img_service' => 'http://localhost/projetofinal/img/uploads/'.basename($_FILES['imagemservico']['name']),  
        
          ));

        }
   
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





