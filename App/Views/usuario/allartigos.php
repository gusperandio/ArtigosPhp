<div class="container">


    <div class="starter-template">
        <!DOCTYPE HTML>
        <html lang="pt-br">


        <link href="http://<?php echo APP_HOST; ?>/public/css/style.css" rel="stylesheet">

        <!-- bootstrap - link cdn -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">

        <body style="background: #18191a;">
            <!-- buscar no banco -->
            <form action="http://<?php echo APP_HOST; ?>/usuario/allartigos/" method="get">
                <div class="input-group col-md-12">
                    <span class="input-group-addon input-sm" id="basic-addon1">
                        <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                    </span>
                    <input type="text" placeholder="Buscar artigo" required value="<?php echo $viewVar['buscaArtigo']; ?>" class="form-control input-sm" name="buscaArtigo" />

                    <div class="input-group-btn">
                        <button class="btn btn-success btn-sm" type="submit">Buscar</button>
                    </div>
                </div>
            </form>

            <nav class="navbar navbar-default navbar-static-top " style="background: #18191a;">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                </div>
            </nav>


            <?php
            if (!empty($viewVar['listaArtigos'] < 0)) {
            ?>
                <div class="alert alert-info" role="alert">Nenhum artigo encontrado</div>
            <?php
            } else {
            ?>

                <?php

                foreach ($viewVar['listaArtigos'] as $artigo) {
                ?>

                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-body artigo_wrapper2">
                                <h4 class="card-subtitle mb-2 text-muted navbar-right"><?php echo $artigo->getDataArtigo()->format('d/m/Y'); ?></h4>
                                <span class="artigo_autor"><?php echo $artigo->getDevsArtigo(); ?></span>
                                <p class="artigo_titulo"><?php echo $artigo->getNomeArtigo(); ?></p>
                                <p class="card-text artigo_resumo"><?php echo $artigo->getResumoArtigo(); ?></p>
                                <br>
                                <p class="card-text artigo_resumo"><?php echo $artigo->getArtigo(); ?></p>
                                <td>

                                    <a href="http://<?php echo APP_HOST; ?>/usuario/edicao/<?php echo $artigo->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar </a>
                                    <a href="http://<?php echo APP_HOST; ?>/usuario/exclusao/<?php echo $artigo->getId(); ?><?php echo $viewVar['queryString']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Excluir </a>
                                </td>
                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>

            <?php
                echo $viewVar['paginacao'];
            }
            ?>




            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        </body>

        </html>
    </div>
</div>