<?php
session_start();

require("../db_projetofinal.php");

?>

<?php

if(isset($_REQUEST['submitimg'])){

    if(!empty($_FILES['imagemperfil']['name'])) {

        $ficheiro = '../img/uploads/'.basename($_FILES['imagemperfil']['name']);

        if (move_uploaded_file($_FILES['imagemperfil']['tmp_name'], $ficheiro)) {
            echo "<div class='alert alert-success' role='alert'>Ficheiro copiado com sucesso!</div>\n";
        } else {
            /* retirado da documentação oficial do PHP em https://www.php.net/manual/pt_BR/features.file-upload.errors.php */
            switch ($_FILES['imagemperfil']['error']) {
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
    }


    $id = $_SESSION["id_utilizador"];
    
try{

    if(empty($_FILES['imagemperfil']['name'])) {

    $stmt = $db->prepare("UPDATE utilizador SET nome = :nome, biografia = :biografia, email = :email, id_genero = :genero, tipo_utilizador = :tipo_utilizador WHERE id_utilizador = $id");
    $stmt->execute(array(
        ':nome' => $_REQUEST["nome"],
        ':biografia' => $_REQUEST["biografia"],
        ':email' => $_REQUEST["email"],
        ':genero' => $_REQUEST["genero"],
        ':tipo_utilizador' => $_REQUEST["tipo_utilizador"],
      ));

    } else {


  $stmt = $db->prepare("UPDATE utilizador SET imagem = :imagemperfil, nome = :nome, biografia = :biografia, email = :email, id_genero = :genero, tipo_utilizador = :tipo_utilizador WHERE id_utilizador = $id");
    $stmt->execute(array(
        ':imagemperfil' => 'http://localhost/projetofinal/img/uploads/'.basename($_FILES['imagemperfil']['name']),
        ':nome' => $_REQUEST["nome"],
        ':biografia' => $_REQUEST["biografia"],
        ':email' => $_REQUEST["email"],
        ':genero' => $_REQUEST["genero"],
        ':tipo_utilizador' => $_REQUEST["tipo_utilizador"],
      ));



    }


      if ($stmt->rowCount() == 1) {
          
          echo "<script type= 'text/javascript'>alert('Informações de Perfil Atualizadas!');</script>";
          echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.1; URL=../index.php?op=usersettings">';
         
      } else {
          
          echo "<script type= 'text/javascript'>alert('Erro ao atualizar informações de perfil!');</script>";
          echo '<meta HTTP-EQUIV="Refresh" CONTENT="0.1; URL=../index.php?op=usersettings">';

      }
} catch(PDOException $e) {
      echo "<div class='alert alert-danger' role='alert'>$e->getMessage()</div>";
}

}

?>