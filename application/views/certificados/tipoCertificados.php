<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('top.php'); 
?>
<div class="row col-md-12 ml-2">
		<div class="col-md-2 "></div>
		<div class="col-md-10 ">

			<div class="titulo">
				<ul>
					<li><h1><?php echo ucwords($nome[0]->tipo); ?></h1></li>
					<li class="float-right mt-2"><a href="<?php echo site_url('Certificados/adicionarCertificado/'. $nome[0]->id) ?>"><input type="button" class="btn btn-info " value="+ Adicionar"></a></li>
				</ul>
			</div>
				
				

			<table class="table"  border="1">
					<tr>
						<td class="td-center"><p>Selecionar</p></td>
						<td class="td-center"><p>Nome</p></td>
						<td class="td-center"><p>Emissão</p></td>
						<td class="td-center"><p>Acões</p></td>
					</tr>	
					<?php
					foreach($certificados as $certificado) {
					?>
						<tr>
							<form action="Membros/credencial" method="POST">
							<td class="td-center"><input type="checkbox" name="id[]" value="<?php echo $certificado->id; ?>"></td>
							<td class="td-center"><p><?php echo $certificado->nome; ?> </p></td>
							<td class="td-center"><p><?php echo implode('/', array_reverse(explode('-', $certificado->dt_apr))); ?> </p></td>
							<td class="td-center">
								<a href="Membros/credencial/<?php echo $certificado->id ?>" onClick="window.open(this.href,'credencial','resizable,height=800,width=800'); return false;"><input class="btn btn-info" type="button" value="Certificado"></a>
								<a href="<?php echo site_url('Certificados/deleteCertificado/'.$nome[0]->id . '/' . $certificado->id)?>"><input class="btn btn-danger"  type="button" value="X"></a>
							</td>
						</tr>	
				    <?php } ?> 
			</table>	
			<input type="submit" class="form-control btn btn-info" name="imprimir" value="imprimir">
			</form>
		</div>
			
	</div>


<?php $this->load->view('bot')?>