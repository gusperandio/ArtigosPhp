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
				<h3 style="color: #FFF;">Cadastro Artigo</h3>

				<?php if ($Sessao::retornaMensagem()) { ?>
					<div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
				<?php } ?>

				<div class="row font">
					<div class="col-md-12">
						<form action="http://<?php echo APP_HOST; ?>/usuario/salvarArtigo" method="post" id="form_cadastroArtigo">

							<div class="form-group">
								<label for="pwd" class="font">Nome Artigo:</label>
								<input type="text" class="form-control" id="nome_artigo" name="nome_artigo">
							</div>

							<div class="form-group">
								<label for="pwd" class="font">Resumo:</label>
								<input type="text" class="form-control" id="resumo" name="resumo" value="<?php echo $Sessao::retornaValorFormulario('resumo'); ?>">
							</div>

							<?php print_r($viewVar['listaDevs']); ?>
							<div class="form-group">
								<label for="pwd" class="font">Devs do artigo:</label>
								<input type="text" class="form-control" id="devs" name="devs" value="<?php echo $Sessao::retornaValorFormulario('devs'); ?>">
							</div>

							<div class="form-group">
								<label for="pwd">Artigo:</label>
								<textarea class="form-control" id="artigo_completo" name="artigo_completo" value="<?php echo $Sessao::retornaValorFormulario('artigo_completo'); ?>"></textarea>
							</div>


							<button type="submit" class="btn btn-success">Cadastrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<link href="http://<?php echo APP_HOST; ?>/public/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://<?php echo APP_HOST; ?>/public/css/main.css" rel="stylesheet">

</body>