<?php
session_start();
include_once("Conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_compra = "SELECT * FROM compra WHERE id_compra = '$id'";
$resultado_compra = mysqli_query($conexao, $result_compra);
$row_compra = mysqli_fetch_assoc($resultado_compra);

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Go! MEI - Editar Compra</title>
	</head>

	<body>
		<div class="cabecalho">
			<h2> Olá, 
	  		<?php  echo $_SESSION['nome_usuario']; ?>!
			</h2>
			<h2> <a href="logout.php"> Sair </a> </h2>
		</div>
		<hr>
		<a href="painel.php">Home</a><br>
		<a href="CadCompra.php">Cadastrar Compra</a><br>
		<a href="PesquisaCompra.php">Pesquisar Compra</a><br>

		<h2> Editar Compra </h2>

		<?php
		  if( isset($_SESSION['msg']) ) {
			  echo $_SESSION['msg'];
			  unset($_SESSION['msg']);
		  }
		?>

		<form action="proc_edit_compra.php" method="POST">
				
			
			<input type="hidden" name="id" value="<?php echo $row_compra['id_compra']; ?>"></p>

			<p>Fornecedor: 
				<input type=text name=descricaocompra value="<?php echo $row_compra['fornecedor']; ?>"></p>

			<p>Descrição da Compra: 
				<input type=text name=descricaocompra value="<?php echo $row_compra['descricaocompra']; ?>"></p>

			<p>Data da Compra: 
				<input type=text name=dtcompra value="<?php echo $row_compra['dtcompra']; ?>"></p>

			<p>Valor da Compra : 
				<input type=text name=valorcompra value="<?php echo $row_compra['valorcompra']; ?>"></p>

			<br><br>
			  
		    <input type="submit" value="Editar">
			
			<br>
			
		</form>

		





	</body>

</html>



