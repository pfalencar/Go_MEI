<?php
session_start();
include("Conexao.php");
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Pesquisar Estoque</title>
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


		<h1>Pesquisar Estoque</h1>

		<a href="CadEstoque.php"> Novo </a>

		<?php
			if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  	}
	  	?>

		<form action="" method="POST"> 		

			<p><input type=text name=descricaoEstoque placeholder="Digite a descrição do Estoque" size="100" >
			<input type="submit" name="SendPesqUser" value="Pesquisar" ></p>  

		</form>	

		<?php
			//recebendo o botão
		  $SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);

		  //verificando se clicou no botao
		  if ($SendPesqUser) {
		  	$descricaoEstoque = filter_input(INPUT_POST,'descricaoEstoque', FILTER_SANITIZE_STRING);
		  	$result_estoque = "SELECT * FROM estoque WHERE descricaoestoque LIKE '%$descricaoEstoque%'";
		  	$resultado_estoque = mysqli_query($conexao, $result_estoque);
		?>

		<div>
				
				<table>
					<tr>
						<th>Id Estoque</th>
						<th>Descrição</th>
						<th>Preço</th>
						<th>Quantidade</th>					
					</tr>


		  		<?php

		  			while( $row_estoque = mysqli_fetch_assoc($resultado_estoque) ) {
		
						echo 
							"<tr>
								<td>" . $row_estoque['id_estoque'] . "</td>
								<td>" . $row_estoque['descricaoestoque'] . "</td>
								<td>" . $row_estoque['preco'] . "</td>
								<td>" . $row_estoque['quantidade'] . "</td>		
								<td><a href='edit_estoque.php?id=" . $row_estoque['id_estoque'] . "'>Editar</a></td>
								<td><a href='proc_apagar_estoque.php?id=" . $row_estoque['id_estoque'] . "'>Apagar</a></td>
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