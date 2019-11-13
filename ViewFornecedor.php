<?php
session_start();
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>G-MEI</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<form action="ControllerFornecedor.php" method="POST"> 

			<div>
				Voltar para a <a href="painel.php">Página Inicial</a></p>
			</div>			  


			<p><input type=text name=nome>
			<input type="submit" value="Pesquisar" name="pesquisar"></p> 
			<h4><a href="CadFornecedor.php"> Novo </a></h4>
			
			<div>
				<h2>Todos os Fornecedores</h2>
				<table>
					<tr>
						<th>Código do Fornecedor</th>
						<th>Razão Social</th>
						<th>Inscrição Estadual</th>
						<th>Inscrição Municipal</th>
						<th>Editar</th>
						<th>Deletar</th>						
					</tr>
					<tr>
						<td>1</td>
						<td>Fornecedor1 Ltda.</td>
						<td>123456789</td>
						<td>123456798SP</td>
						<td>Editar</td>
						<td>Deletar</td>
					</tr>
					<tr>
						<td>2</td>
						<td>Fornecedor2 Ltda.</td>
						<td>2123456789</td>
						<td>2123456798SP</td>
						<td>Editar</td>
						<td>Deletar</td>
					</tr>
					<tr>
						<td>3</td>
						<td>Fornecedor3 Ltda.</td>
						<td>3123456789</td>
						<td>3123456798SP</td>
						<td>Editar</td>
						<td>Deletar</td>
					</tr>
					<tr>
						<td>4</td>
						<td>Fornecedor4 Ltda.</td>
						<td>4123456789</td>
						<td>4123456798SP</td>
						<td>Editar</td>
						<td>Deletar</td>
					</tr>
				</table>
				<br><br>
				<br><br>
		    
				<br><br>

			</div>

		</form>
	</body>

</html>



