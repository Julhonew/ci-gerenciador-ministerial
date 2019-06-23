<?php $this->load->view('top.php'); ?>

<div class="row">
	<div class="col-md-6 offset-md-4">
		<h1 class="titulo">Cadastro Tipo de Certificado</h1>
		<form action="cadastrarTipo" method="POST" enctype="multipart/form-data">	

			<div class="form-row">

			    <div class="form-group col-md-8">
				    <label for="formGroupExampleInput">Nome:</label>
				    <input type="text" class="form-control" name="nome" placeholder="Nome do Tipo" required>
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
			    				<td class="td-center"><label>Negrito</label></td>
			    				<td class="td-center" style="width: 95px"><label>Italic</label></td>
			    				<td class="td-center"><label>Sublinhado</label></td>
			    			</tr>
				    		<?php foreach($titulos as $titulo){?>
				    			<tr>
							    	<td><label><b><?php echo $titulo->nome ?></b><?php echo $titulo->descricao ?></label></td>
				    				<td>
				    					<select class="form-control" name="fonte[]">
				    						<option value="arial" style="font-family: arial">arial</option>
				    						<option value="comic sans ms" style="font-family:'comic sans ms'">Comic Sans MS</option>
				    						<option value="courier new" style="font-family:'courier new'">Courier New</option>
				    						<option value="georgia" style="font-family:'georgia'">Georgia</option>
				    						<option value="lucida sans unicode" style="font-family:'lucida sans unicode'">Lucida Sans Unicode</option>
				    						<option value="tahoma" style="font-family:'tahoma'">Tahoma</option>
				    						<option value="times new roman" style="font-family:'times new roman'">Times New Roman</option>
				    						<option value="trebuchet ms" style="font-family:'trebuchet ms'">Trebuchet MS</option>
				    						<option value="verdana" style="font-family:'verdana'">Verdana</option>
				    					</select>	
				    				</td>
								    <td class="td-center">
										<select class="form-control" name="tamanho[]">
								    		<?php 
								    			for($i = 1 ; $i < 73; $i++){
								    				if($i % 2 == 0){?>
								    					<option value="<?php echo $i ?>"><?php echo $i ?></option>
								    		  <?php }
								    			}
								    		?> 
								    	</select>
							    	</td>

							    	<td>
							    		<select class="form-control" name="cor[]">
							    			<option value="preto" style="color: black;">Preto</option>
							    			<option value="branco" style="color: white;">branco</option>
							    			<option value="azul" style="color: blue;">Azul</option>
							    			<option value="amarelo" style="color: yellow;">Amarelo</option>
							    			<option value="vermelho" style="color: red;">Vermelho</option>
							    			<option value="verde" style="color: green;">Verde</option>
							    		</select>
							    	</td>
							    	<td class="td-center"><input type="checkbox" name="negrito[]" value="<?php echo $titulo->id?>"></td>
							    	<td class="td-center"><input type="checkbox" name="italic[]" value="<?php echo $titulo->id?>">></td>
							    	<td class="td-center"><input type="checkbox" name="sublinhado[]" value="<?php echo $titulo->id?>">></td>
						    	</tr>
					    	<?php } ?>
				    	</table>
			    	</div>
		    	</div>
	    	</div>

		    <div class="form-row">
				<div class="form-group col-md-12">
				    <label for="formGroupExampleInput">Texto:</label><br>
			        <textarea name="editor" id="editor"></textarea>
			    </div>
		    </div>

		    <input class="btn btn-info form-control" type="submit" value="Cadastrar">

		</form>

	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets\script\ckeditor\ckeditor.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets\script\javascript.js')?>"></script>
<?php $this->load->view('bot.php'); ?>