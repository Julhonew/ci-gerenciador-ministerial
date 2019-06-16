<?php 
	// echo "<pre>";
	// var_dump($dados[0]->cargo);
	// var_dump($cargos[2]->id);
	// exit;
$this->load->view('top.php') ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Editar dados</h1>
		<form action="editar" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $dados[0]->id ?>">	
				<div class="col-md-4 offset-md-4 test">
					<label for="formGroupExampleInput">Foto:</label></br>
					<input type="hidden" name="foto" value="<?php echo $dados[0]->foto ?>">
					<img src= "<?php echo base_url('assets/imagens/fotos/'.$dados[0]->foto) ?> " id="visualizacao"></br></br>
				</div>

				<div class="form-group test">
					<input type="file" class="ml-2" name="img" id="img" onchange="previewImg()"></br></br>
				</div>


			<div class="form-row">

			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Nome Completo:</label>
				    <input type="text" class="form-control" name="nome" value="<?php echo $dados[0]->nome ?>">
			    </div>

			   <div class="form-group col-md-4">
				    <label for="formGroupExampleInput">Cargo:</label>
				   	<select class="form-control" name="cargo" >
					    	<?php foreach ($cargos as $cargo) {?>
				   			<option value="<?php echo $cargo->id;?>"
				   					<?php if($dados[0]->cargo == $cargo->id){echo "selected";}?>
				   				><?php echo $cargo->cargo;?></option>
					    <?php } ?>
					</select>
			    </div>

			</div>

			<div class="form-row">

				<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Data de nascimento:</label>
			    	<input type="date" class="form-control" name="data" value="<?php echo $dados[0]->data_nasc ?>">
		    	</div>

		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">RG:</label>
			    	<input type="text" maxlength="9"class="form-control" id="rg" name="rg" value="<?php echo $dados[0]->rg ?>">
		    	</div>

		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">CPF:</label>
			    	<input type="text" maxlength="11" class="form-control" name="cpf" value="<?php echo $dados[0]->cpf ?>">
		    	</div>

		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Salvar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php') ?>