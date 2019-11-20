<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_fornecedor = "SELECT * FROM fornecedor WHERE id_fornecedor = '$id'";
$resultado_fornecedor = mysqli_query($conexao, $result_fornecedor);
$row_fornecedor = mysqli_fetch_assoc($resultado_fornecedor);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>
		<a href="painel.php">Home</a><br>
		<a href="CadFornecedor.php">Cadastrar Fornecedor</a><br>
		<a href="PesquisaFornecedor.php">Pesquisar Fornecedor</a><br>

		<h2> Editar Fornecedor </h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_fornecedor.php" method="POST">
				
			
			<input type="hidden" name="id" value="<?php echo $row_fornecedor['id_fornecedor']; ?>"></p>

			<p>Razão Social: 
				<input type=text name=razaosocial value="<?php echo $row_fornecedor['razaosocial']; ?>"></p>

			<p>Inscrição Estadual: 
				<input type=text name=inscricaoestadual value="<?php echo $row_fornecedor['inscricaoestadual']; ?>"></p>

			<p>Inscrição Municipal: 
				<input type=text name=inscricaomunicipal value="<?php echo $row_fornecedor['inscricaomunicipal']; ?>"></p>

			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



