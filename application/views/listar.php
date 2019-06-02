<?php 
$this->load->view('top.php');

// require_once('crud/select.php');
// require_once('crud/delete.php');

// $dados = new select();
// $dados = $dados->table(false,'membros');

// if(!empty($_GET) && isset($_GET)){
// 	$delete = new delete($_GET['id'],'membros',$_GET['foto']);
// }

?>
	
	<div class="row col-md-12 ml-2">
		<div class="col-md-2 "></div>
		<div class="col-md-10 ">

			<div class="titulo">
				<ul>
					<li><h1>Membros</h1></li>
					<li class="float-right mt-2"><a href="cadastrar_membros.php"><input type="button" class="btn btn-info " value="+ Adicionar"></a></li>
				</ul>
			</div>
				
				

			<table class="table"  border="1">
					<tr>
						<td class="td-center"><p>Selecionar</p></td>
						<td class="td-center"><p>Nome da coluna</p></td>
						<td class="td-center"><p>Nome da coluna</p></td>
						<td class="td-center"><p>Nome da coluna</p></td>
						<td class="td-center"><p>Nome da coluna</p></td>
					</tr>	
					<?php
					// foreach($dados as $dado) {
					?>
						<tr>
							<form action="credencial.php" method="POST">
							<td class="td-center"><input type="checkbox" name="id" value=""></td>
							<td class="td-center"><p><?php echo "valor"?> </p></td>
							<td class="td-center"><p><?php echo "valor"?> </p></td>
							<td class="td-center"><p><?php echo "valor"?> </p></td>
							<td class="td-center"><p><?php echo "valor"?> </p></td>
							<td class="td-center">
								<a href="credencial.php"><input class="btn btn-info" type="button" value="Credencial"></a>
								<a href="editar_membro.php"><input class="btn btn-info" type="button" value="Editar"></a>
								<a href="membros.php"><input class="btn btn-danger"  type="button" value="X"></a>
							</td>
						</tr>	

					<?php //} ?>
			</table>	
			<input type="submit" class="form-control btn btn-info" name="imprimir.php" value="imprimir">
			</form>
		</div>
			
	</div>


<?php $this->load->view('bot.php')?>