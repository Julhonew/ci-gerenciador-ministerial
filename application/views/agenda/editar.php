<?php $this->load->view('top.php'); ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Editar evento</h1>
		<form action="editar" method="POST" enctype="multipart/form-data">	

			<input type="hidden" name="id" value="<?php echo $evento[0]->id ?>">
			<div class="form-row">
			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Nome:</label>
				    <input type="text" class="form-control" name="nome" placeholder="Nome do Evento" value="<?php echo $evento[0]->nome ?>" required>
			    </div>
			</div>

			<div class="form-row">

				<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Data:</label>
			    	<input type="date" class="form-control" name="data" class="data" value="<?php echo date('Y-m-d',$evento[0]->data) ?>" required>
		    	</div>

		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Horario:</label>
			    	<input type="time" class="form-control" name="horario" class="data" value="<?php echo date('H:i',$evento[0]->data) ?>" required>
		    	</div>

		    </div>

		    <div class="form-row">
		    	<div class="form-group col-md-12">
			    	<label for="formGroupExampleInput">Descrição</label>
			    	<textarea rows="4" type="text" class="form-control" name="desc" style="resize: none"><?php echo $evento[0]->descricao ?></textarea>
		    	</div>
		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php'); ?>