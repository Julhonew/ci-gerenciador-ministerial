<?php $this->load->view('top.php'); ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Editar Contribuição</h1>
		<form action="adicionar" method="POST" enctype="multipart/form-data">	

			<div class="form-row">
			    <div class="form-group col-md-8">
			    	<input type="hidden" name="id" value="<?php echo $contribuicao[0]->id ?>">
				    <label for="formGroupExampleInput">Nome: </label>
				    <input type="text" class="form-control" name="nome" value= "<?php echo $contribuicao[0]->nome ?>" required>
			    </div>
			</div>

			<div class="form-row">
			   <div class="form-group col-md-4">
				    <label for="formGroupExampleInput">Tipo:</label>
				   	<select class="form-control" name="tipo" selected>
				 		<option <?php echo $contribuicao[0]->tipo == 1 ? 'selected' : '' ?> value="1">Entrada</option>
				 		<option <?php echo $contribuicao[0]->tipo == 2 ? 'selected' : ''  ?> value="2">Saída</option>
					</select>
			    </div>
			</div>

			<div class="form-row">

				<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Data da contribuição:</label>
			    	<input type="date" class="form-control" name="data" value="<?php echo date('Y-m-d',$contribuicao[0]->data) ?>" required>
		    	</div>
		    </div>

		    <div class="form-row">
		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Valor</label>
			    	<input type="text" class="form-control" name="valor" value= "<?php echo $contribuicao[0]->valor ?>" required>
		    	</div>
		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php'); ?>