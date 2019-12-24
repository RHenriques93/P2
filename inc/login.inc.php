<?php
        require("db_projetofinal.php");

        if(isset($_REQUEST["submit"])) {

            if(empty($_REQUEST["nome"]) || empty($_REQUEST["pass"])){

                $message = $error->getMessage();
            } else {

                $nome = $_REQUEST["nome"];
                $pass =$_REQUEST["pass"];


                $query = "SELECT * FROM utilizador WHERE nome = :nome AND pass = :pass";

            $dados = $db->query("SELECT * FROM utilizador WHERE nome = '$nome' AND pass = '$pass'");

                    foreach ($dados as $row) {

                        $id = $row["id_utilizador"];
                    }

            
                        $statement = $db->prepare($query);
                $statement->execute(array('nome'=>$_REQUEST["nome"], 'pass'=>$_REQUEST["pass"]));

                
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
                $_SESSION["nome"] = $_POST["nome"];
                $logado = true;
                $_SESSION["id_utilizador"] = $id;
                header("location:index.php?op=usersettings");
                    
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
        }
?>

    <form class="col-8 text-center d-flex justify-content-center m-4 vdivider">
        <div class="modal" id="demoModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header  justify-content-center">
                        <h2 class="grad-txt">Recuperar Password</h2>
                    </div>
                    <div class="modal-body">
                        <p class="txt-gr">Para recuperar a sua password por favor preencha o formulário a baixo.</p>
                        <input type="text" class="form-control text-center" name="email" placeholder="E-Mail" required>
                        <button type="button" class="btn btn-grad grad text-center m-2">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="container w-50">
        <div class="row area justify-content-center">
            <div class="col-12 text-center p-2">
                <h1 class="grad-txt">Área de Utilizador</h1>
            </div>
            <div class="col-12 text-center d-flex justify-content-center">
                <hr class="divider">
            </div>
            <form class="col-6 text-center justify-content-center" method="POST">
                <div class="input-group m-2">  
                    <span class="input-group-addon" id="input1"><i class="fas fa-user fa-sm txt-gr op-3"></i></span>
                    <input type="text" class="form-control text-center" name="nome" placeholder="Username" required>
                </div>
                <div class="input-group m-2">
                    <span class="input-group-addon" id="input1"><i class="fas fa-key fa-sm txt-gr op-3"></i></span>
                    <input type="password" class="form-control text-center" name="pass" placeholder="Password" required>
                </div>
                <button type="submit" name="submit" class="btn btn-grad grad text-center m-2"><i class="fas fa-sign-in-alt"></i> Login</button>
            </form>
            <div class="col-12 text-center p-2">
                <button type="button" class="btn grad-txt text-center m-2" data-toggle="modal" data-target="#demoModal">Recuperar Password</button>
            </div>
            <?php
                if(isset($message)){
                    echo $message;
                }
            ?>
        </div>
    </div>

