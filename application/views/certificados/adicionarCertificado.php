<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('top.php'); 
?>

<div class="row">
	<div class="col-md-6 offset-md-4" style="padding: 0px;">
		<h1 class="titulo">Emissão de certificado <?php echo ucwords($nome[0]->tipo); ?></h1>
		
		<form class="mt-5 col-md-12" style="padding: 0px;">
		    <div class="form-row">
		    	<label for="formGroupExampleInput" class="mt-2 ml-1">Nome:</label>
		    	<input type="text" class="form-control col-md-5 ml-2" name="busca" placeholder="  Digite o nome do membro">
		    	<input class="btn btn-info ml-2 mb-4" type="submit" value="buscar">
		</form>

		<form >
				<a style="text-align: left;" href="<?php echo site_url('Certificados/adicionarCertificado/') ?>"><input class="btn btn-info float-right" type="button" value="Emitir"></a>
			</div>
			<div class="col-md-12 membros">
				<table class="table"  border="1">
					<tr>
						<td class="td-center"><p>Selecionar</p></td>
						<td class="td-center"><p>Nome</p></td>
						<td class="td-center"><p>Cargo</p></td>
						<td class="td-center"><p>Acões</p></td>
					</tr>	
					<?php
					foreach($membros as $membro) {
					?>
						<tr>
							<td class="td-center"><input type="checkbox" name="id[]" value="<?php echo $membro->id; ?>"></td>
							<td class="td-center"><p><?php echo $membro->nome; ?> </p></td>
							<td class="td-center"><p><?php echo $membro->cargo; ?> </p></td>
							<td class="td-center">
								<a href="<?php echo site_url('Certificados/adicionarCertificado/'.$nome[0]->id.'/'.$membro->id)?>"><input class="btn btn-info" type="button" value="Emitir"></a>
								<a href="<?php echo site_url('Membros/editar/'. $membro->id)?>"><input class="btn btn-info" type="button" value="Editar"></a>
							</td>
						</tr>	
				    <?php } ?> 
			</table>	
			</div>
		</form>

	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets\script\ckeditor\ckeditor.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets\script\javascript.js')?>"></script>
<?php $this->load->view('bot.php'); ?>