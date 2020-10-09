<body style="background: #18191a;">
    <div class="container">

        <style>
            .font {
                color: #000;
            }
        </style>


        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h3 style="color: #FFF;">Excluir Artigo</h3>

                <?php if ($Sessao::retornaErro()) { ?>
                    <div class="alert alert-warning" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php foreach ($Sessao::retornaErro() as $key => $mensagem) { ?>
                            <?php echo $mensagem; ?> <br>
                        <?php } ?>
                    </div>
                <?php } ?>

                <div class="row font" >
                    <div class="col-md-12">
                        <form action="http://<?php echo APP_HOST; ?>/usuario/excluir" method="post" id="form_excluir" >
                            <input type="hidden" class="form-control" name="id_artigo" id="id_artigo" value="<?php echo $viewVar['listaArtigos']->getId(); ?>">

                            <div class="panel panel-danger" class="font"> 
                                <div class="panel-body">
                                    <h4>Deseja realmente excluir o artigo: <?php echo $viewVar['listaArtigos']->getNomeArtigo(); ?> </h4>
                                </div>
                                <div class="panel-footer">
                                    <button type="submit" class="btn btn-danger">Excluir</button>
                                    <a href="http://<?php echo APP_HOST; ?>/usuario/allartigos" class="btn btn-info">Voltar</a>
                                </div>
                            </div>
                        </form>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <link href="http://<?php echo APP_HOST; ?>/public/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://<?php echo APP_HOST; ?>/public/css/main.css" rel="stylesheet">

</body>