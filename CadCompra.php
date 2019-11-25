<?php
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>G-MEI - Cadastrar Compra</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<a href="PesquisaCompra.php"> Pesquisar Compra </a>
		
		<h2>Cadastrar Compra</h2>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}

		?>

		<form action="proc_cad_compra.php" method="POST">
			<div>
				<input type="hidden" name=codcompra></p>
				<input type=hidden name=valorcompra></p>

				
				<label>Fornecedor: </label>
				<p>
		<?php

			$id_microemp = $_SESSION['id_mei'] ;

			$result_fornecedores = "SELECT razaosocial FROM fornecedor WHERE id_mei ='$id_microemp'";

	  		$resultado_fornecedores = mysqli_query($conexao, $result_fornecedores);
	  
		    while ( $row_fornecedor = mysqli_fetch_assoc($resultado_fornecedores) ) {
			  
			    echo $row_fornecedor['razaosocial'];
			 }
		?>
			</p>
		
				<br><br>
				<p>Descrição da Compra: <input type=text name=descricaocompra></p>
				<p>Valor da Compra: <input type=text name=valorcompra></p>
				<br><br>
			    <input type="submit" value="Salvar" name="salvar">
			
				<br>

			</div>
		</form>
	</body>

</html>



