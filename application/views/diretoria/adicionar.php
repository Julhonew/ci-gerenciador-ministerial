<?php $this->load->view('top.php'); ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Cadastro de Diretoria</h1>
		<form action="adicionar" method="POST" enctype="multipart/form-data">	

			<div class="form-row">
			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Membro:</label>
				    <select class="form-control" name="membro_id" required>
				    	<option value="" disabled selected>Selecione um Membro</option>
				   		<?php foreach ($membros as $membro) {?>
				   			<option value="<?php echo $membro->id;?>"><?php echo $membro->nome;?></option>
					    <?php } ?>
					</select>
			    </div>
			</div>


			<div class="form-row">
			 	<div class="form-group col-md-4">
				    <label for="formGroupExampleInput">Cargo:</label>
				   	<select class="form-control" name="cargo_id" required>
				   		<option value="" disabled selected>Selecione um Cargo</option>
				   		<?php foreach ($cargos as $cargo) {?>
				   			<option value="<?php echo $cargo->id;?>"><?php echo $cargo->cargo;?></option>
					    <?php } ?>
					</select>
			    </div>
			</div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php'); ?>