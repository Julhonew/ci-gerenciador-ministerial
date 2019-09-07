<?php 
$this->load->view('top');
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row col-md-12 ml-2">
		<div class="col-md-2 "></div>
		<div class="col-md-10 ">

			<div class="titulo">
				<ul>
					<li><h1>Financeiro</h1></li>
					<li class="float-right mt-2"><a href="financeiro/adicionar"><input type="button" class="btn btn-info " value="+ Contribução"></a></li>
				</ul>
			</div>

		<div class="form-row col-md-12">
			<div class="alert alert-danger col-md-3 p-2" style="font-size: 50px; text-align: center" role="alert">Saída: <?php echo number_format($saida[0]->valor, 2, ',', '.') ?></div>
			<div class="alert alert-success col-md-3 p-2" style="font-size: 50px; text-align: center"  role="alert">Entrada: <?php echo number_format($entrada[0]->valor, 2, ',', '.') ?></div>
			<div class="alert alert-warning col-md-3 p-2" style="font-size: 50px; text-align: center"  role="alert">Agendado: <?php echo isset($agendado) ? number_format($agendado, 2, ',', '.') : 0 ?></div>
			<div class="alert alert-primary col-md-3 p-2" style="font-size: 50px; text-align: center"  role="alert">Em Caixa: <?php echo isset($emCaixa) ? number_format($emCaixa, 2, ',', '.') : 0 ?></div>
		</div>
				
			<table class="table"  border="1">
					<tr>
						<td class="td-center"><p>Tipo</p></td>
						<td class="td-center"><p>Status</p></td>
						<td class="td-center"><p>Nome</p></td>
						<td class="td-center"><p>Valor</p></td>
						<td class="td-center"><p>Data</p></td>
						<td class="td-center"><p>Acões</p></td>
					</tr>	
					<?php
					foreach($contribuicoes as $contribuicao) {
					?>
						<tr>
							<td class="td-center"><p><?php echo $contribuicao->tipo; ?> </p></td>
							<td class="td-center"><p><?php echo $contribuicao->status;?> </p></td>
							<td class="td-center"><p><?php echo $contribuicao->nome; ?> </p></td>
							<td class="td-center"><p><?php echo number_format($contribuicao->valor, 2, ',', '.'); ?> </p></td>
							<td class="td-center"><p><?php echo date('d/m/Y',$contribuicao->data);?> </p></td>
							<td class="td-center">
								<a href="financeiro/editar/<?php echo $contribuicao->id ?>"><input class="btn btn-info" type="button" value="Editar"></a>
								<a href="financeiro/excluir/<?php echo $contribuicao->id ?>"><input class="btn btn-danger"  type="button" value="X"></a>
							</td>
						</tr>	
				    <?php } ?> 
			</table>
			</form>
		</div>
			
	</div>


<?php $this->load->view('bot')?>