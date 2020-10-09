<div class="container">


    <div class="starter-template">
        <!DOCTYPE HTML>
        <html lang="pt-br">


        <link href="http://<?php echo APP_HOST; ?>/public/css/style.css" rel="stylesheet">

        <!-- bootstrap - link cdn -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" crossorigin="anonymous">

        <body style="background: #18191a;">


            <nav class="navbar navbar-default navbar-static-top " style="background: #18191a;">



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
                                <p class="card-text artigo_resumo">Resumo: <?php echo $artigo->getResumoArtigo(); ?></p>
                                <br>
                                <p class="card-text artigo_resumo"><?php echo $artigo->getArtigo(); ?></p>

                            </div>
                        </div>
                    </div>

                <?php
                }
                ?>


            <?php
            }

            ?>

            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        </body>

        </html>
    </div>
</div>