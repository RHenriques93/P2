<div class="container-fluid">
            <div class="row justify-content-center">


            <?php 
require("db_projetofinal.php");
if(isset($_REQUEST["id_utilizador"],$_REQUEST["id_req"])){

$id = $_REQUEST["id_utilizador"];
$id_req = $_REQUEST["id_req"];


$dados = $db->query("SELECT utilizador.nome AS 'Nome Utilizador', utilizador.email, utilizador.biografia, utilizador.imagem, genero_utilizador.genero, area.nome AS 'Nome Area', subarea.nome AS 'Nome Subarea', requisicao.descricao, requisicao.img_req, requisicao.preco FROM utilizador JOIN genero_utilizador ON utilizador.id_genero = genero_utilizador.id_genero JOIN requisicao ON utilizador.id_utilizador = requisicao.id_utilizador JOIN subarea ON requisicao.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area WHERE utilizador.id_utilizador = $id AND requisicao.id_requisicao = '$id_req'");

foreach ($dados as $row) {


    
                echo '
                                            
                    <div class="col-md-8 mt-4">
                        <div class="card-body grad rounded">

                                        <div class="media">
                                                <img src="'.$row["imagem"].'" class="align-self-center mr-3 rounded-circle border border-grad" width="150px" height="150px" alt="...">
                                            
                                                <div class="media-body">
                                                    <h5 class="mt-0 f-20 font-weight-bold">Requisitador de Serviço</h5><hr>
                                                    <p><strong>Nome: </strong>'.$row["Nome Utilizador"].'</p><hr>
                                                    <p><strong>Biografia: </strong>'.$row["biografia"].'</p><hr>
                                                    <p><strong>Género: </strong>'.$row["genero"].'</p>
                                                </div>
                                        </div>

                                        <hr>

                                        <div class="media">
                                                    <img src="'.$row["img_req"].'" class="align-self-center mr-3" width="150px" height="150px" alt="...">
                                            <div class="media-body">
                                                    <label class="grad-white f-20 font-weight-bold">Serviço Requisitado</label>
                                                            <ul class="list-group">
                                                                <li class="list-group-item text-dark"><span class="grad-txt font-weight-bold">Área: </span>'.$row["Nome Area"].'</li>
                                                                <li class="list-group-item text-dark"><span class="grad-txt font-weight-bold">Subarea: </span>'.$row["Nome Subarea"].'</li>
                                                                <li class="list-group-item text-dark"><span class="grad-txt font-weight-bold">Descrição: </span>'.$row["descricao"].'</li>
                                                                <li class="list-group-item text-dark"><span class="grad-txt font-weight-bold">Orçamento que estou disposto a gastar: </span>'.$row["preco"].'€</li>  </li>
                                                            </ul>
                                                            <br>
                                            </div>

                                        </div>
                                        
                                                  
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                                      Responder ao Pedido de '.$row["Nome Utilizador"].'
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                      
                                        <div class="modal-content">
                                         
                                          <div class="modal-body">
                                            


                                                            <form role="form" method="post" id="reused_form">
                                                          
                                                            <div class="form-group">
                                                                <label class="grad-txt f-20 font-weight-bold" for="email">
                                                                    Email do requisitador de Serviço -> '.$row["Nome Utilizador"].':</label>
                                                                <input type="email" class="form-control"
                                                                id="email" name="email" required maxlength="50" value="'.$row["email"].'" disabled>
                                                            </div>

                                                            <div class="form-group">
                                                            <label class="grad-txt f-20 font-weight-bold" for="name">
                                                                Assunto:</label>
                                                            <input type="text" class="form-control"
                                                            id="name" name="name"   required maxlength="50">

                                                            <div class="form-group">
                                                                <label class="grad-txt f-20 font-weight-bold" for="name">
                                                                    Mensagem:</label>
                                                                <textarea class="form-control" type="textarea" name="message"
                                                                id="message" placeholder="Digite aqui a sua mensagem."
                                                                maxlength="6000" rows="7"></textarea>
                                                            </div>
                                                            <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Responder ao Pedido de '.$row["Nome Utilizador"].'</button>
                                                    
                                                        </form>               



                                                        </div>
                                                            
                                                                    
                                            </div>
                                            </div>
                                                            
                                                                    
                                                                    
                        </div> 
                    </div>';

}
}
               
?>

            </div>
        </div>
    

 
    

 
