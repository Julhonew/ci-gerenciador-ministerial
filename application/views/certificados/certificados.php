<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('top.php'); 
?>

<div class="row col-md-12 ml-2">
		<div class="col-md-2 "></div>
		<div class="col-md-10 ">

			<div class="titulo">
				<ul>
					<li><h1>Certificados</h1></li>
					<li class="float-right mt-2"><a href="Certificados/cadastrarTipo"><input type="button" class="btn btn-info " value="Cadastrar tipo"></a></li>
				</ul>
			</div>
				
			<table class="table"  border="1">
					<tr>
						<td class="td-center bold"><p>Tipo</p></td>
						<td class="td-center bold"><p>Ações</p></td>
					</tr>	
					<?php
					foreach($certificados as $certificado) {
					?>
						<tr>
							<form action="Membros/credencial" method="POST">
							<td class="td-center"><p><?php echo $certificado->tipo; ?></p></td>
							<td class="td-center">
								<a href="Certificados/tipoCertificados/<?php echo $certificado->id; ?>"><input class="btn btn-info" type="button" value="Ver todos"></a>
								<a href="Certificados/editarTipoCertificado/<?php echo $certificado->id; ?>"><input class="btn btn-info" type="button" value="Editar"></a>
								<a href="Certificados/deleteTipoCertificados/<?php echo $certificado->id; ?>"><input class="btn btn-danger" type="button" value="X"></a>
							</td>
						</tr>	
				    <?php } ?> 
			</table>	
			</form>
		</div>
			
	</div>


<?php $this->load->view('bot')?>