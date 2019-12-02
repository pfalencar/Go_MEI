<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Venda</title>
	</head>

	<body>		
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome_usuario']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<p>Voltar para a <a href="painel.php">Página Inicial</a></p>


		<h1>Pesquisar Venda</h1>

		<a href="CadVenda.php"> Novo </a>


		<form action="" method="POST"> 		

			<p><input type=text name=produto_servico placeholder="Digite o nome do produto/estoque ou serviço" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$produto_servico = filter_input(INPUT_POST,'produto_servico', FILTER_SANITIZE_STRING);
		  	$result_venda = "SELECT * FROM venda WHERE produto_servico LIKE '%$produto_servico%'";
		  	$resultado_venda = mysqli_query($conexao, $result_venda);
		?>

		<div>
				
				<table>
					<tr>
						<th>Id Venda</th>
						<th>Produto/Serviço</th>
						<th>Data da Venda</th>
						<th>Quantidade</th>
						<th>Valor Total</th>
						<th>Valor Recebido</th>	
						<th>Troco</th>
						<th>Forma de Pagamento</th>					
					</tr>


		  		<?php

		  			while( $row_venda = mysqli_fetch_assoc($resultado_venda) ) {
		
						echo 

						//CONTINUAR A TROCAR POR VENDA A PARTIR DAQUI!
							"<tr>
								<td>" . $row_venda['id_fornecedor'] . "</td>
								<td>" . $row_venda['razaosocial'] . "</td>
								<td>" . $row_venda['inscricaoestadual'] . "</td>
								<td>" . $row_venda['inscricaomunicipal'] . "</td>

								<td>" . $row_venda['id_fornecedor'] . "</td>
								<td>" . $row_venda['razaosocial'] . "</td>
								<td>" . $row_venda['inscricaoestadual'] . "</td>
								<td>" . $row_venda['inscricaomunicipal'] . "</td>

								<td><a href='edit_fornecedor.php?id=" . $row_venda['id_fornecedor'] . "'>Editar</a></td>
								<td><a href='proc_apagar_fornecedor.php?id=" . $row_venda['id_fornecedor'] . "'>Apagar</a></td>
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