        <div class="container-fluid">
            <div class="row justify-content-center">
            <div class="col-md-8">


            <?php 
            
           


require("db_projetofinal.php");
if(isset($_REQUEST["id_utilizador"],$_REQUEST["id_service"])){

$id = $_REQUEST["id_utilizador"];
$id_serv = $_REQUEST["id_service"];

$db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
$dados = $db->query("SELECT utilizador.nome AS 'Nome Utilizador', utilizador.biografia, utilizador.imagem, genero_utilizador.genero, area.nome AS 'Nome Area', subarea.nome AS 'Nome Subarea', servico.descricao, preco_servico.base, preco_servico.padrao, preco_servico.premium FROM utilizador JOIN genero_utilizador ON utilizador.id_genero = genero_utilizador.id_genero JOIN servico ON utilizador.id_utilizador = servico.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area JOIN preco_servico ON servico.id_servico = preco_servico.id_servico WHERE utilizador.id_utilizador = $id AND servico.id_servico = '$id_serv'");

foreach ($dados as $row) {


    
                echo '                                    
                        <div class="card m-4" style="width: auto;">
                        <div class="card-body grad rounded">

                                        <div class="media">
                                                <img src="'.$row["imagem"].'" class="align-self-center mr-3 rounded-circle border border-grad" width="150px" height="150px" alt="...">
                                            
                                                <div class="media-body">
                                                    <h5 class="mt-0">Prestador de Serviço</h5><hr>
                                                    <p class="text-black"><span class="font-weight-bold">Nome: </span>'.$row["Nome Utilizador"].'</p><hr>
                                                    <p><span class="font-weight-bold">Biografia: </span>'.$row["biografia"].'</p><hr>
                                                    <p><span class="font-weight-bold">Género: </span>'.$row["genero"].'</p>
                                                </div>
                                        </div>

                                        <hr>

                                                                               
                                            <div class="col-md-12">
                                                    <label class="grad-white f-20 font-weight-bold">Serviço</label>
                                                            <ul class="list-group">
                                                                <li class="list-group-item text-dark"><span class="font-weight-bold grad-txt">Área: </span>'.$row["Nome Area"].'</li>
                                                                <li class="list-group-item text-dark"><span class="font-weight-bold grad-txt">Subarea: </span>'.$row["Nome Subarea"].'</li>
                                                                <li class="list-group-item text-dark"><span class="font-weight-bold grad-txt">Descrição: </span>'.$row["descricao"].'</li>
                                                                <li class="list-group-item text-dark">
                                                                        <ul class="m-2">
                                                                            <li class="text-dark"><span class="font-weight-bold grad-txt">Preço Base: </span>'.$row["base"].'€</li>
                                                                            <hr><li class="text-dark"><span class="font-weight-bold grad-txt">Preço Padrão: </span>'.$row["padrao"].'€</li>
                                                                            <hr><li class="text-dark"><span class="font-weight-bold grad-txt">Preço Premium: </span>'.$row["premium"].'€</li>
                                                                        </ul>
                                                                </li>
                                                            </ul>
                                                            <br>
                                            </div>
                                            <div class="container"> 
                                                <div class="row justify-content-center"> 
                                                                 
                                                ';

                                            $dados = $db->query("SELECT img_serv FROM img_service JOIN servico ON img_service.id_servico = servico.id_servico WHERE img_service.id_servico = '$id_serv'");

                                                foreach ($dados as $linha) {
                                                    echo '   
                                                    <div class="col-md-5 col-sm-4 col-xs-6 m-2"> 
                                                        <figure class="figure">  
                                                            <img class="figure-img" src="'.$linha["img_serv"].'" width="auto" height="250px" alt="Imagem do Serviço">
                                                        </figure>
                                                    </div>
                                                        ';
                                                    }       
            
                                    echo ' 
                                        </div>
                                     </div>                 
                                   
                                    <!-- Button trigger modal -->
                                    <div class="form-row justify-content-center">
                                    <button type="button" class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">
                                      Contratar Serviço
                                    </button>
                                    </div>
                                   

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                      
                                        <div class="modal-content">
                                         
                                          <div class="modal-body">
                                            


                                                                    <div class="row justify-content-center">
                                                                    
                                                                    <div class="col-md-8 order-md-1">
                                                                        <h4 class="grad-txt f-30 font-weight-bold">Informações de Pagamento</h4><hr>
                                                                        <form class="needs-validation" novalidate>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-3">
                                                                            <label class="grad-txt f-20 font-weight-bold" for="firstName">Primeiro Nome</label>
                                                                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                                                            <div class="invalid-feedback">
                                                                                Valid first name is required.
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6 mb-3">
                                                                            <label class="grad-txt f-20 font-weight-bold"  for="lastName">Último Nome</label>
                                                                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                                                            <div class="invalid-feedback">
                                                                                Valid last name is required.
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-6 mb-3">
                                                                            <label class="grad-txt f-20 font-weight-bold"  for="lastName">E-Mail</label>
                                                                            <input type="email" class="form-control" id="lastName" placeholder="" value="" required>
                                                                            <div class="invalid-feedback">
                                                                                Valid last name is required.
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                            
                                                                                                                                   
                                                                        <hr>                                                                                                                 
                                                                        <h4 class="mb-3 grad-txt f-20 font-weight-bold"">Método de Pagamento</h4>
                                                            
                                                                        
                                                                        <div class="d-block my-3">
                                                                            <div class="custom-control custom-radio">
                                                                           
                                                                            <input type="radio">
                                                                            <label class="grad-txt f-20 font-weight-bold custom-control-label" for="credit">Cartão de Crédito</label>
                                                                            </div>
                                                                            <div class="custom-control custom-radio">
                                                                            <input type="radio">
                                                                            <label class="grad-txt f-20 font-weight-bold custom-control-label" for="debit">Cartão de Débito</label>
                                                                            </div>
                                                                            
                                                                            <div class="custom-control custom-radio">
                                                                            <input type="radio">
                                                                            <label class="grad-txt f-20 font-weight-bold custom-control-label" for="paypal">Paypal</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6 mb-3">
                                                                                <label class="grad-txt f-20 font-weight-bold" for="cc-name">Nome no Cartão de Crédito</label>
                                                                                <input type="text" class="form-control" id="cc-name" placeholder="" required>
                                                                                <small class="text-muted">Nome Completo como aparece no Cartão de Crédito</small>

                                                                                    <div class="invalid-feedback">
                                                                                        Name on card is required
                                                                                    </div>

                                                                            </div>
                                                                            
                                                                            <div class="col-md-6 mb-3">
                                                                            <label class="grad-txt f-20 font-weight-bold" for="cc-number">Nº de Cartão de Crédito</label>
                                                                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                                                                            <div class="invalid-feedback">
                                                                                Credit card number is required
                                                                            </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3 mb-3">
                                                                            <label class="grad-txt f-20 font-weight-bold" for="cc-expiration">Validade</label>
                                                                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                                                                            <div class="invalid-feedback">
                                                                                Expiration date required
                                                                            </div>
                                                                            </div>
                                                                            <div class="col-md-3 mb-3">
                                                                            <label class="grad-txt f-20 font-weight-bold" for="cc-expiration">CVV</label>
                                                                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                                                                            <div class="invalid-feedback">
                                                                                Security code required
                                                                            </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr class="mb-4">
                                                                        <button class="btn btn-primary btn-lg btn-block" type="submit">Continue para o Checkout</button>
                                                                        </form>
                                                                    </div>
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
        </div>

 