<?php $this->load->view('top')?>

<div class="row col-md-12 ml-2">
		<div class="col-md-2 "></div>
		<div class="col-md-10 ">

			<div class="titulo">
				<ul>
					<li><h1>Membros</h1></li>
					<li class="float-right mt-2"><a href="Membros/adicionar"><input type="button" class="btn btn-info " value="+ Adicionar"></a></li>
				</ul>
			</div>
				
				

			<table class="table"  border="1">
					<tr>
						<td class="td-center"><p>Selecionar</p></td>
						<td class="td-center"><p>Nome</p></td>
						<td class="td-center"><p>Cargo</p></td>
						<td class="td-center"><p>RG</p></td>
						<td class="td-center"><p>CPF</p></td>
						<td class="td-center"><p>Nascimento</p></td>
						<td class="td-center"><p>Acões</p></td>
					</tr>	
					<?php
					foreach($membros->result() as $dado) {
					?>
						<tr>
							<form action="Membros/credencialMultiplas" method="POST">
							<td class="td-center"><input type="checkbox" name="id" value=""></td>
							<td class="td-center"><p><?php echo $dado->nome; ?> </p></td>
							<td class="td-center"><p><?php echo $dado->cargo; ?> </p></td>
							<td class="td-center"><p><?php echo $dado->rg; ?> </p></td>
							<td class="td-center"><p><?php echo $dado->cpf; ?> </p></td>
							<td class="td-center"><p><?php echo implode('/', array_reverse(explode('-', $dado->data_nasc))); ?> </p></td>
							<td class="td-center">
								<a href="Membros/pdf/<?php echo $dado->id ?>?>"><input class="btn btn-info" type="button" value="Credencial"></a>
								<a href="Membros/editar/<?php echo $dado->id ?>"><input class="btn btn-info" type="button" value="Editar"></a>
								<a href="Membros/excluir/<?php echo $dado->id ?>"><input class="btn btn-danger"  type="button" value="X"></a>
							</td>
						</tr>	

				    <?php } ?> 
			</table>	
			<input type="submit" class="form-control btn btn-info" name="imprimir" value="imprimir">
			</form>
		</div>
			
	</div>


<?php $this->load->view('bot')?>