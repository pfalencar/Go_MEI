<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<div>
			<ul>
				<li><a href="ViewMei.php">Cadastrar MEI</a></li>
				<li><a href="ViewFuncionario.php">Cadastrar Funcionário</a></li>
				<li><a href="ViewCliente.php">Cadastrar Cliente</a></li>
				<li><a href="ViewFornecedor.php">Cadastrar Fornecedor</a></li>
				<li><a href="ViewProduto.php">Cadastrar Produto</a></li>
				<li><a href="ViewServico.php">Cadastrar Serviço</a></li>
				<li><a href="ViewVenda.php">Realizar Venda</a></li>
				<li><a href="ViewCompra.php">Efetuar Compra</a></li>
				<li><a href="ViewContratacao.php">Contratar Funcionário</a></li>
			</ul>
		</div>

	</body>

</html>	

