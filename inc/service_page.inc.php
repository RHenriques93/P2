    <div class="container">
        <div class="container-fluid py-3">
          
            <div class="row justify-content-center">


            <?php 
            
           


require("db_projetofinal.php");
if(isset($_REQUEST["id"])){
$id = $_REQUEST["id"];


$dados = $db->query("SELECT  * FROM utilizador WHERE utilizador.id_utilizador = '$id'");

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
}
               
?>

            </div>
        </div>
    </div>

 
