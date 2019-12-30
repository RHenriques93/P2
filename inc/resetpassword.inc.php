<?php

require("db_projetofinal.php");

        if(empty($_GET['id_utilizador']) && empty($_GET['repor_pass'])) {
                    $user->redirect('index.php');
        }

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
                                    $msg = " <strong>As duas passwords não correspondem.</strong>";
                        } else {
                                $stmt = $user->query("UPDATE utilizador SET pass = :hashed_pass WHERE id_utilizador = :id_utilizador");
                                $stmt->execute(array(":hashed_pass"=>$confirmpass,":id_utilizador"=>$rows['id_utilizador']));
                                
                                $msg = "Password Alterada.";
                                header("refresh:5;index.php");
                        }
            } 
        } else {
        exit;
        }
        }

?>


  <div>
  <strong>Olá</strong>  <?php echo $rows['email']?> Faça Reset à sua password.
  </div>
        <form method="post">
        <h3>Password Reset.</h3>
        <?php
        if(isset($msg))
  {
   echo $msg;
  }
  ?>
        <input type="password" placeholder="New Password" name="pass" required>
        <input type="password" placeholder="Confirme a sua Nova Password" name="confirm-pass" required>
        <button type="submit" name="resetpass">Faça Reset à sua Password</button>
        
      </form>
