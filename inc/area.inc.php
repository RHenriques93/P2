

<?php require("db_projetofinal.php");

$id = $_REQUEST["id"];

$dados = $db->query("SELECT area.nome, area.descricao, area.id_area FROM area WHERE area.id_area = $id");


foreach ($dados as $linha)

 echo   '<div class="container">
        <div class="container-fluid py-3">
            <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">'.$linha["nome"].'</h2>
                    <span class="underline mb-3"></span>
                    <p class="text-center w-responsive mx-auto mb-5 btn-grad grad p-2">'.$linha["descricao"].'</p>
            </header>
            <div class="row justify-content-center">';


            ?>         
<?php 

$dados = $db->query("SELECT DISTINCT utilizador.nome, utilizador.id_utilizador FROM utilizador JOIN servico ON utilizador.id_utilizador = servico.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE area.id_area = $id");

foreach ($dados as $row) {

                echo '<div class="col-md-3 col-sm-6 col-xs-12 m-2">
                    <div class="card" style="width: 18rem">
                        <img src="img/exemplo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title grad-txt">'.$row["nome"].'</h3>
                            <a href="index.php?op=servicepage&id='.$row["id_utilizador"].'" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>';

}

               
?>

            </div>
        </div>
    </div>

 
