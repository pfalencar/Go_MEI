<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Pesquisar Contrato de Funcionário</title>
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


		<h1>Pesquisar Contrato de Funcionário</h1>

		<a href="CadContrato.php"> Novo </a>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="" method="POST"> 		

			<p><input type=text name=codContrato placeholder="Digite o código do contrato" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
			//recebendo o botão
		    $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		    if ($SendPesqUser) {
		  	    $codContrato = filter_input(INPUT_POST,'codContrato', FILTER_SANITIZE_STRING);
		    	$result_contrato = "SELECT * FROM contrato WHERE id_contrato LIKE '%$codContrato%'";
		  	    $resultado_contrato = mysqli_query($conexao, $result_contrato);
		?>

		<div>
				
			<table>
				<tr>
					<th>Id Contrato</th>
					<th>Id Funcionário</th>
					<th>Início do contrato</th>
					<th>Fim do contrato</th>
					<th>Horário de serviço</th>
					<th>Valor/Hora</th>
					<th>Data de pagamento</th>
					<th>Valor de pagamento</th>						
				</tr>

		  		<?php

		  			while( $row_contrato = mysqli_fetch_assoc($resultado_contrato) ) {
		
						echo 
							"<tr>
								<td>" . $row_contrato['id_contrato'] . "</td>
								<td>" . $row_contrato['id_funcionario'] . "</td>
								<td>" . $row_contrato['iniciocontrato'] . "</td>
								<td>" . $row_contrato['fimcontrato'] . "</td>
								<td>" . $row_contrato['horarioservico'] . "</td>
								<td>" . $row_contrato['valorhora'] . "</td>
								<td>" . $row_contrato['dtpagamento'] . "</td>
								<td>" . $row_contrato['valorpagamento'] . "</td>						
								<td><a href='edit_contrato.php?id=" . $row_contrato['id_contrato'] . "'>Editar</a></td>
								<td><a href='proc_apagar_contrato.php?id=" . $row_contrato['id_contrato'] . "'>Apagar</a></td>
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