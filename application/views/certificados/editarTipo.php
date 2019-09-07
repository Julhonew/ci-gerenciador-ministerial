<?php
	$tipo_cert = $tipo;
	unset($tipo_cert[0]);
	sort($tipo_cert);

	// var_dump($tipo_cert[0]->negrito);
	// exit;

	defined('BASEPATH') OR exit('No direct script access allowed'); 
	$this->load->view('top.php'); 
?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Editar Tipo de Certificado</h1>
		<form action="cadastrarTipo" method="POST" enctype="multipart/form-data">	

			<div class="form-row">

			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Nome:</label>
				    <input value="<?php echo $tipo[0]->tipo ?>" type="text" class="form-control" name="nome" placeholder="Nome do Tipo">
			    </div>

			</div>

			<div class="form-row">

				<div class="form-group col-md-8">
			    	<label for="formGroupExampleInput">Imagem do certificado:</label>
			    	<input type="file" class="form-control" id="imagem" name="imagem" class="ml-2">
		    	</div>

		    </div>

		    <div class="form-row">
			    <div class="form-group col-md-12">
			    	<div class="aviso">
			    		<table cellpadding="5">
			    			<tr>
			    				<td class="td-center"><label>Rotulo</label></td>
			    				<td class="td-center"><label>Fonte</label></td>
			    				<td class="td-center"><label>Tamanho</label></td>
			    				<td class="td-center"><label>Cor</label></td>
			    				<td class="td-center" style="width: 70px"><label>Negrito</label></td>
			    				<td class="td-center" style="width: 70px"><label>Italic</label></td>
			    				<td class="td-center" style="width: 70px"><label>Sublinhado</label></td>
			    			</tr>
				    		<?php foreach($titulos as $key => $titulo){?>
				    			<tr>
							    	<td><label><?php echo $titulo->nome?></label></td>
				    				<td>
				    					<select class="form-control" name="fonte[]">
				    					<?php
											for ($i=0; $i < 9 ; $i++) {
												echo $fontes[$key][$i];
											}
										?>
				    					</select>	
				    				</td>
								    <td class="td-center">
										<select class="form-control" name="tamanho[]">
								    		<?php 
								    			for($i = 1 ; $i < 73; $i++){
								    				if($i % 2 == 0){?>
								    					<option value="<?php echo $i ?>"
								    						<?php
								    							if($i == $tipo_cert[$key]->tamanho){
								    								echo "selected";
								    							}
								    						?>
								    					><?php echo $i ?></option>
								    		  <?php }
								    			$j++; }
								    		?> 
								    	</select>
							    	</td>

							    	<td>
							    		<select class="form-control" name="cor[]">
							    			<?php
												for ($i=0; $i < 6; $i++) {
													echo $cores[$key][$i];
												}
											?>
							    		</select>
							    	</td>
							    	<td class="td-center"><input type="checkbox" <?php echo $tipo_cert[$key]->negrito ? 'checked' : '' ?> name="negrito[]" value="<?php echo $titulo->id?>"></td>
							    	<td class="td-center"><input type="checkbox" <?php echo $tipo_cert[$key]->italic ? 'checked' : '' ?> name="italic[]" value="<?php echo $titulo->id?>"></td>
							    	<td class="td-center"><input type="checkbox" <?php echo $tipo_cert[$key]->sublinhado ? 'checked' : '' ?> name="sublinhado[]" value="<?php echo $titulo->id?>"></td>
						    	</tr>
					    	<?php } ?>
				    	</table>
			    	</div>
		    	</div>
	    	</div>

		    <div class="form-row">
				<div class="form-group col-md-12">
				    <label for="formGroupExampleInput">Texto:</label><br>
			        <textarea name="editor" id="editor"><?php echo $tipo[0]->texto ?></textarea>
			    </div>
		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets\script\ckeditor\ckeditor.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets\script\javascript.js')?>"></script>
<?php $this->load->view('bot.php'); ?>