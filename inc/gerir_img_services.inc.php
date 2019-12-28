<?php if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];



?>

<div class ="container">
<div class="row justify-content-center">
<div class="col-md-6">

<br>
<header class="col-md-12 mb-4">
          <h2 class="text-center text-dark">Atualizar ou Eliminar Imagem do Serviço<br><span class="f-700 text-dark"></span></h2>
          <span class="underline-rosa mb-3"></span>
</header>

            


<?php
   
   $id_servico = $_REQUEST["id_service"];
   $id_img_serv = $_REQUEST["id_img_service"];
  
  $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
  $dados = $db->query("SELECT img_service.img_serv, img_service.id_img_serv, subarea.nome, servico.descricao, servico.id_subarea AS 'servico associado', servico.id_servico FROM servico JOIN utilizador ON servico.id_utilizador = utilizador.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area JOIN img_service ON servico.id_servico = img_service.id_servico WHERE utilizador.id_utilizador = $id AND servico.id_servico = $id_servico AND img_service.id_img_serv = $id_img_serv");
                         
  foreach($dados as $row) {

    $id_serv = $row["id_servico"];
  
    

    echo'
<form name="'.$row["id_img_serv"].'" method="post" action="" enctype="multipart/form-data">';


echo '<div class="row justify-content-center">
      <img src="'.$row["img_serv"].'" class="rounded-circle" width="200px" height="200px";>
      </div>
  <br> ';
    }

    ?>
 <hr>
<div class="form-actions">
    <div class="row justify-content-center">  

        <input type="file" name="imagemservico" class="form-control-file my-3 btn btn-primary form-control-file my-3"" accept="image/x-png,image/jpeg" required/>
    </div>
    <div class="row justify-content-center">    
        <button type="submit" name="submitservice" class="btn btn-primary mr-2">Atualizar Imagem</button>
        <button type="submit" formnovalidate name="deleteservice" class="btn btn-danger">Apagar Imagem</button>
    </div>
</div>

</form>



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

    
            $sql = $db->prepare("UPDATE img_service SET img_serv = :img_serv 
            WHERE id_servico = $id_serv AND id_img_serv = $id_img_serv");

        $sql->execute(array(
          
          ':img_serv' => 'http://localhost/projetofinal/img/uploads/'.basename($_FILES['imagemservico']['name']),  
        
          
          ));

               
    if ($sql->rowCount() == 1) {
    echo "<script type= 'text/javascript'>alert('Imagem Atualizada com Sucesso');</script>";
   
 
    echo '<script type="text/javascript"> window.location="index.php?op=listarimagens&id_service='.$id_serv.'";</script>';
    }
    else{
    echo "<script type= 'text/javascript'>alert('A Imagem Não Foi Atualizada.');</script>";
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
 
     $sql = "DELETE FROM img_service WHERE id_img_serv = $id_img_serv";
    
    
     if ($db->query($sql)) {
     echo "<script type= 'text/javascript'>alert('Imagem foi Eliminada Com Sucesso');</script>";
     echo '<script type="text/javascript"> window.location="index.php?op=listarimagens&id_service='.$id_serv.'";</script>';
     }
     else{
     echo "<script type= 'text/javascript'>alert('A imagem não foi eliminada.');</script>";
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

