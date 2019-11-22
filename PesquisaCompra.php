<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Pesquisar Compra</title>
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


		<h1>Pesquisar Compra</h1>

		<a href="CadCompra.php"> Novo </a>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="" method="POST"> 		

			<p><input type=text name=descricaoCompra placeholder="Digite a descrição da compra" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
			//recebendo o botão
		    $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		    if ($SendPesqUser) {
		  	    $descricaoCompra = filter_input(INPUT_POST,'descricaoCompra', FILTER_SANITIZE_STRING);
		    	$result_compra = "SELECT * FROM compra WHERE descricaocompra LIKE '%$descricaoCompra%'";
		  	    $resultado_compra = mysqli_query($conexao, $result_compra);
		?>

		<div>
				
			<table>
				<tr>
					<th>Id Compra</th>
					<th>Descrição</th>
					<th>Data</th>
					<th>Valor</th>						
				</tr>

		  		<?php

		  			while( $row_compra = mysqli_fetch_assoc($resultado_compra) ) {
		
						echo 
							"<tr>
								<td>" . $row_compra['id_compra'] . "</td>
								<td>" . $row_compra['descricaocompra'] . "</td>
								<td>" . $row_compra['dtcompra'] . "</td>
								<td>" . $row_compra['valorcompra'] . "</td>
								<td><a href='edit_compra.php?id=" . $row_compra['id_compra'] . "'>Editar</a></td>
								<td><a href='proc_apagar_compra.php?id=" . $row_compra['id_compra'] . "'>Apagar</a></td>
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