<?php
if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){

require("db_projetofinal.php");
$id = $_SESSION["id_utilizador"];
?>

<div class="container py-3">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb grad">
        <li class="breadcrumb-item"><a class="text-white font-weight-bold" href="index.php?op=userpage">Perfil</a></li>
        <li class="breadcrumb-item"><a class="text-white font-weight-bold" href="index.php?op=listarreq">Seus Pedidos</a></li>
        <li class="breadcrumb-item active text-light" aria-current="page">Efetuar Pedido</li>
  </ol>
</nav>

    <section class="mb-4">
    <header class="col-md-12 mb-4">
      <h2 class="text-center text-dark">Efetuar Pedido</h2>
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
              <label class="grad-txt f-20 font-weight-bold" for="name">Nome do Projeto</label>
              <input type="text" class="form-control" id="name" name="nome_projeto" aria-describedby="nameHelp">
        </div>

  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlSelect2">Tipo de Serviço</label>
    <select class="form-control" name="subarea" id="exampleFormControlSelect1">

    <?php
     
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
    ?>

        </select>
  
  
  </div>
  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="exampleFormControlTextarea1">Descrição</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descricao" rows="3"></textarea>
  </div>

  <div class="form-group">
  <label class="grad-txt f-20 font-weight-bold" for="preco">Quantia que pretende gastar?</label>
  <input type="text" class="form-control" id="name" name="preco" aria-describedby="nameHelp">
</div>

     
  <div class="form-actions">
     <button type="submit" name="submitservice" class="btn btn-primary ml-auto">Efetuar Pedido</button>
   </div>
</form>

</div>
</div>
</div>
</div>
<?php



if(isset($_POST["submitservice"])){
  try {
    
    $sql = "INSERT INTO requisicao (id_utilizador, id_subarea, descricao, preco, nome_projeto)
    VALUES ('".$id."','".$_POST["subarea"]."','".$_POST["descricao"]."','".$_POST["preco"]."','".$_POST["nome_projeto"]."')";
    
   
     
    if ($db->query($sql)) {
    echo "<script type= 'text/javascript'>alert('Serviço Associado com Sucesso');</script>";
    echo '<script type="text/javascript"> window.location="index.php?op=listarreq";</script>';
   
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


