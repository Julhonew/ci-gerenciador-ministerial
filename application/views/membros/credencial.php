<!DOCTYPE html>
<html>
<head>
	<title>IMECO - Missão Evangelica Casa de Oração</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/credencial.css') ?>">

</head>
<body onload="window.print()">
	<?php 
		foreach ($dados as $dado) {	
	?>	
	<div id ="fundo">

		<div id="frente">

			<div id="cabecalho">
				<div id="logo">
					<img id="img" src="<?php echo base_url('assets/imagens/logo.jpg') ?>">
				</div>
				<div id="dados_igreja">
					<p><b>Missão Evangélica Casa de Oração</b></p>
					<p>Endereço: Rua Professor Francisco Emigdio da Fonseca Telles, 518</p>
					<p>Bairro: Vila Santa Catarina - Fone (11) 2771-3880</p>
				</div>
			</div>
			<div id="informacoes">
				<p id="titulo">Credencial de </br> Membro</p>
				<div id="nome"><b>Nome: <?php echo $dado->nome ?></b></div>
				<div id="cargo"><b>Cargo: <?php echo $dado->cargo ?></b></div>
			</div>
			<div id="imagem">
				<img id="foto" src="<?php echo base_url('assets/imagens/fotos/'. $dado->foto) ?>">
			</div>
			<div id="rodape">
				<p>Este documento perderá sua validade, se o portador do mesmo, não </br>
				estiver de acordo com os ensinamentos biblicos e doutrinas.
				</p>
			</div>

		</div>

		<div id="verso">

			<div id="dados">
				<div id="rg">RG: <?php echo $dado->rg ?></div>
				<div id="cpf">CPF: <?php echo $dado->cpf ?></div>
				<div id="emissao">Emissão: <?php echo implode('/', array_reverse(explode('-',substr($dado->emissao, 0, -9)))) ?> </div>
				<div id="nasc"> Nasc: <?php echo implode('/', array_reverse(explode('-', $dado->data_nasc)))?></div>
			</div>

			<div id="anos">
				<div class="validade"></div>
				<div class="validade"></div>
				<div class="validade"></div>
				<div class="validade"></div>
				<ul>
					<li><?=date('Y')?></li>
					<li class="space"><?=date('Y')+1?></li>
					<li class="space"><?=date('Y')+2?></li>
					<li class="space"><?=date('Y')+3?></li>
				</ul>
			</div>

			<div id="assinatura">
				<div id="linha"></div>
				<p>Marcos Vinicius Barros</p>
				<p>Pr.Presidente</p>
			</div>

		</div>

	</div>

<div id="divisao"></div>
	<?php } ?>
</body>
</html>

