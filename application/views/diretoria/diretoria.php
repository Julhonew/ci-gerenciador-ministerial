<?php $this->load->view('top');
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row col-md-12 ml-2">
		<div class="col-md-2 "></div>
		<div class="col-md-10 ">

			<div class="titulo">
				<ul>
					<li><h1>Diretoria</h1></li>
					<li class="float-right mt-2"><a href="Diretoria/adicionar"><input type="button" class="btn btn-info " value="+ Diretoria"></a></li>
				</ul>
			</div>
				
				

			<table class="table"  border="1">
					<tr>
						<td class="td-center"><p>Nome</p></td>
						<td class="td-center"><p>Cargo</p></td>
						<td class="td-center"><p>Acões</p></td>
					</tr>	
					<?php
					foreach($dados as $dado) {
					?>
						<tr>
							<form action="Membros/credencial" method="POST">
							<td class="td-center"><p><?php echo $dado->nome; ?> </p></td>
							<td class="td-center"><p><?php echo $dado->cargo; ?> </p></td>
							<td class="td-center">
								<a href="Diretoria/editar/<?php echo $dado->id ?>"><input class="btn btn-info" type="button" value="Editar"></a>
								<a href="Diretoria/excluir/<?php echo $dado->id ?>"><input class="btn btn-danger"  type="button" value="X"></a>
							</td>
						</tr>	
				    <?php } ?> 
			</table>	
			</form>
		</div>
			
	</div>


<?php $this->load->view('bot')?>