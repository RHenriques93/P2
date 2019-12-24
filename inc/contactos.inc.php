<div class="container py-3">
    <section class="mb-4">
    <header class="col-md-12 mb-4">
                    <h2 class="text-center text-dark">Contacto</h2>
                    <span class="underline-rosa mb-3"></span>
                    <p class="text-center w-responsive mx-auto mb-5 btn-grad grad p-2">Alguma questão? Entre em contacto connosco para qualquer dúvida ou sugestão que tenha
        para nos ajudar a melhorar.</p>
            </header>
    <div class="row">
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                <div class="row mt-2">
                    <div class="col-md-6 mt-2">
                        <div class="md-form mb-0">
                            <label class="grad-txt f-20 font-weight-bold" for="name">Nome</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameHelp">
                        </div>
                    </div>
                    <div class="col-md-6 mt-2">
                        <div class="md-form mb-0">
                            <label class="grad-txt f-20 font-weight-bold" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 mt-2">
                        <div class="md-form mb-0">
                            <label class="grad-txt f-20 font-weight-bold" for="subject">Assunto</label>
                            <input type="text" id="subject" name="subject" class="form-control" aria-describedby="subjectlHelp">
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12 mt-2">
                        <div class="md-form">
                            <label class="grad-txt f-20 font-weight-bold" for="message">Mensagem</label>
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center text-md-left mt-3">
                <button class="btn btn-grad grad"><a href="#" class="text-light">Submeter</a></button>
            </div>
            <div class="status"></div>
        </div>
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p class="text-dark mt-2">Rua Teste, 3045-000, Coimbra</p>
                </li>
                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p class="text-dark mt-2">teste@gmail.com</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p class="text-dark mt-2">+ 351 910 000 000</p>
                </li>
            </ul>
        </div>
    </div>
    </section>
</div>
