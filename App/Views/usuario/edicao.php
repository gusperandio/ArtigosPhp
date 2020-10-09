<body style="background: #18191a;">
    <div class="container">

        <style>
            .font {
                color: #FFF;
            }
        </style>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 style="color: #FFF;">Edição do Artigo</h3>

                <?php if ($Sessao::retornaErro()) { ?>
                    <div class="alert alert-warning" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                            <?php echo $mensagem; ?> <br>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="row font">
                    <div class="col-md-12">
                        <form action="http://<?php echo APP_HOST; ?>/usuario/atualizar" method="post" id="form_edicao">
                            <input type="hidden" class="form-control" name="id_artigo" id="id_artigo" value="<?php echo $viewVar['artigos']->getId(); ?>">

                            <div class="form-group">
                                <label for="pwd" class="font">Novo titulo do artigo artigo:</label>
                                <input type="text" class="form-control" id="nome_artigo" name="nome_artigo" value="<?php echo $viewVar['artigos']->getNomeArtigo(); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="pwd" class="font">Alterar devs do artigo:</label>
                                <input type="text" class="form-control" id="devs" name="devs" value="<?php echo $viewVar['artigos']->getDevsArtigo(); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="pwd" class="font">Alterar resumo do artigo:</label>
                                <input type="text" class="form-control" id="resumo" name="resumo" value="<?php echo $viewVar['artigos']->getResumoArtigo(); ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="pwd">Alterar artigo:</label>
                                <textarea class="form-control" id="artigo_completo" name="artigo_completo" value="<?php echo $viewVar['artigos']->getArtigo(); ?>" required></textarea>
                            </div>


                            <button type="submit" class="btn btn-success">Alterar</button>
                            <a href="http://<?php echo APP_HOST; ?>/usuario/allartigos" class="btn btn-info ">Voltar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <link href="http://<?php echo APP_HOST; ?>/public/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://<?php echo APP_HOST; ?>/public/css/main.css" rel="stylesheet">

</body>