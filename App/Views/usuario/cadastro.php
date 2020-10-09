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
				<h3 class="font">Cadastro de Desenvolvedor</h3>

				<?php if ($Sessao::retornaMensagem()) { ?>
					<div class="alert alert-warning" role="alert"><?php echo $Sessao::retornaMensagem(); ?></div>
				<?php } ?>

				<div class="row">
					<div class="col-md-12">
						<form action="http://<?php echo APP_HOST; ?>/usuario/salvar" method="post" id="form_cadastro">

							<div class="form-group">
								<label for="pwd" class="font">Nome</label>
								<input type="text" class="form-control" id="nomeDev" name="nomeDev" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>">
							</div>

							<div class="form-group">
								<label for="pwd" class="font">Nível</label>
								
								<select type="menu" class="form-control" id="nivel" name="nivel" value="<?php echo $Sessao::retornaValorFormulario('nivel'); ?>">
									<option>Junior</option>
									<option>Pleno</option>
									<option>Sênior</option>
								</select>
							</div>

							<div class="form-group">
								<label for="pwd" class="font">Data de Nascimento:</label>
								<input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
							</div>


							<button type="submit" class="btn btn-success ">Cadastrar</button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<link href="http://<?php echo APP_HOST; ?>/public/css/bootstrap.min.css" rel="stylesheet">
		<link href="http://<?php echo APP_HOST; ?>/public/css/main.css" rel="stylesheet">

</body>