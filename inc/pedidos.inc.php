
   '<div class="container">
        <div class="container-fluid py-3">
            <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">Pedidos</h2>
                    <span class="underline mb-3"></span>
                                </header>
            <div class="row justify-content-center">';


     
<?php require("db_projetofinal.php");

$dados = $db->query("SELECT DISTINCT utilizador.nome, utilizador.id_utilizador, requisicao.nome_projeto, requisicao.descricao, requisicao.preco FROM utilizador JOIN requisicao ON utilizador.id_utilizador = requisicao.id_utilizador JOIN subarea ON requisicao.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area");

foreach ($dados as $row) {

                echo '<div class="col-md-3 col-sm-6 col-xs-12 m-2">
                    <div class="card" style="width: 18rem">
                        <img src="img/exemplo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title grad-txt">Nome do Projeto: '.$row["nome_projeto"].'</h3><hr>
                            <h4 class="card-title grad-txt">Descrição: '.$row["descricao"].'</h4><hr>
                            <h4 class="card-title grad-txt">Utilizador: '.$row["nome"].'</h4><hr>
                            <h4 class="card-title grad-txt">Orçamento: '.$row["preco"].'</h4>
                            <a href="index.php?op=reqpage&id='.$row["id_utilizador"].'" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>';

}

               
?>

            </div>
        </div>
    </div>

 
