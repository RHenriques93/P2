    <div class="container">
        <div class="container-fluid py-3">
            <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">Sub-Serviços</h2>
                    <span class="underline mb-3"></span>
            </header>
            <div class="row justify-content-center">

            <?php 
            $id = $_REQUEST["id"];

            require("db_projetofinal.php");

$dados = $db->query("SELECT subarea.nome, subarea.id_subarea, subarea.img_subarea FROM subarea JOIN area ON subarea.id_area = area.id_area WHERE area.id_area = $id");

foreach ($dados as $row) {

           echo '
            <div class="col-md-4 col-sm-6 col-xs-12 my-2 text-center">
                <div class="grad p-4 rounded">
                    
                <a href="index.php?op=subarea&id='.$row["id_subarea"].'" class="text-light">
                        
                    
                            <h3 class="px-2"><div class="panel-body">
                            <img src="img/'.$row["img_subarea"].'" width="100px" class="img-fluid">
                            <hr>
                            </div>'.$row["nome"].'</h3>
                        
                        
                    </a>
                </div>
             </div>
            ';
                
            
            }
  ?>              
                </div>
        </div>
    </div>
