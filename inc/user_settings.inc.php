<?php


if(isset($_SESSION['nome'],$_SESSION['id_utilizador'])){

   ?>

   

<?php require("db_projetofinal.php");


$id = $_SESSION["id_utilizador"];


$dados = $db->query("SELECT  * FROM utilizador WHERE utilizador.id_utilizador = '$id'");


foreach ($dados as $linha) {

 echo   '
    <div class="container">
     <div class="card-body">

 <div class="media mb-3">
 
   <div class="user-avatar user-avatar-xl fileinput-button">
     <div class="fileinput-button-label"> Change photo </div>
     <img src="#" alt="User Avatar">
     <input id="fileupload-avatar" type="file" name="avatar"> </div>
  
   <div class="media-body pl-3">
     <h3 class="card-title"> Public avatar </h3>
     <h6 class="card-subtitle text-muted"> Click the current avatar to change your photo. </h6>
     <p class="card-text">
       <small>JPG, GIF or PNG 400x400, &lt; 2 MB.</small>
     </p>


     <!-- The avatar upload progress bar -->
    <div id="progress-avatar" class="progress progress-xs fade">
       <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
     </div>
     <!-- /avatar upload progress bar -->


   </div>
  
 </div>

 <form method="post">
  
   <div class="form-row">

     <label for="input01" class="col-md-3">Cover image</label>
   
     <div class="col-md-9 mb-3">
       <div class="custom-file">
         <input type="file" class="custom-file-input" id="input01" multiple="">
         <label class="custom-file-label" for="input01">Choose cover</label>
       </div>
       <small class="text-muted">Upload a new cover image, JPG 1200x300</small>
     </div>
     
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
     <button type="submit" class="btn btn-primary ml-auto">Update Profile</button>
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