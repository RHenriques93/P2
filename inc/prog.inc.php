    <div class="container">
        <div class="container-fluid py-3">
            <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">Programação</h2>
                    <span class="underline-rosa mb-3"></span>
                    <p class="text-center w-responsive mx-auto mb-5 btn-grad grad p-2">Aqui poderá encontrar alguns dos Freelancers na area
                        da Programação registados na nossa plataforma.</p>
            </header>
            <div class="row justify-content-center">

                <?php

require("db_projetofinal.php");

$dados = $db->query("SELECT utilizador.nome, utilizador.id_utilizador FROM utilizador JOIN servico ON utilizador.id_utilizador = servico.id_utilizador JOIN area ON servico.id_area = area.id_area WHERE area.id_area = 4");

foreach ($dados as $row) {
               echo '<div class="col-md-3 col-sm-6 col-xs-12 m-2">
                    <div class="card" style="width: 18rem">
                        <img src="img/exemplo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title grad-txt">'.$row["nome"].'</h3>
                            <p class="card-text text-dark">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>';
}
?>
            </div>
        </div>
    </div>

  