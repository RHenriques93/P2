<?php

require("db_projetofinal.php");


        if(isset($_GET["id_utilizador"]) && isset($_GET['repor_pass'])) {

                    $id = $_GET["id_utilizador"];
                    $password = $_GET["repor_pass"];

                    $query="SELECT * FROM utilizador WHERE id_utilizador=:id_utilizador AND repor_pass=:repor_passe";

                    $stmt = $db->prepare($query);
                    $stmt->execute(array(":id_utilizador"=>$id,":repor_passe"=>$password));
                    $rows = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 1) {
            if(isset($_POST['resetpass'])) {

                    $password = $_POST['pass'];
                    $confirmpass = $_POST['confirm-pass'];

                    $password_hashed = password_hash($confirmpass, PASSWORD_DEFAULT); 
                    
                        if($confirmpass!==$password) {
                                $msg = "
                                <div class='row'>
                                        <div class='col-12'>
                                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                        <strong>As duas passwords não correspondem.</strong>
                                </div>
                                        </div>
                                                </div>";
                        } else {

                                $query="UPDATE utilizador SET pass = :hashed_pass WHERE id_utilizador = :id_utilizador";

                                $stmt = $db->prepare($query);

                                $stmt->execute(array(":hashed_pass"=>$password_hashed,":id_utilizador"=>$id));
                                
                                $msg = $msg = "
                                <div class='row'>
                                        <div class='col-12'>
                                                <div class='alert alert-success alert-dismissible fade show' role='alert'>Password Alterada.
                                </div>
                                        </div>
                                                </div>";

                                header("refresh:5;index.php");
                        }
            } 
        } else {
        exit;
        }
        }

?>


          <div class="container-fluid py-3 justify-content-center">

                <header class="col-md-12 mb-4">
                <h2 class="text-center text-dark">Fazer Reset à Password</h2>
                <span class="underline mb-3"></span>
                </header>

                <div class="row justify-content-center">
                        <form method="post" enctype="multipart/form-data">
         
       
                        <?php 
                        if(isset($msg)) {
                        echo $msg;
                        }
                        ?>

                        
                                <div class="col-md-12 mb-1">
                                <label class="grad-txt f-20 font-weight-bold" for="biografia">Nova Password</label>
                                <input type="password" placeholder="New Password" name="pass" required class="form-control"><hr>

                                <label class="grad-txt f-20 font-weight-bold" for="biografia">Confirmar Nova Password</label>
                                <input type="password" placeholder="Confirmar Password" name="confirm-pass" required class="form-control"><hr>
                                
                                <button type="submit" name="resetpass" class="btn btn-primary ml-auto">Faça Reset à Sua Password</button>
                                
                                </div>
                                
                        </form>



      </div>
          </div>