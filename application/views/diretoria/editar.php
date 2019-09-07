<?php 
	// echo "<pre>";
	// var_dump($dados);
	// var_dump($cargos);
	// exit;
$this->load->view('top.php'); ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Cadastro de Diretoria</h1>
		<form action="editar" method="POST" enctype="multipart/form-data">	

			<div class="form-row">
			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Membro:</label>
				    <input type="text" class="form-control" name="membro" value = "<?php echo $dados[0]->nome ?>">
			    </div>
			</div>

			<input type="hidden" name="id" value="<?php echo $dados[0]->id ?>">

			<div class="form-row">
			 	<div class="form-group col-md-4">
				    <label for="formGroupExampleInput">Cargo:</label>
				   	<select class="form-control" name="cargo_id" required>
				   		<?php foreach ($cargos as $cargo) {
				   			if($dados[0]->dir_cargo_id == $cargo->id){
				   		?>
				   			<option selected value="<?php echo $cargo->id;?>"><?php echo $cargo->cargo;?></option>
				   		<?php }else{ ?>	
				   			<option value="<?php echo $cargo->id;?>"><?php echo $cargo->cargo;?></option>
					    <?php } } ?>
					</select>
			    </div>
			</div>

		    <input class="btn btn-info form-control" type="submit" value="Salvar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php'); ?>