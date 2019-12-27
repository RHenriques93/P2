
<?php require("db_projetofinal.php");

$id = $_REQUEST["id"];

$dados = $db->query("SELECT subarea.nome, subarea.id_area FROM subarea WHERE subarea.id_subarea = $id");


foreach ($dados as $linha)

 echo   '<div class="container">
        <div class="container-fluid py-3">
            <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">'.$linha["nome"].'</h2>
                    <span class="underline mb-3"></span>
                                </header>
            <div class="row justify-content-center">';


            ?>         
<?php 

$dados = $db->query("SELECT DISTINCT utilizador.nome, utilizador.id_utilizador, utilizador.imagem, servico.id_servico, servico.descricao, servico.img_service FROM utilizador JOIN servico ON utilizador.id_utilizador = servico.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE subarea.id_subarea = $id");


if ($dados->rowCount() > 0)
  {


foreach ($dados as $row) {

                echo '<div class="col-md-3 col-sm-6 col-xs-12 m-2">
                    <div class="card" style="width: 18rem">
    <div id="'.$row["id_servico"].'" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="'.$row["img_service"].'" class="card-img-top" alt="...">
        </div>
        <div class="carousel-item">
            <img src="'.$row["imagem"].'" class="card-img-top" alt="...">
        </div>
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


    echo '<div class="row justify-content-center"><div class="col-md-5 text-center p-2"> <h1>Ainda não existem serviços associados. Associe um serviço.</h1></div></div>';


  }

               
?>

            </div>
        </div>
    </div>

 
