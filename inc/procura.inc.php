    <div class="container">
        <div class="container-fluid py-3">
          
            <div class="row justify-content-center">


            <?php 
            
           

$search = $_REQUEST["search"];
require("db_projetofinal.php");


$dados = $db->query("SELECT DISTINCT utilizador.nome, utilizador.id_utilizador FROM utilizador JOIN servico ON utilizador.id_utilizador = servico.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE area.nome LIKE '$search%' OR utilizador.nome LIKE '%$search%'");
echo'<header class="col-md-12 mb-4">
<h2 class="text-center text-dark">Resultados da pesquisa para "'.$search.'"</h2>
<span class="underline mb-3"></span>
</header>';

    foreach ($dados as $row) {
                echo '<div class="col-md-3 col-sm-6 col-xs-12 m-2">
                    <div class="card" style="width: 18rem">
                        <img src="img/exemplo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title grad-txt">'.$row["nome"].'</h3>
                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                            <a href="index.php?op=servicepage&id='.$row["id_utilizador"].'" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>';

    }

               
?>

            </div>
        </div>
    </div>

 
