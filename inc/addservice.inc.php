<?php
if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];
?>

<div class="container py-3">
      <header class="col-md-12 mb-4">
        <h2 class="text-center text-dark">Associar Serviço<br><span class="f-700 text-dark"></span></h2>
        <span class="underline-rosa mb-3"></span>
      </header>


<div class="container">
<div class="row justify-content-center">
<div class="col-md-6">

<form method="post" action="" enctype="multipart/form-data">
  
  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlSelect2">Tipo de Serviço</label>
    <select class="form-control" name="subarea" id="exampleFormControlSelect1" class="grad-txt">

    <?php
    
      $dados = $db->query("SELECT area.nome AS 'area nome', id_area FROM area");
                                                                
      foreach($dados as $linha) {
      
        echo' <optgroup class="text-secondary" label ="'.$linha["area nome"].'">';
        $id_area = $linha["id_area"];

        $dados = $db->query("SELECT subarea.nome, subarea.id_subarea FROM subarea JOIN area ON subarea.id_area = area.id_area WHERE subarea.id_area = $id_area ");
      
        foreach($dados as $row) {
               echo '<option class="text-secondary" value="'.$row['id_subarea'].'">'.$row['nome'].'</option>';
        }
        echo '</optgroup>' ;
            
      }
    ?>

        </select>
  
  
  </div>
  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlTextarea1">Descrição</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3"></textarea>
  </div>

  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlTextarea1">Preço Base</label><br>
    <input class="text-dark form-control" type="number" name="precobase"><br>
    <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlTextarea1">Preço Padrão</label><br>
    <input class="text-dark form-control"  type="number" name="precopadrao"><br>
    <label class="grad-txt f-20 font-weight-bold"for="exampleFormControlTextarea1">Preço Premium</label><br>
    <input class="text-dark form-control"  type="number" name="precopremium">
  </div>

     
  <div class="form-actions">
     <button type="submit" name="submitservice" class="btn btn-primary ml-auto mt-2">Criar Serviço</button>
   </div>
</form>

</div>
</div>
</div>
</div>
<?php



if(isset($_POST["submitservice"])){
  try {
  

    $sql = "INSERT INTO servico (id_utilizador, id_subarea, descricao)
    VALUES ('".$id."','".$_POST["subarea"]."','".$_POST["descricao"]."'); INSERT INTO preco_servico (id_servico, base, padrao, premium) VALUES ((SELECT id_servico FROM servico ORDER BY id_servico DESC limit 1),'".$_POST["precobase"]."','".$_POST["precopadrao"]."','".$_POST["precopremium"]."')";
    
   
     
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


