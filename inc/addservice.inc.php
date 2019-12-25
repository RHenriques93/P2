<?php
if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];
?>

<div class="container py-3">
    <section class="mb-4">
    <header class="col-md-12 mb-4">
      <h2 class="text-center text-dark">Associar Serviço</h2>
      <span class="underline-rosa mb-3"></span>    
    </header>
<div class="container">
<div class="col-md-6">
<ul class="nav navbar-nav list-group">



</ul>
</div>

<div class="row justify-content-center">
<div class="col-md-6">

<form method="post" action="" enctype="multipart/form-data">
  
  <div class="form-group">
    <label for="exampleFormControlSelect2">Sub Area</label>
    <select multiple class="form-control" name="subarea" id="exampleFormControlSelect1">

    <?php
      $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
      $dados = $db->query("SELECT * FROM subarea");
                                                                
      foreach($dados as $row) {
        echo'<option class="text-secondary" value="'.$row['id_subarea'].'">'.$row['nome'].'</option>';
      }
    ?>

        </select>
  
  
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Descrição</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3"></textarea>
  </div>

  <div class="form-actions">
     <button type="submit" name="submitservice" class="btn btn-primary ml-auto">Criar Serviço</button>
   </div>
</form>

</div>
</div>
</div>
</div>
<?php



if(isset($_POST["submitservice"])){
  try {
    $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");           
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

    $sql = "INSERT INTO servico (id_utilizador, id_subarea, descricao)
    VALUES ('".$id."','".$_POST["subarea"]."','".$_POST["descricao"]."')";
    if ($db->query($sql)) {
    echo "<script type= 'text/javascript'>alert('Serviço Associado com Sucesso');</script>";
    echo '<script type="text/javascript"> window.location="index.php?op=listarservicos";</script>';
    }
    else{
    echo "<script type= 'text/javascript'>alert('Inválido.');</script>";
    
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


