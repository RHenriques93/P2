<!-- Pesquisa e titulo -->
<div class="container-fluid grad pad-30">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <h1 class="text-uppercase">Título</h1>
                <p class="lead">Aqui poderás encontrar diversos tipos de serviços realizados por trabalhadores freelancers
            nas diversas áreas abrangidas.</p>
            </div>
            <form method="POST" class="col-5">
                <div class="p-1 bg-light rounded rounded-pill shadow-sm mb-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <button id="button-addon2" formaction="index.php?op=procura" type="submit" class="btn btn-link"><i class="fas fa-search color-yw"></i></button>
                        </div>
                    <input type="search" name="search" placeholder='O que procuras? "logo" "web site" "captura de video"' aria-describedby="button-addon2" class="form-control border-0 bg-light">
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

                echo '<div class="col-md-3 mt-2">
                        <a href="index.php?op=area&id='.$linha["id_area"].'">
                            <img src="img/img1.png" class="img-fluid">
                            <p class="text-center text-dark mt-2">'.$linha["nome"].'</p>
                        </a>
                    </div>';
                }
                ?>
                
                    <div class="col-md-12 justify-content-center text-center">
                        <button class="btn btn-grad grad text-center mt-2"><a href="index.php?op=servicos" class="text-light">Ver Todos<i class="far fa-plus-square ml-2"></i></a></button>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <hr class="mx-5">

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
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="fatos">
                            <div class="icon">
                                <i class="fas fa-briefcase"></i>
                            </div>
                            <div class="contador">                            
                                <?php
                                    $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
                                    $dados = $db->query("SELECT * FROM utilizador WHERE tipo_utilizador LIKE 1");
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
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="fatos">
                            <div class="icon">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="contador">
                                <h3>+ <span class="contar">7</span></h3>
                                <h4>Vendas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
                        <div class="fatos">
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="contador">
                            <?php
                                    $db = new PDO("mysql:host=localhost; dbname=projetofinal","root","");
                                    $dados = $db->query("SELECT * FROM utilizador WHERE tipo_utilizador LIKE 2");
                                    $count = 0;
                                    
                                    foreach($dados as $row) {
                                        $count++;
                                    }
                                    echo '<h3>+  <span class="contar">'.$count.'</span></h3>';
                            ?>
                                <h4>Clientes</h4>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3">
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
                    <div class="col-sm-6 col-md-3 col-xs-12">
                        <div class="tabela-preco sombra">
                            <div class="preco-detalhe">
                                <h2>Logotipos</h2>
                                <span style="margin: 0">100€</span>
                                <span style="font-size: 15px">Desde</span>
                                <ul>
                                    <li>Desenvolvido ao seu gosto</li>
                                    <li>Todo do tipo de marcas</li>
                                </ul>
                                <div class="preco-btn mb-2">
                                    <a href="#" class="btn btn-preco">Comprar Agora</a>
                                </div>
                                <small class="text-primary">*Garantia de satisfação de 30 dias</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12">
                        <div class="tabela-preco sombra">
                            <div class="preco-detalhe">
                                <h2>Foto e Video</h2>
                                <span style="margin: 0">50€</span>
                                <span style="font-size: 15px">Desde</span>
                                <ul>
                                    <li>Capatação de imagens</li>
                                    <li>Eventos ou Seções Particulares</li>
                                </ul>
                                <div class="preco-btn mb-2">
                                    <a href="#" class="btn btn-preco">Comprar Agora</a>
                                </div>
                                <small class="text-primary">*Garantia de satisfação de 30 dias</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12">
                        <div class="tabela-preco sombra">
                            <div class="preco-detalhe">
                                <h2>Edição de Video</h2>
                                <span style="margin: 0">50€</span>
                                <span style="font-size: 15px">Desde</span>
                                <ul>
                                    <li>Pós-Produção</li>
                                    <li>Bla Bla Bla</li>
                                </ul>
                                <div class="preco-btn mb-2">
                                    <a href="#" class="btn btn-preco">Comprar Agora</a>
                                </div>
                                <small class="text-primary">*Garantia de satisfação de 30 dias</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-xs-12">
                        <div class="tabela-preco sombra">
                            <div class="preco-detalhe">
                                <h2>Web Design</h2>
                                <span style="margin: 0">450€</span>
                                <span style="font-size: 15px">Desde</span>
                                <ul>
                                    <li>Front-End & Back-End Development</li>
                                    <li>Totalmente Responsivos</li>
                                </ul>
                                <div class="preco-btn mb-2">
                                    <a href="#" class="btn btn-preco">Comprar Agora</a>
                                </div>
                                <small class="text-primary">*Garantia de satisfação de 30 dias</small>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>