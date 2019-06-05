
<?php
	
	foreach ($dados as $dado) {
		var_dump($dado);
	}

	exit;

?>

<?php $this->load->view('top.php') ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Editar dados</h1>
		<form action="crud/update.php" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?=$dados['id']?>">	
				<div class="col-md-4 offset-md-4 test">
					<label for="formGroupExampleInput">Foto:</label></br>
					<input type="hidden" name="foto" value="<?php echo $dados->foto ?>">
					<img src= "<?php echo base_url('imagens/fotos/$dados->foto') ?> " id="visualizacao"></br></br>
				</div>

				<div class="form-group test">
					<input type="file" class="ml-2" name="img" id="img" onchange="previewImg()"></br></br>
				</div>


			<div class="form-row">

			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Nome Completo:</label>
				    <input type="text" class="form-control" name="nome" value="<?php echo $dados->nome ?>">
			    </div>

			   <div class="form-group col-md-4">
				    <label for="formGroupExampleInput">Cargo:</label>
				   	<select class="form-control" name="cargo" value="<?php echo $dados->cargo ?>">
					    	<option>Membro</option>
					    	<option>Cooperador</option>
					    	<option>Cooperadora</option>
					    	<option>Diacono</option>
					    	<option>Diaconiza</option>
					    	<option>Missionaria</option>
					    	<option>Missionario</option>
					    	<option>Presbitero</option>
					    	<option>Pastor</option>
					    	<option>Pastora</option>
					</select>
			    </div>

			</div>

			<div class="form-row">

				<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Data de nascimento:</label>
			    	<input type="date" class="form-control" name="data" value="<?php echo $dados->data_nasc ?>">
		    	</div>

		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">RG:</label>
			    	<input type="text" maxlength="9"class="form-control" id="rg" name="rg" value="<?php echo $dados->rg ?>">
		    	</div>

		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">CPF:</label>
			    	<input type="text" maxlength="11" class="form-control" name="cpf" value="<?php echo $dados->cpf ?>">
		    	</div>

		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Salvar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php') ?>