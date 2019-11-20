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

		<a href="PesquisaFornecedor.php"> Pesquisar Fornecedor </a>
		
		<h2>Cadastrar Fornecedor</h2>
		<?php
			if( isset($_SESSION['msg']) ) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>

		<form action="proc_cad_fornecedor.php" method="POST">
			<div>
				<input type="hidden" name=codfornecedor></p>
				<p>Razão Social: <input type=text name=razaosocial></p>
				<p>Inscrição Estadual: <input type=text name=inscricaoestadual></p>
				<p>Inscrição Municipal: <input type=text name=inscricaomunicipal></p>
				<br><br>
			    <input type="submit" value="Salvar" name="salvar">
			
				<br>

			</div>
		</form>
	</body>

</html>



