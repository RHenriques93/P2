   <div class="container w-50">
        <div class="row area justify-content-center">
            <div class="col-12 text-center p-2">
                <h1 class="grad-txt">Criar Registo</h1>
            </div>
            <div class="col-12 text-center d-flex justify-content-center">
                <hr class="divider">
            </div>
            <form class="col-6 text-center justify-content-center" method="POST" action="">
                <input type="text" class="form-control" name="nome" placeholder="Nome" required>
                <input type="text" class="form-control mt-2" name="apelido" placeholder="Apelido" required>
                <select class="custom-select mt-2 text-secondary w-100 align-content-left" id="inputGroupSelect01" name="tipo_utilizador">
                    <option class="bg-dark" value="" disabled selected>Tipo de Registo</option>
                    <option class="text-secondary" value="1">Cliente</option>
                    <option class="text-secondary" value="2">Trabalhador</option>
                </select>
                <input type="text" class="form-control mt-2" name="user" placeholder="Username" required>
                <input type="date" class="form-control mt-2" name="data_nascimento" placeholder="Data de Nascimento" required>
                <input type="email" class="form-control mt-2" name="email" placeholder="mail" required>
                <input type="password" class="form-control mt-2" name="pass" placeholder="Password" required>
                <button type="submit" name="submit" class="btn btn-grad grad text-center m-2"><i class="fas fa-sign-in-alt"></i> Registar</button>
            </form>
            <form class="col-8 text-center d-flex justify-content-center m-4 vdivider">
            <a href="index.php?op=login" class="lead grad-txt">Já tenho conta</a>
            </form>
        </div>
    </div>

<?php 



if(isset($_POST["submit"])){
   
    try {
        $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");           
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line

      $sql = "INSERT INTO utilizador (nome, email, data_nascimento, pass, tipo_utilizador)
      VALUES ('".$_POST["nome"]."','".$_POST["email"]."','".$_POST["data_nascimento"]."','".$_POST["pass"]."','".$_POST["tipo_utilizador"]."')";
      if ($db->query($sql)) {
      echo "<script type= 'text/javascript'>alert('Registo Efetuado com Sucesso');</script>";
      }
      else{
      echo "<script type= 'text/javascript'>alert('Registo Inválido.');</script>";
      }
      
      $dbh = null;
      }
      catch(PDOException $e)
      {
      echo $e->getMessage();
      }
      }
      
      ?>
  
    </main>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
