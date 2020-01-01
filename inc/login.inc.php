<?php

        require("db_projetofinal.php");
       

        if(isset($_REQUEST["submit"])) {

            
                $username = $_REQUEST["username"];
                $password =$_REQUEST["pass"];
             
                                    
                $sql = "SELECT * FROM utilizador WHERE username = :username";

                $statement = $db->prepare($sql);
                $statement->execute(array('username'=>$_REQUEST["username"]));

          
                foreach ($statement as $row) {

                        $hashed_password = $row["pass"];
                                           }
                                      
                        if (password_verify($password, $hashed_password)) {
                                                                          
                             
                $query = "SELECT * FROM utilizador WHERE username = :username AND pass = :pass";

                $statement = $db->prepare($query);
                $statement->execute(array('username'=>$_REQUEST["username"], 'pass'=>$hashed_password));

          
                foreach ($statement as $row) {

                        $id = $row["id_utilizador"];
                        
                                           }
                   
              
                  
                
                $count = $statement->rowCount();
                if($count > 0){
                    $message = '<div class="row">
                    <div class="col-12">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                                <span aria-hidden="true" class="text-dark">&times;</span>
                            </button>
                            Login efetuado com sucesso! A redirecionar para a página de utilizador...
                        </div>
                    </div>
                </div>';
                $_SESSION["username"] = $_POST["username"];
                $logado = true;
                $_SESSION["id_utilizador"] = $id;
               
                header("location:index.php?op=userpage");
                    
                } 
            
            } else {
                $message = '<div class="row">
                <div class="col-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
                            <span aria-hidden="true" class="text-dark">&times;</span>
                        </button>
                        Username ou Password incorretos, verifique se inseriu corretamente os dados!
                    </div>
                </div>
            </div>';
            }

            
        }
    
?>

    <form method="post" class="col-md-8 text-center d-flex justify-content-center m-4 vdivider">
        <div class="modal" id="demoModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header  justify-content-center">
                        <h2 class="grad-txt">Recuperar Password</h2>
                    </div>
                    <div class="modal-body">
                        <p class="txt-gr">Para recuperar a sua password por favor preencha o formulário a baixo.</p>
                        <input type="text" class="form-control text-center" name="email" placeholder="E-Mail" required>
                        <button type="submit" name="submit_email" class="btn btn-grad grad text-center m-2">Confirmar</button>
                            
                                                 
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container">

    <div class="row justify-content-center">
    <div class="col-md-7">
        <div class="row area justify-content-center">
        
            <div class="col-md-12  text-center p-2">
                <h1 class="grad-txt">Área de Utilizador</h1>
            </div>
            <div class="col-12 text-center d-flex justify-content-center">
                <hr class="divider">
            </div>
            <form class="col-6 text-center justify-content-center" method="POST">
                <div class="input-group m-2">  
                    <span class="input-group-addon" id="input1"><i class="fas fa-user fa-sm txt-gr op-3"></i></span>
                    <input type="text" class="form-control text-center" name="username" placeholder="Username" required>
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon" id="input1"><i class="fas fa-key fa-sm txt-gr op-3"></i></span>
                    <input type="password" class="form-control text-center" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-grad grad text-center m-2"><i class="fas fa-sign-in-alt"></i> Login</button>
            </form>
            <div class="col-12 text-center p-2">
                <button type="button" class="btn grad-txt text-center m-2" data-toggle="modal" data-target="#demoModal">Recuperar Password</a></button>
            </div>
            
<?php
                if(isset($message)){
                    echo $message;
                }
            ?>
         
        </div>
    </div>
    </div>
    </div>

<?php
        if(isset($_REQUEST["submit_email"])){
          

            $email = $_POST['email'];
           
            
            $query = "SELECT id_utilizador FROM utilizador WHERE email = :email LIMIT 1";

            $stmt = $db->prepare($query);
                       
            $stmt->execute(array(':email'=>$email));
            $row = $stmt->fetch(PDO::FETCH_ASSOC); 
            
            
            if($stmt->rowCount() == 1) {
                        $id = $row["id_utilizador"];

                        $password = md5(uniqid(rand()));
                        
                        $query="UPDATE utilizador SET repor_pass=:repor_pass WHERE email=:email";

                        $stmt = $db->prepare($query);

                        $stmt->execute(array(":repor_pass"=>$password,"email"=>$email));
                        
                        $subject = "Recuperação de Password";

                        $message= "
Olá, $email
                        
Clique no link a baixo para fazer reset à sua password:
http://localhost/projetofinal/index.php?op=resetpassword&id_utilizador=$id&repor_pass=$password
                    
                       
Obrigado.
Hire-Frame
";

                        $header = "From: webthings99@gmail.com"."X=Mailer:PHP/".phpversion();

                       mail($email,$subject,$message);
                        $msg = "<script> alert(Enviámos um email para $email.Por favor clique no link que lhe enviámos para fazer reset à sua password) </script>";
            } else {
            $msg = "<script> alert(Pedimos Desculpa, mas o e-mail que introduziu não corresponde a nenhum mail na nossa base de dados) </script>";
            }
        }
            ?>
            
            <?php

                if(isset($msg)) {
                    echo $msg;
                } else {
                    //echo '<div>Please enter your email address. You will receive a link to create a new password via email.!</div>';  
                }

            ?>

