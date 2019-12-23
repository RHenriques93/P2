    <div class="container">
        <div class="container-fluid py-3">
          
            <div class="row justify-content-center">


            <?php 
            
           


require("db_projetofinal.php");
if(isset($_REQUEST["id"])){
$id = $_REQUEST["id"];



$dados = $db->query("SELECT DISTINCT utilizador.nome, utilizador.id_utilizador, requisicao.nome_projeto, requisicao.descricao, requisicao.preco FROM utilizador JOIN requisicao ON utilizador.id_utilizador = requisicao.id_utilizador JOIN subarea ON requisicao.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE utilizador.id_utilizador = '$id'");


foreach ($dados as $row) {

                echo '<div class="col-md-3 col-sm-6 col-xs-12 m-2">
                    <div class="card" style="width: 18rem">
                        <img src="img/exemplo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                        <h3 class="card-title grad-txt">Nome do Projeto: '.$row["nome_projeto"].'</h3><hr>
                        <h4 class="card-title grad-txt">Descrição: '.$row["descricao"].'</h4><hr>
                        <h4 class="card-title grad-txt">Utilizador: '.$row["nome"].'</h4><hr>
                        <h4 class="card-title grad-txt">Orçamento: '.$row["preco"].'</h4>
                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>';

}
}
               
?>

            </div>
        </div>
    </div>



    

 
