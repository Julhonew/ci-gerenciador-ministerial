<?php $this->load->view('top.php'); ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Contribuição</h1>
		<form action="adicionar" method="POST" enctype="multipart/form-data">	

			<div class="form-row">
			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Nome:</label>
				    <input type="text" class="form-control" name="nome" placeholder="Nome da Contribuição" required>
			    </div>
			</div>

			<div class="form-row">
			   <div class="form-group col-md-4">
				    <label for="formGroupExampleInput">Tipo:</label>
				   	<select class="form-control" name="tipo">
				 		<option value="1">Entrada</option>
				 		<option value="2">Saída</option>
					</select>
			    </div>
			</div>

			<div class="form-row">

				<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Data da contribuição:</label>
			    	<input type="date" class="form-control" name="data" class="data" required>
		    	</div>

		    </div>

		    <div class="form-row">
		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Valor</label>
			    	<input type="text" class="form-control" name="valor" required>
		    	</div>
		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php'); ?>