<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Pesquisar Cliente</title>
	</head>

	<body>		
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<p>Voltar para a <a href="painel.php">Página Inicial</a></p>


		<h1>Pesquisar Cliente</h1>

		<a href="CadCliente.php"> Novo </a>


		<form action="" method="POST"> 		

			<p><input type=text name=nomeCliente placeholder="Digite o nome do Cliente" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$nomeCliente = filter_input(INPUT_POST,'nomeCliente', FILTER_SANITIZE_STRING);
		  	$result_cliente = "SELECT * FROM cliente WHERE nome LIKE '%$nomeCliente%'";
		  	$resultado_cliente = mysqli_query($conexao, $result_cliente);
		?>

		<div>
				
				<table>
					<tr>
						<th>Id Cliente</th>
						<th>Nome</th>
						<th>CPF</th>
						<th>Sexo</th>
						<th>CEP</th>
						<th>UF</th>	
						<th>Editar</th>
						<th>Deletar</th>						
					</tr>


		  		<?php

		  			while( $row_cliente = mysqli_fetch_assoc($resultado_cliente) ) {
		
							echo "	<tr>
												<td>" . $row_cliente['id_cliente'] . "</td>
												<td>" . $row_cliente['nome'] . "</td>
												<td>" . $row_cliente['cpf'] . "</td>
												<td>" . $row_cliente['genero'] . "</td>
												<td>" . $row_cliente['cep'] . "</td>
												<td>" . $row_cliente['uf'] . "</td>
												<td><a href='edit_cliente.php?id=" . $row_cliente['id_cliente'] . "'>Editar</a></td>
												<td><a href='proc_apagar_cliente.php?id=" . $row_cliente['id_cliente'] . "'>Apagar</a></td>
											</tr>";
		  			}
			}
					?>
		
			</table>
				<br><br>
				<br><br>
		    
				<br><br>

		</div>

		
	</body>

</html>