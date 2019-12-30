<!-- Pesquisa e titulo -->
<div class="container-fluid grad pad-30">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <h1 class="text-uppercase"><img width="200px" src="img/hire-frame.png"></h1>
                <p class="lead">Aqui poderás encontrar diversos tipos de serviços realizados por trabalhadores freelancers
            nas diversas áreas abrangidas.</p>
            </div>
            <form method="POST" class="col-5">
                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button id="button-addon2" formaction="index.php?op=procura" type="submit" class="btn btn-link"><i class="fas fa-search color-yw"></i></button>
                        </div>
                    <input type="search" name="search" placeholder='O que procuras? "logo" "web site" "captura de video"' aria-describedby="button-addon2" class="form-control border-0 bg-light" required>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>

    <!-- Serviços -->
    <div class="container-fluid">
        <div class="mt-2 py-4">
            <section class="container">
                <header class="col-md-12">
                    <h2 class="text-center text-dark">Serviços</h2>
                    <span class="underline"></span>
                </header>
                <div class="row pt-4 justify-content-center">


                <?php require("db_projetofinal.php");

$dados = $db->query("SELECT * FROM area");

             foreach ($dados as $linha) {       

                echo '                    

                       <div class="col-md-4 col-sm-6 col-xs-12 my-1 text-center">
                    <div class="grad p-4 rounded">
                        
                        <a href="index.php?op=area&id='.$linha["id_area"].'" class="text-light">
                            
                        
                                <h3 class="px-2"><div class="panel-body">
                                <img src="img/'.$linha["img_area"].'" width="100px" class="img-fluid">
                                <hr>
                                </div>'.$linha["nome"].'</h3>
                            
                            
                        </a>
                    </div>
                </div>';        
                }
                ?>  

                </div>
                    <br>
                    <hr class="mx-5">
                    <div class="col-md-12 justify-content-center text-center">
                        <button class="btn btn-grad grad text-center mt-2"><a href="index.php?op=servicos" class="text-light">Ver Todos<i class="far fa-plus-square ml-2"></i></a></button>
                    </div>
            </section>
        </div>
    </div>

    

    <!-- Paralax -->
    <div class="container-fluid bg-paralax">
        <div class="py-4">
            <section class="container">
                <header class="col-md-12 mb-4">
                    <h2 class="text-center text-light">Os nossos números</h2>
                    <span class="underline-rosa"></span>
                    <p class="my-2 text-center text-light">Estes são alguns dos números que temos vindo a angariar</p>
                </header>
                <div class="row py-2">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 mb-4">
                        <div class="fatos">
                            <div class="icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="contador">                            
                                <?php
                                    $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
                                    $dados = $db->query("SELECT * FROM utilizador WHERE tipo_utilizador != 2");
                                    $count = 0;
                                    
                                    foreach($dados as $row) {
                                        $count++;
                                    }
                                    echo '<h3><span class="contar">'.$count.'</span></h3>';
                                ?>
                                <h4>Freelancers</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xs-6 mb-4">
                        <div class="fatos">
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="contador">
                                <h3>+<span class="contar">7</span></h3>
                                <h4>Vendas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 mb-4">
                        <div class="fatos">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="contador">
                            <?php
                                    $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
                                    $dados = $db->query("SELECT * FROM utilizador WHERE tipo_utilizador != 1");
                                    $count = 0;
                                    
                                    foreach($dados as $row) {
                                        $count++;
                                    }
                                    echo '<h3>+<span class="contar">'.$count.'</span></h3>';
                            ?>
                                <h4>Clientes</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 mb-4">
                        <div class="fatos">
                            <div class="icon">
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="contador">
                                <h3><span class="contar">4.8</span></h3>
                                <h4>Avaliação</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Produtos -->
    <div class="container-fluid">
        <div class="my-2 py-4">
            <section class="container">
                <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">Sugestões</h2>
                    <span class="underline"></span>
                </header>
                <div class="row py-4">

              <?php
              
              require("db_projetofinal.php");
            
              $dados = $db->query("SELECT utilizador.id_utilizador, utilizador.nome AS 'utilizador nome', subarea.id_subarea, subarea.nome AS 'nome subarea', area.nome AS 'nome area', preco_servico.base, preco_servico.padrao, preco_servico.premium, preco_servico.id_servico FROM utilizador JOIN servico ON utilizador.id_utilizador = servico.id_utilizador JOIN subarea ON servico.id_subarea = subarea.id_subarea JOIN area ON subarea.id_area = area.id_area JOIN preco_servico ON servico.id_servico = preco_servico.id_servico ORDER BY rand() LIMIT 4");

                foreach ($dados as $row) {

                echo '
                    <div class="col-sm-6 col-md-3 col-xs-12 mb-2">
                        <div class="tabela-preco sombra">
                            <div class="preco-detalhe">
                                <h2>'.$row["nome area"].'</h2>
                                <h3 class="text-success">'.$row["nome subarea"].'</h3><hr>
                                

                               <div id="'.$row["id_servico"].'" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">

                                                <div class="carousel-item active">

                                                <p class="text-danger">Base</p>
                                                <span style="margin: 0">'.$row["base"].'€</span>
                                                </div>

                                                <div class="carousel-item">
                                                <p class="text-danger">Padrão</p>
                                                <span style="margin: 0">'.$row["padrao"].'€</span>
                                                </div>

                                                <div class="carousel-item">
                                                <p class="text-danger">Premium</p>
                                                <span style="margin: 0">'.$row["premium"].'€</span>
                                                </div>

                                            </div>
                                            <a class="carousel-control-prev grad rounded-right pt-3" href="#'.$row["id_servico"].'" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next grad rounded-left pt-3" href="#'.$row["id_servico"].'" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                </div>

                                <hr>
                               
                                <div class="preco-btn mb-2">
                                <a href="index.php?op=servicepage&id_utilizador='.$row["id_utilizador"].'&id_service='.$row["id_servico"].'" class="btn btn-preco">+ Informação</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>';

                }
                  
                
                ?>
                
            </section>
        </div>
    </div>