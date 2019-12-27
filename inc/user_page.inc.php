<div class="container">
  <div class="container-fluid py-3 justify-content-center">
<?php
if(isset($_SESSION['username'],$_SESSION['id_utilizador'])){
require("db_projetofinal.php");

$id = $_SESSION["id_utilizador"];
$username = $_SESSION["username"];
  $dados = $db->query("SELECT * FROM utilizador WHERE username = '$username'");



  foreach ($dados as $row){

    // se o utilizador for -> cliente
    if($row["tipo_utilizador"] == 1) {


      if($row['id_genero'] == 1) {
        echo '
        <header class="col-md-12 mb-4">
          <h2 class="text-center text-dark">Bem Vindo <br><span class="f-700 text-dark">'.$row['nome'].'</span></h2>
          <span class="underline-rosa mb-3"></span>
        </header>
    
         <div class="row justify-content-center">
        <img src="'.$row["imagem"].'" class="rounded-circle border border-grad" width="200px">
         </div><br>
    
        <div class="row justify-content-center">
          <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
          </div>
          <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarreq">Seus Pedidos</a></h5></button>
          </div>
          <div class="col-md-12 text-center my-2 mt-4">
          <button class="btn btn-danger"><a class="text-white" href="index.php?op=logout"><h5>Logout</a></h5></button>
          </div>
        </div>
        ';}else{
          echo '
          <header class="col-md-12 mb-4">
            <h2 class="text-center text-dark">Bem Vinda <br><span class="f-700 text-dark">'.$row['nome'].'</span></h2>
            <span class="underline-rosa mb-3"></span>
          </header>
    
          <div class="row justify-content-center">
          <img src="'.$row["imagem"].'" class="rounded-circle border border-grad" width="200px">
           </div><br>
    
          <div class="row justify-content-center">
            <div class="col-md-4">
              <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
            </div>
            <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarreq">Seus Pedidos</a></h5></button>
          </div>
            <div class="col-md-12 text-center my-2 mt-4">
                <button class="btn btn-danger"><a class="text-white" href="index.php?op=logout"><h5>Logout</a></h5></button>
            </div>
          </div>
          ';
        }
    



      



    // se o utilizador for -> trabalhador  
    } else if($row["tipo_utilizador"] == 2) {


      if($row['id_genero'] == 1) {
        echo '
        <header class="col-md-12 mb-4">
          <h2 class="text-center text-dark">Bem Vindo <br><span class="f-700 text-dark">'.$row['nome'].'</span></h2>
          <span class="underline-rosa mb-3"></span>
        </header>
    
         <div class="row justify-content-center">
        <img src="'.$row["imagem"].'" class="rounded-circle border border-grad" width="200px">
         </div><br>
    
        <div class="row justify-content-center">
          <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
          </div>
          <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarservicos">Seus Serviços</a></h5></button>
          </div>
         
          <div class="col-md-12 text-center my-2 mt-4">
          <button class="btn btn-danger"><a class="text-white" href="index.php?op=logout"><h5>Logout</a></h5></button>
          </div>
        </div>
        ';}else{
          echo '
          <header class="col-md-12 mb-4">
            <h2 class="text-center text-dark">Bem Vinda <br><span class="f-700 text-dark">'.$row['nome'].'</span></h2>
            <span class="underline-rosa mb-3"></span>
          </header>
    
          <div class="row justify-content-center">
          <img src="'.$row["imagem"].'" class="rounded-circle border border-grad" width="200px">
           </div><br>
    
          <div class="row justify-content-center">
            <div class="col-md-4">
              <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
            </div>
            <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarservicos">Seus Serviços</a></h5></button>
          </div>
         
            <div class="col-md-12 text-center my-2 mt-4">
                <button class="btn btn-danger"><a class="text-white" href="index.php?op=logout"><h5>Logout</a></h5></button>
            </div>
          </div>
          ';
        }
    








        // se o utilizador for -> trabalhador  e cliente
    } else  if($row["tipo_utilizador"] == 3 ) {



      if($row['id_genero'] == 1) {
        echo '
        <header class="col-md-12 mb-4">
          <h2 class="text-center text-dark">Bem Vindo <br><span class="f-700 text-dark">'.$row['nome'].'</span></h2>
          <span class="underline-rosa mb-3"></span>
        </header>
    
         <div class="row justify-content-center">
        <img src="'.$row["imagem"].'" class="rounded-circle border border-grad" width="200px">
         </div><br>
    
        <div class="row justify-content-center">
          <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
          </div>

          <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarreq">Seus Pedidos</a></h5></button>
          </div>

          <div class="col-md-4">
          <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarservicos">Seus Serviços</a></h5></button>
        </div>


          <div class="col-md-12 text-center my-2 mt-4">
          <button class="btn btn-danger"><a class="text-white" href="index.php?op=logout"><h5>Logout</a></h5></button>
          </div>
        </div>
        ';}else{
          echo '
          <header class="col-md-12 mb-4">
            <h2 class="text-center text-dark">Bem Vinda <br><span class="f-700 text-dark">'.$row['nome'].'</span></h2>
            <span class="underline-rosa mb-3"></span>
          </header>
    
          <div class="row justify-content-center">
          <img src="'.$row["imagem"].'" class="rounded-circle border border-grad" width="200px">
           </div><br>
    
          <div class="row justify-content-center">
            <div class="col-md-4">
              <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href="index.php?op=usersettings">Informações de Perfil</a></h5></button>
            </div>
           
            <div class="col-md-4">
            <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarreq">Seus Pedidos</a></h5></button>
          </div>

          <div class="col-md-4">
          <button class="btn btn-grad grad col-12 mb-2"><h5><a class="text-light" href ="index.php?op=listarservicos">Seus Serviços</a></h5></button>
        </div>
            
            <div class="col-md-12 text-center my-2 mt-4">
                <button class="btn btn-danger"><a class="text-white" href="index.php?op=logout"><h5>Logout</a></h5></button>
            </div>
          </div>
          ';
        }













    }

  }


?>         
  </div>
</div>


<?php
  } else {
    header("location:index.php?op=login");
  }
?>










