
   <div class="container">
        <div class="container-fluid py-3">
            <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">Pedidos</h2>
                    <span class="underline-rosa mb-3"></span>
                                </header>
            <div class="row justify-content-center">


     
<?php require("db_projetofinal.php");
$db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
$dados = $db->query("SELECT DISTINCT utilizador.imagem, utilizador.nome, utilizador.id_utilizador, requisicao.nome_projeto, requisicao.descricao, requisicao.preco, requisicao.id_requisicao FROM utilizador JOIN requisicao ON utilizador.id_utilizador = requisicao.id_utilizador JOIN subarea ON requisicao.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area");

foreach ($dados as $row) {

                echo '<div class="col-md-3 col-sm-6 col-xs-12 m-2">
                    <div class="card" style="width: 18rem">
                        <img src="'.$row["imagem"].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title grad-txt">Nome do Projeto:</h3><p class="text-dark card-subtitle">'.$row["nome_projeto"].'<p><hr>
                            <h4 class="card-title grad-txt">Descrição:</h4><p class="text-dark card-subtitle">'.$row["descricao"].'</p><hr>
                            <h4 class="card-title grad-txt">Utilizador:</h4><p class="text-dark card-subtitle">'.$row["nome"].'</p><hr>
                            <h4 class="card-title grad-txt">Orçamento:</h4><p class="text-dark card-subtitle">'.$row["preco"].'€</p>
                            <a href="index.php?op=reqpage&id_utilizador='.$row["id_utilizador"].'&id_req='.$row["id_requisicao"].'" class="btn btn-primary mt-2">Go somewhere</a>
                        </div>
                    </div>
                </div>';

}

               
?>

            </div>
        </div>
    </div>

 
