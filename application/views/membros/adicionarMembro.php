<?php $this->load->view('top.php'); ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Cadastro de membros</h1>
		<form action="adicionar" method="POST" enctype="multipart/form-data">	
				<div class="col-md-4 offset-md-4 test">
					<label for="formGroupExampleInput">Foto:</label></br>
					<img id="visualizacao" src="<?php echo base_url('assets/imagens/fotos/default.jpg') ?>" ></br></br>
				</div>

				<div class="form-group test">
					<input type="file" class="ml-2" name="img" id="img" onchange="previewImg()"></br></br>
				</div>


			<div class="form-row">

			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Nome Completo:</label>
				    <input type="text" class="form-control" name="nome" placeholder="Nome Completo" required>
			    </div>

			   <div class="form-group col-md-4">
				    <label for="formGroupExampleInput">Cargo:</label>
				   	<select class="form-control" name="cargo">
				   		<?php foreach ($cargos as $cargo) {?>
				   			<option value="<?php echo $cargo->id;?>"><?php echo $cargo->cargo;?></option>
					    <?php } ?>
					</select>
			    </div>

			</div>

			<div class="form-row">

				<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Data de nascimento:</label>
			    	<input type="date" class="form-control" name="data" class="data" maxlength="8">
		    	</div>

		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">RG:</label>
			    	<input type="text" class="form-control" id="rg" name="rg" class="rg" maxlength="9" required>
		    	</div>

		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">CPF:</label>
			    	<input type="text" class="form-control" name="cpf" class="cpf" maxlength="11" required>
		    	</div>

		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php'); ?>