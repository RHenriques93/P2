   <div class="container">
        <div class="container-fluid py-3">
            <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">Pedidos</h2>
                    <span class="underline mb-3"></span>
                                </header>
            <div class="row justify-content-center">


     
<?php require("db_projetofinal.php");
$db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
$dados = $db->query("SELECT DISTINCT utilizador.imagem, utilizador.nome, utilizador.id_utilizador, requisicao.nome_projeto, requisicao.descricao, requisicao.preco, requisicao.id_requisicao FROM utilizador JOIN requisicao ON utilizador.id_utilizador = requisicao.id_utilizador JOIN subarea ON requisicao.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area");

foreach ($dados as $row) {

                echo '<div class="col-md-4 col-sm-6 col-xs-12 mb-4">
                    <div class="card" >
                        <img src="'.$row["imagem"].'" class="card-img-top" alt="...">
                        <div class="card-body">
                           <p class="text-dark card-subtitle"><span class="font-weight-bold grad-txt">Nome do Projeto:</span> '.$row["nome_projeto"].'<p><hr>
                            <p class="text-dark card-subtitle"><span class="font-weight-bold grad-txt">Descrição: </span>'.$row["descricao"].'</p><hr>
                            <p class="text-dark card-subtitle"><span class="font-weight-bold grad-txt">Requisitador: </span>'.$row["nome"].'</p><hr>
                            <p class="text-dark card-subtitle"><span class="font-weight-bold grad-txt">Orçamento que Pretende Gastar: </span>'.$row["preco"].'€</p>
                            <hr><a href="index.php?op=reqpage&id_utilizador='.$row["id_utilizador"].'&id_req='.$row["id_requisicao"].'" class="btn btn-primary">+ Info</a>
                        </div>
                    </div>
                </div>';

}

               
?>

            </div>
        </div>
    </div>