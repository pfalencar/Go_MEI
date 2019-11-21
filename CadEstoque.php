<?php
session_start();

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>

		<a href="PesquisaEstoque.php"> Pesquisar Estoque </a>
		
		<h2>Cadastrar Estoque</h2>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_cad_estoque.php" method="POST">
			
			  <input type="hidden" name=codestoque></p><br>

			  <label>Descrição do Produto: </label>
			  <input type="text" name="descricaoEstoque"><br><br>
			
			  <label>Preco: </label>
			  <input type="text" name="preco"><br><br>

			  <label>Quantidade: </label>
			  <input type="text" name="quantidade"><br><br>

			  <br><br>
				
			  <input type="submit" value="Salvar">
				<br>

			</div>
		</form>
	</body>

</html>



