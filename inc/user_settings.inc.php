<?php


if(isset($_SESSION['nome'],$_SESSION['id_utilizador'])){

  

   

require("db_projetofinal.php");


$id = $_SESSION["id_utilizador"];


$dados = $db->query("SELECT * FROM utilizador WHERE utilizador.id_utilizador = '$id'");


foreach ($dados as $linha) {

 echo   '

    <div class="container">
    <div class="card-body">
  
   
    <form method="post" action="inc/upload.inc.php" enctype="multipart/form-data">


    <div class="form-row">
          <img src="'.$linha["imagem"].'" width="250px">
          <input type="file" name="imagemperfil" class="form-control-file" accept="image/x-png,image/jpeg"/>
          
     
    </div>
 
   <div class="form-row">
   
     <label for="input02" class="col-md-3">Nome de Utilizador</label>
        <div class="col-md-9 mb-3">
       <input type="text" class="form-control" id="input02" value="'.$linha["nome"].'"> </div>
     
   </div>

   <div class="form-row">
        <label for="input03" class="col-md-3">Biografia</label>
        <div class="col-md-9 mb-3">
       <textarea type="text" class="form-control" id="input03">'.$linha["biografia"].'</textarea>
     </div>
       </div>

       <div class="form-row">
       <label for="input03" class="col-md-3">E-mail</label>
       <div class="col-md-9 mb-3">
      <textarea type="text" class="form-control" id="input03">'.$linha["email"].'</textarea>
    </div>
      </div>




 
   <div class="form-row">
   
     <label for="input04" class="col-md-3">Available for hire?</label>
   
   
     <div class="col-md-9 mb-3">
       <div class="custom-control custom-checkbox">
         <input type="checkbox" class="custom-control-input" id="input04" checked="">
         <label class="custom-control-label" for="input04">Yes, hire me</label>
       </div>
     </div>
   
   </div>
 
   <hr>

   <div class="form-actions">
     <button type="submit" name="submitimg" class="btn btn-primary ml-auto">Update Profile</button>
   </div>
 
 </form>



</div>
</div>'; 

}




            ?>         
            </div>
        </div>
    </div>


  <?php
 } else {

    header("location:index.php?op=login");

}

?>










