<?php $this->load->view('top.php'); ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Evento</h1>
		<form action="adicionar" method="POST" enctype="multipart/form-data">	

			<div class="form-row">
			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Nome:</label>
				    <input type="text" class="form-control" name="nome" placeholder="Nome do Evento" required>
			    </div>
			</div>

			<div class="form-row">

				<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Data:</label>
			    	<input type="date" class="form-control" name="data" class="data" required>
		    	</div>

		    	<div class="form-group col-md-4">
			    	<label for="formGroupExampleInput">Horario:</label>
			    	<input type="time" class="form-control" name="horario" class="data" required>
		    	</div>

		    </div>

		    <div class="form-row">
		    	<div class="form-group col-md-12">
			    	<label for="formGroupExampleInput">Descrição</label>
			    	<textarea rows="4" type="text" class="form-control" name="desc" style="resize: none"></textarea>
		    	</div>
		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>

<?php $this->load->view('bot.php'); ?>