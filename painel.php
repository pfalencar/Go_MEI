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
				<li><a href="CadMEI.php">Cadastrar MEI</a></li>
				<li><a href="ViewFuncionario.php">Cadastrar Funcionário</a></li>
				<li><a href="PesquisaCliente.php">Cliente</a></li>
				<li><a href="PesquisaFornecedor.php">Fornecedor</a></li>
				<li><a href="PesquisaEstoque.php">Estoque</a></li>
				<li><a href="PesquisaServico.php">Serviço</a></li>
				<li><a href="ViewVenda.php">Realizar Venda</a></li>
				<li><a href="PesquisaCompra.php">Compra</a></li>
				<li><a href="ViewContratacao.php">Contratar Funcionário</a></li>
			</ul>
		</div>


	</body>

</html>	

<!-- <img src="car.jpg" alt="some text" width=600 height=400>
 -->