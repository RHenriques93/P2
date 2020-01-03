<?php if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];

?>

<div class="container">
  <div class="container-fluid py-3">
    <div class="row justify-content-center">
      <header class="col-md-12 mb-4">
        <h2 class="text-center text-dark">Atualizar ou Eliminar Serviços</h2>
        <span class="underline mb-3"></span>
      </header>


<?php
   
   $id_req = $_REQUEST["idreq"];
  
  $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
  $dados = $db->query("SELECT subarea.nome, requisicao.descricao, requisicao.nome_projeto, requisicao.id_subarea AS 'requisicao associada', requisicao.id_requisicao, requisicao.preco, requisicao.img_req FROM requisicao JOIN utilizador ON requisicao.id_utilizador = utilizador.id_utilizador JOIN subarea ON requisicao.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE utilizador.id_utilizador = $id AND requisicao.id_requisicao = $id_req");
                         
  foreach($dados as $row) {

    $id_req = $row["id_requisicao"] ;


    echo'
<form method="post" class="col-md-9" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label class="grad-txt f-20 font-weight-bold" for="name">Nome do Projeto</label>
     <input type="text" class="form-control" id="name" name="nome_projeto" aria-describedby="nameHelp" value="'.$row['nome_projeto'].'">
  </div>
        
  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold"for="exampleFormControlSelect2">Sub Area</label>
    <select class="form-control" name="subareaupdate">

    <option class="bg-dark" value="'.$row['requisicao associada'].'"selected>'.$row['nome'].'</option>';

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
  <label class="grad-txt f-20 font-weight-bold" for="preco">Quantia que pretende gastar?</label>
  <input type="text" class="form-control" id="name" name="preco" aria-describedby="nameHelp" value="'.$row['preco'].'">
</div>';

  echo '<div class="row justify-content-center">
      <div class="col-md-12 text-center">
        <img src="'.$row["img_req"].'" class="rounded-circle" width="200px" height="200px";>
        <div class="form-actions">
                  <input type="file" name="imagemrequisicao" class="btn border-dark form-control-file my-3" accept="image/x-png,image/jpeg">
        </div>
      </div>
  </div>
  <hr>
  <div class="form-actions text-center my-2">
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

  
  $ficheiro = '../projetofinal/img/uploads/'.basename($_FILES['imagemrequisicao']['name']);
   
    if (move_uploaded_file($_FILES['imagemrequisicao']['tmp_name'], $ficheiro)) {
        echo "<div class='alert alert-success' role='alert'>Ficheiro copiado com sucesso!</div>\n";
    } else {
      /* retirado da documentação oficial do PHP em https://www.php.net/manual/pt_BR/features.file-upload.errors.php */
        switch ($_FILES['imagemrequisicao']['error']) {
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


    if(empty($_FILES['imagemrequisicao']['name'])) {
    
      $sql = $db->prepare("UPDATE requisicao SET id_utilizador = $id, id_subarea = :id_subarea, descricao = :descricao, preco = :preco, nome_projeto = :nome_projeto WHERE id_requisicao = $id_req");

      $sql->execute(array(
        ':id_subarea' => $_REQUEST["subareaupdate"], 
        ':descricao' => $_REQUEST["descricao"],
        ':preco' => $_REQUEST["preco"], 
        ':nome_projeto' => $_REQUEST["nome_projeto"],
        
              
        ));


      } else {

    $sql = $db->prepare("UPDATE requisicao SET id_utilizador = $id, id_subarea = :id_subarea, descricao = :descricao, preco = :preco, nome_projeto = :nome_projeto, img_req = :img_req WHERE id_requisicao = $id_req");

 
        $sql->execute(array(
          ':id_subarea' => $_REQUEST["subareaupdate"], 
          ':descricao' => $_REQUEST["descricao"],
          ':preco' => $_REQUEST["preco"], 
          ':nome_projeto' => $_REQUEST["nome_projeto"],
          ':img_req' => 'http://localhost/projetofinal/img/uploads/'.basename($_FILES['imagemrequisicao']['name']),  
        
          ));

        }     

         
    if ($sql->rowCount() == 1) {
    echo "<script type= 'text/javascript'>alert('Serviço Atualizado com Sucesso');</script>";
   
 
    echo '<script type="text/javascript"> window.location="index.php?op=listarreq";</script>';
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
 
     $sql = "DELETE FROM requisicao WHERE requisicao.id_requisicao = $id_req";
 
    
     if ($db->query($sql)) {
     echo "<script type= 'text/javascript'>alert('Pedido Eliminado com Sucesso');</script>";
     echo '<script type="text/javascript"> window.location="index.php?op=listarreq";</script>';
     }
     else{
     echo "<script type= 'text/javascript'>alert('O seu pedido não foi eliminado.');</script>";
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





