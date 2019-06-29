<?php
	
	$tipo_cert = $tipo[0];
	unset($tipo[0]);
	sort($tipo);
	$texto_cert = $tipo;

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
				    <input value="<?php echo $tipo_cert->tipo ?>" type="text" class="form-control" name="nome" placeholder="Nome do Tipo">
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
				    		<?php foreach($titulos as $titulo){?>
				    			<tr>
							    	<td><label><?php echo $titulo->nome ;  echo $titulo->descricao ?></label></td>
				    				<td>
				    					<select class="form-control" name="fonte[]">
				    						<?php foreach($fontes as $fonte){ ?>
				    							<option value="<?php echo $fonte->fonte ?>" style="font-family: <?php echo $fonte->fonte ?>"><?php echo $fonte->fonte ?></option>
				    						<?php } ?>
				    					</select>	
				    				</td>
								    <td class="td-center">
										<select class="form-control" name="tamanho[]">
								    		<?php 
								    			for($i = 1 ; $i < 73; $i++){
								    				if($i % 2 == 0){?>
								    					<option value="<?php echo $i ?>"
								    						<?php
								    							if($i == 12){
								    								echo "selected";
								    							}
								    						?>
								    					><?php echo $i ?></option>
								    		  <?php }
								    			}
								    		?> 
								    	</select>
							    	</td>

							    	<td>
							    		<select class="form-control" name="cor[]">
							    			<option value="black" style="color: black;" selected>Preto</option>
							    			<option value="white" style="color: white;">branco</option>
							    			<option value="blue" style="color: blue;">Azul</option>
							    			<option value="yellow" style="color: yellow;">Amarelo</option>
							    			<option value="red" style="color: red;">Vermelho</option>
							    			<option value="green" style="color: green;">Verde</option>
							    		</select>
							    	</td>
							    	<td class="td-center"><input type="checkbox" name="negrito[]" value="<?php echo $titulo->id?>"></td>
							    	<td class="td-center"><input type="checkbox" name="italic[]" value="<?php echo $titulo->id?>"></td>
							    	<td class="td-center"><input type="checkbox" name="sublinhado[]" value="<?php echo $titulo->id?>"></td>
						    	</tr>
					    	<?php } ?>
				    	</table>
			    	</div>
		    	</div>
	    	</div>

		    <div class="form-row">
				<div class="form-group col-md-12">
				    <label for="formGroupExampleInput">Texto:</label><br>
			        <textarea name="editor" id="editor"><?php echo $tipo_cert->texto ?></textarea>
			    </div>
		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets\script\ckeditor\ckeditor.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets\script\javascript.js')?>"></script>
<?php $this->load->view('bot.php'); ?>