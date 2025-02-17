<?php 
$this->load->view('top');
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row col-md-12 ml-2">
		<div class="col-md-2 "></div>
		<div class="col-md-10 ">

			<div class="titulo">
				<ul>
					<li><h1>Escalas</h1></li>
					<li class="float-right mt-2"><a href="escala/adicionar"><input type="button" class="btn btn-info " value="+ Envento"></a></li>
				</ul>
			</div>

			<table class="table"  border="1">
					<tr>
						<td class="td-center"><p>Status</p></td>
						<td class="td-center"><p>Nome</p></td>
						<td class="td-center"><p>Confirmado</p></td>
						<td class="td-center"><p>Data</p></td>
						<td class="td-center"><p>Horario</p></td>
						<td class="td-center"><p>Acões</p></td>
					</tr>	
					<?php
					foreach($escalas as $escala) {
					?>
						<tr>
							<td class="td-center"><p><?php echo $escala->status; ?> </p></td>
							<td class="td-center"><p><?php echo $escala->nome; ?> </p></td>
							<td class="td-center"><p>0</p></td>
							<td class="td-center"><p><?php echo date('d/m/Y',$escala->data);?> </p></td>
							<td class="td-center"><p><?php echo date('H:i',$escala->data);?> </p></td>
							<td class="td-center">
								<a href="escala/editar/<?php echo $escala->id ?>"><input class="btn btn-info" type="button" value="Editar"></a>
								<a href="escala/excluir/<?php echo $escala->id ?>"><input class="btn btn-danger"  type="button" value="X"></a>
							</td>
						</tr>	
				    <?php } ?> 
			</table>
			</form>
		</div>
			
	</div>


<?php $this->load->view('bot')?>