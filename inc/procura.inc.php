    <div class="container">
        <div class="container-fluid py-3">
          
            <div class="row justify-content-center">


            <?php 
            
           

$search = $_REQUEST["search"];
require("db_projetofinal.php");


$dados = $db->query("SELECT DISTINCT servico.id_servico, utilizador.imagem, servico.descricao, utilizador.nome, utilizador.id_utilizador FROM utilizador JOIN servico ON utilizador.id_utilizador = servico.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE area.nome LIKE '$search%' OR utilizador.nome LIKE '%$search%' OR subarea.nome LIKE '%$search%'");
echo'<header class="col-md-12 mb-4">
<h2 class="text-center text-dark">Resultados da pesquisa para "'.$search.'"</h2>
<span class="underline mb-3"></span>
</header>';


  
$dados->execute();
if ($dados->rowCount() > 0)
{



                            
                                foreach ($dados as $row) {

                                    echo '<div class="col-md-3 col-sm-6 col-xs-12 m-2">
                                        <div class="card" style="width: 18rem">
                                        
                                        <div id="'.$row["id_servico"].'" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                <div class="carousel-item active">
                                <img src="'.$row["imagem"].'" class="card-img-top" alt="...">
                                </div>

                                ';

                                $id_serv = $row["id_servico"];

                                        $dados = $db->query("SELECT img_serv FROM img_service JOIN servico ON img_service.id_servico = servico.id_servico WHERE servico.id_servico = $id_serv");

                                foreach ($dados as $linha) {
                                echo ' 
                                <div class="carousel-item">
                                <img src="'.$linha["img_serv"].'" class="card-img-top" alt="...">
                                </div>

                                ';



                                }


                                echo           '   
                                </div>


                                <a class="carousel-control-prev" href="#'.$row["id_servico"].'" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#'.$row["id_servico"].'" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                                </div>
                                            <div class="card-body">
                                                <h3 class="card-title grad-txt">'.$row["nome"].'</h3>
                                                <p class="text-dark card-subtitle">'.$row["descricao"].'</p>
                                                <a href="index.php?op=servicepage&id_utilizador='.$row["id_utilizador"].'&id_service='.$row["id_servico"].'" class="btn btn-primary mt-2">+ Info</a>
                                            </div>
                                        </div>
                                    </div>';

                                }









} else {


    echo '<div class="row justify-content-center"><div class="col-md-8 text-center p-2"> <h1>Lamentamos, mas a sua pesquisa não retornou qualquer resultado.</h1></div></div>';



}
    





?>

            </div>
        </div>
    </div>

 
