<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Pesquisar Serviço</title>
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


		<h1>Pesquisar Serviço</h1>

		<a href="CadServico.php"> Novo </a>

		<?php
			if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  	}
	  	?>

		<form action="" method="POST"> 		

			<p><input type=text name=descricaoServico placeholder="Digite a descrição do Serviço" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$descricaoServico = filter_input(INPUT_POST,'descricaoServico', FILTER_SANITIZE_STRING);
		  	$result_servico = "SELECT * FROM servico WHERE descricaoservico LIKE '%$descricaoServico%'";
		  	$resultado_servico = mysqli_query($conexao, $result_servico);
?>

		<div>
				
				<table>
					<tr>
						<th>Id Serviço</th>
						<th>Descrição do Serviço</th>
						<th>Preço do Serviço</th>
						<th>Quantidade de Serviço</th>					
					</tr>


		  		<?php

		  			while( $row_servico = mysqli_fetch_assoc($resultado_servico) ) {
		
						echo 
							"<tr>
								<td>" . $row_servico['id_servico'] . "</td>
								<td>" . $row_servico['descricaoservico'] . "</td>
								<td>" . $row_servico['precoservico'] . "</td>
								<td>" . $row_servico['quantidadeservico'] . "</td>		
								<td><a href='edit_servico.php?id=" . $row_servico['id_servico'] . "'>Editar</a></td>
								<td><a href='proc_apagar_servico.php?id=" . $row_servico['id_servico'] . "'>Apagar</a></td>
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
