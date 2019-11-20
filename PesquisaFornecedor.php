<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Pesquisar</title>
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


		<h1>Pesquisar Fornecedor</h1>

		<a href="CadFornecedor.php"> Novo </a>


		<form action="" method="POST"> 		

			<p><input type=text name=nomeFornecedor placeholder="Digite o nome do Fornecedor" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$nomeFornecedor = filter_input(INPUT_POST,'nomeFornecedor', FILTER_SANITIZE_STRING);
		  	$result_fornecedor = "SELECT * FROM fornecedor WHERE razaosocial LIKE '%$nomeFornecedor%'";
		  	$resultado_fornecedor = mysqli_query($conexao, $result_fornecedor);
		?>

		<div>
				
				<table>
					<tr>
						<th>Id Fornecedor</th>
						<th>Razão Social</th>
						<th>Inscrição Estadual</th>
						<th>Inscrição Municipal</th>
						<th>Editar</th>
						<th>Deletar</th>						
					</tr>


		  		<?php

		  			while( $row_fornecedor = mysqli_fetch_assoc($resultado_fornecedor) ) {
		
							echo "	<tr>
												<td>" . $row_fornecedor['id_fornecedor'] . "</td>
												<td>" . $row_fornecedor['razaosocial'] . "</td>
												<td>" . $row_fornecedor['inscricaoestadual'] . "</td>
												<td>" . $row_fornecedor['inscricaomunicipal'] . "</td>
												<td><a href='edit_fornecedor.php?id=" . $row_fornecedor['id_fornecedor'] . "'>Editar</a></td>
												<td><a href='proc_apagar_fornecedor.php?id=" . $row_fornecedor['id_fornecedor'] . "'>Apagar</a></td>
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