    <div class="container">
        <div class="container-fluid py-3">
            <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">Serviços</h2>
                    <span class="underline mb-3"></span>
            </header>
            <div class="row">



            <?php require("db_projetofinal.php");

$dados = $db->query("SELECT subarea.nome, subarea.descricao, subarea.id_subarea FROM subarea JOIN area ON subarea.id_area = area.id_area WHERE area.id_area = $id");

foreach ($dados as $row) {

           echo '<div class="col-md-4 col-sm-6 col-xs-12 my-1">
                    <div class="grad p-2 rounded">
                        <a href="index.php?op=area&id='.$row["nome"].'" class="text-light">
                            <h3 class="px-2"><i class="fas fa-pen-nib pr-2"></i>'.$row["nome"].'</h3>
                        </a>
                    </div>
                </div>';
            }
  ?>              
                </div>
        </div>
    </div>
